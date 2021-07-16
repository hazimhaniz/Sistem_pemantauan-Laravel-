<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\JasFail;
use App\JasFailDetail;
use App\JenisPengawasan;
use App\LogModel\LogSystem;
use App\Mail\Profile\HandedOver;
use App\MasterModel\MasterFilingStatus;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterUserType;
use App\ModelHasRole;
use App\Notifications\SendMail;
use App\OtherModel\Inbox;
use App\Projek;
use App\ProjekDetail;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\Role;
use App\User;
use App\UserStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Validator;

class UserExternalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct() {
    //     $this->middleware('admin');
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::whereIn('id', [4, 5, 6])->get();
        if ($request->ajax()) {

            // dd('wdwdw');

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            // $users = User::whereIn('user_type_id', [3,4])->with(['entity','status','type']);
            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }
            //   dd()
            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {
                // dd('dwdwd');
                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {
                //   dd('dwdwdw');
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                // (optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id()
                // ->orderBy('name', 'desc')
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });
                // ->whereHas('project_has_user.projek.distribute',function($distribute) use($projekFailJas)
                // {
                //     return $distribute->whereIn('no_fail_jas',$projekFailJas);
                // });
            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6, 1]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6, 1]);
                    });

                }
            }
// dd($users->get());
            // else{
            //   dd('wdwdw');
            //     allow superadmin access semua
            //     $users = User::whereIn('user_type_id', [3,4])
            //     ->with(['entity', 'status','role','project_has_user'])
            //     ->whereHas('model_has_role',function($role) use($request) {
            //         return $role->whereIn('role_id',[3,4,5,6,1]);
            //     });
            // }
            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');
            // dd($users->get()->toArray());
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $users->toSql()), $users->getBindings()));
            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project)
                    //return '<span class="label label-default">'.optional(optional($user->project_has_user)->projek)->no_fail_jas.'</span>';
                    /* Edit by Sharul to remove badge span */ {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }
                    // if ($user->project_has_user) {
                    //     if(optional(optional($user->project_has_user)->projek)->nama_projek)
                    //         //return '<span class="badge badge-info">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //         /* Edit by Sharul to remove badge span */
                    //         return '<span class="">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //     else
                    //         return '';
                    // }
                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })
            // ->editColumn('username', function ($user) {
            //     //return '<span class="label label-default">'.$user->username.'</span>';
            //     return '<span class="">'.$user->username.'</span>';
            // })
                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
            // })

                ->editColumn('action', function ($user) {
                    $button = "";
                    // dd(optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id);
                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));

    }

    public function listpp(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::whereIn('id', [4, 5, 6])->get();
        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }
            //   dd()
            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {
                // dd('dwdwd');
                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat', 'penyelia', 'admin_state', 'admin_hq'])) {

                $projek = Projek::join('projek_has_user', 'projek_has_user.projek_id', '=', 'projek.id')
                    ->join('user', 'user.id', '=', 'projek_has_user.user_id')
                    ->join('master_filing_status', 'master_filing_status.id', '=', 'projek_has_user.status')
                    ->select([
                        'projek.id as projek_id',
                        'projek.nama_projek',
                        'projek.no_fail_jas',
                        'projek.penggerak_projek as user_id',
                        'projek.status as projek_status',
                        'projek.created_at',
                        'projek_has_user.status as user_status',
                        'user.name as name',
                        'user.entity_type',
                        'user.user_status_id',
                        'master_filing_status.name as status_name',
                        'master_filing_status.badge as status_badge',
                    ])
                    ->where('projek_has_user.role_id', 4);

            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [4]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [4]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [4]);
                    });

                }
            }

            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');
            $projek = $projek->orderBy('projek.created_at', 'DESC');

            return datatables()->of($projek)
                ->editColumn('fail_jas', function ($projek) {
                    return '<span class="">' . $projek->no_fail_jas . '</span>';
                })
                ->editColumn('nama_projek', function ($projek) {
                    return '<span class="ow pull-left">' . $projek->nama_projek . ' </span>';
                })

                ->editColumn('name', function ($projek) {
                    return $projek->name;
                })

                ->editColumn('type.name', function ($projek) {
                    $model = ModelHasRole::where('model_id', $projek->user_id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($projek) {
                    return '<span class="label label-lg label-inline ' . $projek->status_badge . '">' . $projek->status_name . '</span>';

                })

                ->editColumn('action', function ($projek) {
                    $button = "";

                    if ($projek->entity_type == "App\UserEMC") {
                        $button .= '<a title="Semak" onclick="editemc(' . $projek->user_id . ')" href="javascript:;" class="btn fail btn-sm mb-1 m-l-5">Tindakan</a>';
                    } elseif ($projek->entity_type == "App\UserPP") {
                        $button .= '<a title="Semak" onclick="edit(' . $projek->user_id . ', ' . $projek->projek_id . ')" href="javascript:;" class="btn fail btn-sm mb-1 m-l-5">Tindakan</a>';
                    }

                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $projek->user_id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    // dd(optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id);
                    // if($user->user_status_id == 6){
                    //   if ($user->entity_type == "App\UserEMC") {
                    //     $edit = "editemcnyah";
                    //   } else {
                    //     $edit = "editnyah";
                    //   }
                    //   $button .= '<a onclick="'.$edit.'('.$user->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    // } else {
                    //   if ($user->entity_type == "App\UserEMC") {
                    //     $button .= '<a title="Semak" onclick="editemc('.$user->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit">Tindakan</i></a>';
                    //   }
                    // }
                    // if($user->user_status_id == 7 ){
                    //   $button .= '<a onclick="active('.$user->id.')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    // }
                    // if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state','superadmin','admin_hq'])){
                    //   $model = ModelHasRole::where('model_id',$user->id)->where('role_id','<>' , 3)->first();
                    //   if ($model->role_id == 6) {
                    //   } else {
                    //     if($user->user_status_id != 6){
                    //       $button .= '<a title="Semak" onclick="edit('.$user->id.', '.$user->projek_id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5">Tindakan</a>';
                    //     }
                    //   }
                    // }
                    // if (auth()->user()->hasAnyRole(['admin_state','superadmin']))
                    //   $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        $legendStatuses = MasterFilingStatus::whereIn('id', [2, 101, 102, 103, 113])->get();

        return view('user.external.index', compact('types', 'all_status', 'legendStatuses'));
    }

    public function listeo(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::whereIn('id', [4, 5, 6])->get();
        if ($request->ajax()) {

            // dd('wdwdw');

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            // $users = User::whereIn('user_type_id', [3,4])->with(['entity','status','type']);
            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }
            //   dd()
            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {
                // dd('dwdwd');
                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {
                //   dd('dwdwdw');
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                // (optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id()
                // ->orderBy('name', 'desc')
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });
                // ->whereHas('project_has_user.projek.distribute',function($distribute) use($projekFailJas)
                // {
                //     return $distribute->whereIn('no_fail_jas',$projekFailJas);
                // });
            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }
            }

            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');
            // dd($users->get()->toArray());
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $users->toSql()), $users->getBindings()));
            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project)
                    //return '<span class="label label-default">'.optional(optional($user->project_has_user)->projek)->no_fail_jas.'</span>';
                    /* Edit by Sharul to remove badge span */ {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }
                    // if ($user->project_has_user) {
                    //     if(optional(optional($user->project_has_user)->projek)->nama_projek)
                    //         //return '<span class="badge badge-info">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //         /* Edit by Sharul to remove badge span */
                    //         return '<span class="">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //     else
                    //         return '';
                    // }
                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })
            // ->editColumn('username', function ($user) {
            //     //return '<span class="label label-default">'.$user->username.'</span>';
            //     return '<span class="">'.$user->username.'</span>';
            // })
                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
            // })

                ->editColumn('action', function ($user) {
                    $button = "";
                    // dd(optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id);
                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5">Tindakan</a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5">Tindakan</a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));
    }
    public function listemc(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::whereIn('id', [4, 5, 6])->get();
        if ($request->ajax()) {

            // dd('wdwdw');

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            // $users = User::whereIn('user_type_id', [3,4])->with(['entity','status','type']);
            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }
            //   dd()
            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {
                // dd('dwdwd');
                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {
                //   dd('dwdwdw');
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                // (optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id()
                // ->orderBy('name', 'desc')
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });
                // ->whereHas('project_has_user.projek.distribute',function($distribute) use($projekFailJas)
                // {
                //     return $distribute->whereIn('no_fail_jas',$projekFailJas);
                // });
            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [3, 4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [3, 4, 5, 6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    // dd('wdwdw');
                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[3,4,5,6]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });
                    // dd($users);
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    // $users = User::with(['entity','status','type','project_has_user'])
                    // ->whereIn('user_status_id', [$request->status_id])
                    // ->whereHas('model_has_role',function($role) use($request) {
                    //     return $role->whereIn('role_id',[$request->type_id]);
                    // });

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                    //   ->whereHas('project_has_user',function($project) use($projekID)
                    //    {
                    //       return $project->whereIn('projek_id',$projekID);
                    //   }
                    // );
                } else {
                    // dd(auth()->user()->entity_staff->state_id);
                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });

                }
            }
// dd($users->get());
            // else{
            //   dd('wdwdw');
            //     allow superadmin access semua
            //     $users = User::whereIn('user_type_id', [3,4])
            //     ->with(['entity', 'status','role','project_has_user'])
            //     ->whereHas('model_has_role',function($role) use($request) {
            //         return $role->whereIn('role_id',[3,4,5,6,1]);
            //     });
            // }
            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');
            // dd($users->get()->toArray());
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $users->toSql()), $users->getBindings()));
            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project)
                    //return '<span class="label label-default">'.optional(optional($user->project_has_user)->projek)->no_fail_jas.'</span>';
                    /* Edit by Sharul to remove badge span */ {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }
                    // if ($user->project_has_user) {
                    //     if(optional(optional($user->project_has_user)->projek)->nama_projek)
                    //         //return '<span class="badge badge-info">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //         /* Edit by Sharul to remove badge span */
                    //         return '<span class="">'.optional(optional($user->project_has_user)->projek)->nama_projek.'</span>';
                    //     else
                    //         return '';
                    // }
                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })
            // ->editColumn('username', function ($user) {
            //     //return '<span class="label label-default">'.$user->username.'</span>';
            //     return '<span class="">'.$user->username.'</span>';
            // })
                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
            // })

                ->editColumn('action', function ($user) {
                    $button = "";
                    // dd(optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id);
                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5">Tindakan</a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5">Tindakan</a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));
    }

    public function listpp12(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::where('id', [3, 4, 5])->get();
        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }

            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {

                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {

                $users = User::whereIn('user_type_id', [4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])

                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });

            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [4])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])
                        ->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    // ->whereNotIn('id', [3,6,7])
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }
            }

            if ($request->user_id) {

                $users = $users->where('user.id', $request->user_id);

            }
            $users = $users->orderBy('user.created_at', 'DESC');

            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project) {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }

                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })

                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

            // ->editColumn('created_at', function ($user) {
            //     return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
            // })

                ->editColumn('action', function ($user) {
                    $button = "";
                    // dd(optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id);
                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));
    }

    public function listeo11(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::where('id', [5])->get();
        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }

            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {

                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {

                $users = User::whereIn('user_type_id', [5])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])

                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });

            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [5])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])
                        ->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [5])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [5]);
                    });

                }
            }

            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');

            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project) {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }

                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })

                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

                ->editColumn('action', function ($user) {
                    $button = "";

                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));
    }

    public function listemc11(Request $request)
    {

        $all_status = MasterUserStatus::all();
        $types = Role::where('id', [6])->get();
        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pp_id = auth()->id();
            $pp_state = UserStaff::where('user_id', '=', $pp_id)->get();
            $projekID = array();
            $projekFailJas = array();
            foreach ($pp_state as $key => $value_state) {
                $projek_detail = ProjekDetail::where('negeri', '=', $value_state->state_id)->get();
                foreach ($projek_detail as $key => $value_detail) {
                    $projekID[] = $value_detail->projek_id;
                    $projekFailJas[] = optional($value_detail->projek)->no_fail_jas;
                }
            }

            if (auth()->user()->hasAnyRole(['superadmin', 'admin'])) {

                $projek = Projek::all();
                foreach ($projek as $projeks) {
                    $projekID[] = $projeks->id;
                }
            }

            if (auth()->user()->hasAnyRole(['penyiasat'])) {

                $users = User::whereIn('user_type_id', [5])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])

                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    })
                    ->whereHas('project_has_user.projek.distribute', function ($distribute) use ($projekFailJas) {
                        return $distribute->whereIn('no_fail_jas', $projekFailJas);
                    });

            } elseif (auth()->user()->hasAnyRole(['admin_state'])) {
                $users = User::whereIn('user_type_id', [5])->whereNotIn('id', [3, 6, 7])->whereNotIn('user_status', [8])
                    ->with(['entity', 'status', 'role', 'project_has_user'])
                    ->whereHas('project_has_user', function ($project) use ($projekID) {
                        return $project->whereIn('projek_id', $projekID);
                    });
            }

            if (auth()->user()->hasAnyRole(['admin_hq'])) {
                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [4])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->whereIn('user.user_type_id', [5])
                        ->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });

                }

            } else {

                if ($request->type_id && $request->type_id != -1 && $request->status_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [5])->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });
                } else if ($request->status_id && $request->status_id != -1 && $request->type_id == -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [5])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [6]);
                    });

                } else if ($request->type_id && $request->type_id != -1 && $request->status_id && $request->status_id != -1) {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.no_fail_jas', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])->whereIn('user.user_status_id', [$request->status_id]);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->whereIn('role_id', [$request->type_id]);
                    });

                } else {

                    $users = User::select('user.id', 'user.entity_type', 'user.entity_id', 'user.username', 'user.name', 'projek_has_user.projek_id', 'projek_has_user.user_flag', 'user.user_status_id', 'projek.nama_projek', 'jas_fail.id as jasid', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.negeri')
                        ->join('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')
                        ->join('projek', 'projek_has_user.projek_id', '=', 'projek.id')
                        ->join('jas_fail', 'projek.no_fail_jas', '=', 'jas_fail.nofail')
                        ->join('jas_fail_detail', 'jas_fail.id', '=', 'jas_fail_detail.jas_fail_id')
                        ->where('jas_fail_detail.negeri', auth()->user()->entity_staff->state_id)
                        ->whereIn('user.user_type_id', [3, 4])
                        ->where('user.user_status_id', '!=', 9);
                    $users->with(['entity', 'status', 'role', 'project_has_user']);
                    $users->whereHas('model_has_role', function ($role) use ($request) {
                        return $role->where('role_id', [6]);
                    });

                }
            }

            if ($request->user_id) {
                $users = $users->where('user.id', $request->user_id);
            }
            $users = $users->orderBy('user.created_at', 'DESC');

            return datatables()->of($users)

                ->editColumn('fail_jas', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($project) {
                        return '<span class="">' . $project->no_fail_jas . '</span>';
                    } else {
                        return '';
                    }

                })

                ->editColumn('nama_projek', function ($user) {
                    $project = Projek::where('id', $user->project_has_user->projek->id)->first();
                    if ($user) {
                        if ($user->nama_projek) {
                            return '<span class="">' . $user->nama_projek . '</span>';
                        } else {
                            return '';
                        }

                    }

                })

                ->editColumn('name', function ($user) {

                    if ($user->name) {
                        if ($user->isOnline()) {
                            return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        } else {
                            return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
                        }

                    }
                })

                ->editColumn('type.name', function ($user) {
                    $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                    if ($model->role_id == 4) {
                        //return '<span class="badge badge-info">PP</span>';
                        return '<span class="">PP</span>';
                    }
                    if ($model->role_id == 5) {
                        //return '<span class="badge badge-info">EO</span>';
                        return '<span class="">EO</span>';
                    }
                    if ($model->role_id == 6) {
                        //return '<span class="badge badge-info">EMC</span>';
                        return '<span class="">EMC</span>';
                    }

                })

                ->editColumn('status.name', function ($user) {
                    //  return $user->user_status_id;
                    // dd('sini');
                    // if($user->user_status_id == 1 && $user->user_flag == 1){
                    if ($user->user_status_id == 1) {
                        return '<span class="badge badge-success">' . $user->status->name . '</span>';
                    }
                    // else if($user->user_status_id == 1 && $user->user_flag == 0){
                    //     return '<span class="badge badge-default">Belum Disahkan</span>';
                    // }
                    else if ($user->user_status_id == 3) {
                        if ($user->entity_type == 'App\UserEO') {
                            if ($user->entity_eo->no_kompetensi) {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span><span class="badge badge-warning">No. Sijil Kompetensi Belum Wujud</span>';
                            }
                        } else {
                            if ($user->user_status_id == 3) {
                                // return '<span class="badge badge-danger">Semakan P. Penyiasat</span>';
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            } else {
                                return '<span class="badge badge-default">' . $user->status->name . '</span>';
                            }}
                    } else {
                        if ($user->user_status_id == 3) {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-danger">' . $user->status->name . '</span>';
                        }
                    }

                })

                ->editColumn('action', function ($user) {
                    $button = "";

                    if ($user->user_status_id == 6) {
                        if ($user->entity_type == "App\UserEMC") {
                            $edit = "editemcnyah";
                        } else {
                            $edit = "editnyah";
                        }
                        $button .= '<a onclick="' . $edit . '(' . $user->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-minus-circle mr-1"></i> Nyah Aktifkan</a> ';
                    } else {
                        if ($user->entity_type == "App\UserEMC") {
                            $button .= '<a title="Semak" onclick="editemc(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                        }
                    }
                    if ($user->user_status_id == 7) {
                        $button .= '<a onclick="active(' . $user->id . ')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    if ((optional(optional(optional($user->project_has_user)->projek)->distribute)->assigned_to_user_id == auth()->id() && auth()->user()->hasAnyRole(['penyiasat'])) || auth()->user()->hasAnyRole(['admin_state', 'superadmin', 'admin_hq'])) {
                        $model = ModelHasRole::where('model_id', $user->id)->where('role_id', '<>', 3)->first();
                        if ($model->role_id == 6) {
                        } else {
                            if ($user->user_status_id != 6) {
                                $button .= '<a title="Semak" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                            }
                        }
                    }
                    if (auth()->user()->hasAnyRole(['admin_state', 'superadmin'])) {
                        $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
                    }

                    return $button;
                })
                ->make(true);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Pengguna - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('user.external.index', compact('types', 'all_status'));
    }

    public function deactivate_external(Request $request)
    {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->user_status_id = 5;

        $user->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function activate_external(Request $request)
    {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Simpan Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->user_status_id = 1;

        $user->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya disimpan.']);
    }
    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $projekID = $request->projekID;
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        $detail = explode("_", $request->id);
        $nyah = 0;
        if (isset($detail[1])) {
            $nyah = 1;
        }
        $all_status = MasterUserStatus::whereIn('id', [1, 2, 10])->get();
        // dd($all_status);
        // $provinces = MasterProvinceOffice::all();
        $types = MasterUserType::whereIn('id', [3, 4])->get();
        $user = User::findOrFail($detail[0]);

        $hasuser = ProjekHasUser::where('user_id', $detail[0])->first();
        $jenispengawasan = JenisPengawasan::where('projek_id', $request->projekID)->first();

        $projek = Projek::where('id', $request->projekID)->first();
        $failjas = JasFail::where('nofail', $projek->no_fail_jas)->first();
        $failjasdetail = JasFailDetail::where('jas_fail_id', $failjas->id)->first();
        $namapenggerak = $failjasdetail->pegawai_penggerak;

        $jenis = json_decode($jenispengawasan->jenis_pengawasan_id);

        $pengawasan = MasterPengawasan::all();
        if ($jenis) {
            foreach ($jenis as $key => $value) {
                // dd($value);
                $pengawasantype = MasterPengawasan::where('id', $value)->first();
                $jenis1[] = $pengawasantype->jenis_pengawasan;
            }
        } else {
            $jenis1[] = "";
        }

        $picture = '';
        $sijil = '';
        if ($user->entity_eo != null) {
            if ($user->entity_eo->gambar_url != null) {
                $picture = '<a href="' . url('/') . '/' . $user->entity_eo->gambar_url . '" target="_blank"><img src="' . url('/') . '/' . $user->entity_eo->gambar_url . '" width="100%" height="auto"></a>';
            }
            $url = url('/') . '/' . $user->entity_eo->sijil_url;
            $path = parse_url($url, PHP_URL_PATH); // get path from url
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename = pathinfo($path, PATHINFO_FILENAME);
            // dd($extension);
            $files2 = glob($user->entity_eo->sijil_url . "*");
            if ($user->entity_eo->sijil_url != null) {
                foreach ($files2 as $file_temporary) {
                    $file_display = ltrim($file_temporary, $user->entity_eo->sijil_url);
                    $sijil = $sijil . '<a href="' . url('/') . '/' . $user->entity_eo->sijil_url . $file_display . '" target="_blank">' . $file_display . '</a><br>';

                }
            }
        }

        return view('user.external.edit', compact('projekID', 'all_status', 'types', 'user', 'pengawasan', 'jenis', 'jenis1', 'sijil', 'picture', 'namapenggerak', 'nyah'));
    }

    public function edit2(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $all_status = MasterUserStatus::all();
        // $provinces = MasterProvinceOffice::all();
        $types = MasterUserType::whereIn('id', [3, 4])->get();
        $user = User::findOrFail($request->id);
        $hasuser = ProjekHasUser::where('user_id', $request->id)->where('projek_id', $request->projek)->first();
        $jenispengawasan = JenisPengawasan::where('projek_id', $request->projekID)->first();
        // dd($jenispengawasan);
        // $jenis = json_decode($jenispengawasan->pengawasan);
        $jenis = json_decode($jenispengawasan->jenis_pengawasan_id);

        $pengawasan = MasterPengawasan::all();
        foreach ($jenis as $key => $value) {
            $pengawasantype = MasterPengawasan::where('id', $value)->first();
            $jenis1[] = $pengawasantype->jenis_pengawasan;
        }
        return view('user.external.editpp', compact('all_status', 'types', 'user', 'pengawasan', 'jenis1', 'hasuser'));
    }

    public function editemc(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        $detail = explode("_", $request->id);
        $nyah = 0;
        if (isset($detail[1])) {
            $nyah = 1;
        }
        // dd($nyah);
        $all_status = MasterUserStatus::whereIn('id', [1, 2])->get();
        // $provinces = MasterProvinceOffice::all();
        $types = MasterUserType::whereIn('id', [3, 4])->get();
        $user = User::findOrFail($detail[0]);
        // dd($user);
        return view('user.external.editemc', compact('all_status', 'types', 'user', 'nyah'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        if(!$request->pakej_pengawasan_id) {
            return response()->json(['status' => 'error', 'title' => 'Ralat!', 'message' => 'Data tidak berjaya disimpan.']);
        }
        $user = User::findOrFail($request->id);

        if ($user->entity_type == "App\UserEMC") {

            $validator = Validator::make($request->all(), [
                'sebab_tidak_aktif' => 'not_in:0',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        } else {
            // aktif
            if($request->user_status_id == 101) {
                $validate = [
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required',
                    'user_status_id' => 'required|integer',
                ];
                $request->merge(['sebab_tidak_aktif' => null]);
            // tidak aktif
            } elseif($request->user_status_id == 102) {
                $validate = [
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required',
                    'user_status_id' => 'required|integer',
                    'sebab_tidak_aktif' => 'not_in:0',
                ];
            // permohonan ditolak
            } else {
                $validate = [
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required',
                    'user_status_id' => 'required|integer',
                    'komen' => 'required',
                ];
                $request->merge(['sebab_tidak_aktif' => null]);
            }

            $validator = Validator::make($request->all(), $validate);

            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|string',
            //     'username' => 'required|string',
            //     'email' => 'required',
            //     'user_status_id' => 'required|integer',
            //     'sebabtidakaktif' => 'not_in:0',
            // ]);

            if ($validator->fails()) {
                // If validation failed
                return response()->json(['errors' => $validator->errors()], 422);
            }
        }

        if ($user->entity_type == 'App\UserEMC') {
            $entity = "EMC";
        }
        if ($user->entity_type == 'App\UserEO') {
            $entity = "EO";
        }
        if ($user->entity_type == 'App\UserPP') {
            $entity = "PP";
        }

        // TAG STATUS PROJECT
        if ($request->user_status_id == 102) {
            $user->sebab_tidak_aktif = $request->sebab_tidak_aktif;
            Inbox::create([
                'subject' => 'Pengguna ' . $entity,
                'message' => 'Dimaklumkan bahawa ID pengguna bagi peranan ' . $entity . ' kepada Tuan/Puan ' . $user->name . ' telah dinyahaktifkan kerana ' . $request->sebab_tidak_aktif,
                'sender_user_id' => auth()->id(), //penyiasat
                'receiver_user_id' => $user->project_has_user->projek->penggerak_projek, //PP
                'inbox_status_id' => 2,
            ]);

            $data = [
                'no_fail_jas' => $user->project_has_user->projek->no_fail_jas,
                'nama_projek' => $user->project_has_user->projek->nama_projek,
                'peranan' => $entity,
                'sebab_ditolak' => $request->sebab_tidak_aktif,
            ];

            sendMail($user, 15, $data);

            $user->save();
        }
        // tambah komen
        if ($request->user_status_id == 110) {
            $user->komen = $request->komen;
            Inbox::create([
                'subject' => 'Pengguna ' . $entity,
                'message' => 'Dimaklumkan bahawa ID pengguna bagi peranan ' . $entity . ' kepada Tuan/Puan ' . $user->name . ' tiada Pengesahan <br> Sebab : ' . $request->komen,
                'sender_user_id' => auth()->id(), //penyiasat
                'receiver_user_id' => $user->project_has_user->projek->penggerak_projek, //PP
                'inbox_status_id' => 2,
            ]);

            $data = [
                'peranan' => $entity,
                'no_fail_jas' => $user->project_has_user->projek->no_fail_jas,
                'nama_projek' => $user->project_has_user->projek->nama_projek,
                'sebab_ditolak' => $request->komen,
            ];

            sendMail($user, 15, $data);

            $user->save();
        }

        // dd($user->entity_type);
        // $log = new LogSystem;
        // $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        // $log->activity_type_id = 5;
        // $log->description = "Kemaskini Pengurusan Pengguna - Pengguna Luaran";
        // $log->data_old = json_encode($user);

        // $projekHasUser = ProjekHasUser::where('user_id',$user->id)->first();
        $projekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
        $projekHasUser->projek_id = $request->projekID;
        $projekHasUser->user_id = $user->id;

        if ($request->user_status_id == 101) {

            $projekHasUser->status = 101;
            $projekHasUser->user_flag = 1;
            $projekHasUser->projek_id = $request->projekID;
            $projekHasUser->save();

            $projek = $projekHasUser->projek;
            $projek->status = 200;
            $projek->save();
            $projekHasPp = ProjekHasPp::where('user_id', $user->id)->where('projek_id', $request->projekID)->first();
            if (!empty($projekHasPp)) {
                $projekHasPp->role_id = 4;
                $projekHasPp->save();
            } else {
                $projekHasPp = new ProjekHasPp;
                $projekHasPp->user_id = $user->id;
                $projekHasPp->projek_id = $request->projekID;
                $projekHasPp->role_id = 4;
                $projekHasPp->save();
            }

            $projekDetail = ProjekDetail::where('projek_id', $request->projekID)->first();
            $projekDetail->status_id = 302;
            $projekDetail->save();

            $usercheck = User::where('id', $user->id)->where('entity_type', 'App\UserPP')->first();
            // $usercheck = User::where('id',$user->id)->where('entity_type','App\UserPP')->first();
            if ($usercheck && $usercheck->email_sent) {

            } else {
                // kalau aktifkan user akan shoot email ke PP
                $projekUser = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
                    ->where('model_has_role.role_id', 4)
                    ->where('projek_has_user.projek_id', $user->project_has_user->projek->id)
                // ->where('projek_has_user.status',"Active")
                    ->first();

                $password = $this->generateRandomString();

                $user->password = bcrypt($password);
                $user->email_sent = 1;
                $user->save();

                if ($user->user_type_id == 3) {
                    foreach ($user->user_has_role as $key => $value) {
                        if ($value->role->name != 'ex') {
                            $peranan = $value->role->description;
                        }
                    }
                } else {
                    $peranan = 'peranan';
                }

                $no_fail_jas = $user->project_has_user->projek->id;
                $nama_projek = $user->project_has_user->projek->nama_projek;
                if ($user->project_has_user->status = 'Active') {
                    $activemessage = "diaktifkan";
                } else {
                    $activemessage = "dinyahaktifkan";
                }

                if (!auth()->user()->hasAnyRole(['admin_hq'])) {
                    if ($user->entity_type == 'App\UserEMC') {

                        $data = [
                            'emel' => $user->email,
                            'peranan' => $entity,
                            'name' => $user->name,
                            'username' => $user->username,
                            'password' => $password,
                            'no_fail_jas' => $user->project_has_user->projek->no_fail_jas,
                            'nama_projek' => $user->project_has_user->projek->nama_projek,
                        ];

                        sendMail($user, 6, $data);
                    }
                    if ($user->entity_type == 'App\UserEO') {

                        $data = [
                            'emel' => $user->email,
                            'peranan' => $entity,
                            'name' => $user->name,
                            'username' => $user->username,
                            'password' => $password,
                            'no_fail_jas' => $user->project_has_user->projek->no_fail_jas,
                            'nama_projek' => $user->project_has_user->projek->nama_projek,
                        ];

                        sendMail($user, 6, $data);
                    }
                    if ($user->entity_type == 'App\UserPP') {

                        $data = [
                            'emel' => $user->email,
                            'peranan' => $entity,
                            'name' => $user->name,
                            'username' => $user->username,
                            'password' => $password,
                            'no_fail_jas' => $user->project_has_user->projek->no_fail_jas,
                            'nama_projek' => $user->project_has_user->projek->nama_projek,
                        ];

                        sendMail($user, 6, $data);
                    }
                }

            }

        } else {
            $projekHasUser->status = $request->user_status_id;

            $projek = $projekHasUser->projek;
            $projek->status = 1;
            $projek->save();
        }
        $projekHasUser->save();

        $no_fail_jas = $user->project_has_user->projek->id;
        $jenispengawasan = new JenisPengawasan();
        $checkifexist = $jenispengawasan::where('projek_id', $no_fail_jas)->first();

        if ($checkifexist && $request->pakej_pengawasan_id) {
            // dd('exist');
            $checkifexist->delete();
            $jenispengawasan->projek_id = $no_fail_jas;
            $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
            $jenispengawasan->save();
        }

        $user->update($request->all());

        $user = $user->entity->update([
            'name' => $request->name,
            'province_office_id' => $request->province_office_id,
        ]);

        DB::commit();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function update2(Request $request)
    {
        // dd($request->request);
        // dd('dwdww');
        $user = User::findOrFail($request->id);
        if ($user->entity_type == "App\UserEMC") {
            if ($request->user_status_id == 2) {
                $user->sebab_tidak_aktif = $request->sebabtidakaktif;
                $user->save();
            }

            // tambah komen
            if ($request->user_status_id == 10) {
                $user->komen = $request->komen;
                $user->save();
            }
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'username' => 'required|string',
                // 'username' => 'required|string|unique:user,username,'.$request->id ,
                // 'email' => 'required|email|unique:user,email,'.$request->id,
                'email' => 'required',
                'user_status_id' => 'required|integer',
                // 'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                // If validation failed
                return response()->json(['errors' => $validator->errors()], 422);
            }
        }

        if ($request->user_status_id == 2) {
            $user->sebab_tidak_aktif = $request->sebabtidakaktif;
            $user->save();
        }

        // tambah komen
        if ($request->user_status_id == 10) {
            $user->komen = $request->komen;
            $user->save();
        }

        // $log = new LogSystem;
        // $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        // $log->activity_type_id = 5;
        // $log->description = "Kemaskini Pengurusan Pengguna - Pengguna Luaran";
        // $log->data_old = json_encode($user);

        // $user->update($request->all());

        $projekHasUser = ProjekHasUser::where('user_id', $user->id)->where('projek_id', $request->projek)->first();
        if ($request->user_status_id == 1) {

            $projekHasUser->status = 'Active';
            $projekHasUser->user_flag = 1;

            // kalau aktifkan user akan shoot email ke PP
            // $projekUser = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            // ->where('model_has_role.role_id',4)
            // ->where('projek_has_user.projek_id',$user->project_has_user->projek->id)
            // ->where('projek_has_user.status',"Active")
            // ->first();
            // dd($user->project_has_user->projek->id);
            // if($request->password){
            //     $password = $request->password;
            // }else{
            // $password = 'password';
            // $password = $this->generateRandomString();
            // }
            // dd('dwdw');
            // Mail::to($projekUser->user->email)->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));
            // $user->password = bcrypt($password);
            // $user->save();

            // Mail::to($user->email)->queue(new PengesahanPengguna($user, 'Pengesahan Pengguna.', $password));

        } else {
            $projekHasUser->status = 'Tidak';
            $projekHasUser->user_flag = 0;
        }
        $projekHasUser->save();

        // if($request->password){

        // }

        // $user = $user->entity->update([
        //     'name' => $request->name,
        //     'province_office_id' => $request->province_office_id,
        // ]);

        // $log->data_new = json_encode($user);
        // $log->url = $request->fullUrl();
        // $log->method = strtoupper($request->method());
        // $log->ip_address = $request->ip();
        // $log->created_by_user_id = auth()->id();
        // $log->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit_password(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini kata laluan Pengurusan Pengguna - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('user.external.password');
    }
    public function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update_password(Request $request)
    {
        // dd($request->new_pass);
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',

        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($request->id);

        $password = bcrypt($request->password);
        $user = $user->update(['password' => $password]);

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        // dd($request->id);
        $user = User::findOrFail($request->id);

        // if($user->entity->tenures->count() > 0){
        //     return response()->json(['status' => 'error', 'title' => 'Harap Maaf!', 'message' => 'Pengguna ini tidak boleh dipadam kerana mempunyai permohonan.']);
        // }

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna Luaran";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->entity->delete();
        $user->delete();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    /**
     * Send email to specific address
     * @param  Request $request
     * @return Response
     */
    public function request_handover(Request $request)
    {

        $user = User::findOrFail($request->id);

        return view('user.external.handover', compact('user'));
    }

    /**
     * Send email to specific address
     * @param  Request $request
     * @return Response
     */
    public function send_handover(Request $request)
    {

        $user = User::findOrFail($request->id);
        Mail::to($request->new_email)->send(new HandedOver($user));

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Notifikasi emel akan dihantar kepada alamat berikut untuk pendaftaran akaun dan penerimaan tugas.']);
    }

}
