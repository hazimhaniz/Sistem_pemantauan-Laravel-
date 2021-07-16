<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\Http\Controllers\Controller;
use App\JasFail;
use App\JasFailDetail;
use App\JasFailDetailAktiviti;
use App\LogModel\LogSystem;
use App\MasterModel\MasterActivity;
use App\MasterModel\MasterPeringkatPengawasan;
use App\Notifications\SendMail;
use App\User;
use App\UserStaff;
use Illuminate\Http\Request;

class RekodEkasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 34;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Ekas - Pengguna Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $state = [];
            $user = auth()->user()->id;
            $user_negeri = UserStaff::where('user_id', $user)->get();
            foreach ($user_negeri as $key => $value) {
                $state[] = $value->state_id;
            }

            if (auth()->user()->username == 'superadmin'){
                $state = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];

            }


            $jasfail = JasFailDetail::query();
            $jasfail->select('jas_fail.id', 'jas_fail.name', 'jas_fail.nofail', 'jas_fail.status', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.jas_ekas_id', 'jas_fail_detail.negeri')
                ->leftJoin('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.id');

            if (!in_array(17, $state)) {
                $jasfail->whereIn('jas_fail_detail.negeri', $state);
            }

            $jasfail->orderBy('jas_fail_detail.negeri');
            $jasfail->whereNotNull('jas_fail.nofail');

            if ($request->has('status')) {
                $distributionProjeks = Distribution::get()->pluck('no_fail_jas')->toArray();
                if ($request->status == "belum_diagih") {
                    $jasfail->whereNotIn('jas_fail.nofail', $distributionProjeks);
                }

                if ($request->status == "telah_diagih") {
                    $jasfail->whereIn('jas_fail.nofail', $distributionProjeks)->orderBy('jas_fail_detail.updated_at', 'DESC');
                }
            }

            return datatables()->of($jasfail->get())

                ->editColumn('name', function ($jasfail) {
                    if ($jasfail->name) {
                        return '<span class="ow pull-left">' . strtoupper($jasfail->name) . "</span>";
                    } else {
                        return '';
                    }

                })
                ->editColumn('nofail', function ($jasfail) {
                    if ($jasfail->nofail) {
                        return strtoupper($jasfail->nofail);
                    } else {
                        return '';
                    }
                })
                ->editColumn('negeri', function ($jasfail) {
                    if ($jasfail->negeri) {
                        return strtoupper($jasfail->negeri_nama->name);
                    } else {
                        return '';
                    }
                })
                ->editColumn('assign', function ($jasfail) {

                    $pelulus = "<b class='jawatan'>Pelulus: </b> ";
                    $penyelia = "<b class='jawatan'>Penyelia: </b> ";
                    $penyiasat = "<b class='jawatan'>Penyiasat: </b> ";
                    
                    if($jasfail->jasfail->distribute)
                    {
                        if($jasfail->jasfail->distribute->assignstaffpelulus)
                        {
                            $pelulus .= $jasfail->jasfail->distribute->assignstaffpelulus->name;
                        }

                        if($jasfail->jasfail->distribute->assignstaffpenyelia)
                        {
                            $penyelia .= $jasfail->jasfail->distribute->assignstaffpenyelia->name;
                        }

                        if($jasfail->jasfail->distribute->assignstaff)
                        {
                            $penyiasat .= $jasfail->jasfail->distribute->assignstaff->name;
                        }
                    }

                    $pelulus = "<span class='ow pull-left text-dark p-b-5'>".$pelulus."</span>";
                    $penyelia = "<span class='ow pull-left text-dark p-b-5'>".$penyelia."</span>";
                    $penyiasat = "<span class='ow pull-left text-dark p-b-5'>".$penyiasat."</span>";

                    return $pelulus."<br/>".$penyelia."<br/>".$penyiasat."<br/>";
                })
                ->editColumn('updated_at', function ($jasfail) {
                    if ($jasfail->jasfail->updated_at) {
                        return date("d/m/Y", strtotime($jasfail->jasfail->updated_at));
                    } else {
                        return '';
                    }
                })
                ->editColumn('action', function ($jasfail) {
                    $button = "";
                    if (\Auth::user()->hasRole('penyelia') || (\Auth::user()->hasRole('penyiasat') && \Request::get('status') == 'telah_diagih') || (\Auth::user()->hasRole('pengarah') && \Request::get('status') == 'telah_diagih')) {
                        $button .= '<a onclick="edit(' . $jasfail->jasfail->id . ')" href="javascript:;" class="btn fail btn-sm mb-1 m-l-5">Tindakan<i class=""></i> </a>';
                    }
                    return $button;

                })
                ->make(true);
        }
        return view('rekod_ekas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $log = new LogSystem;
        $log->module_id = 34;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Ekas";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $this->data['jasfail'] = $jasfail = JasFail::where('id', $id)->first();
        $status = $jasfail->status;
        if ($jasfail->status != 0) {
            $status1 = $jasfail->getstatus->name;
        } else {
            $status1 = '-';
        }
        $this->data['status1'] = $status1;
        $this->data['status'] = $status;
        $jasdetail = $jasfail->jasdetail->jas_ekas_id;
        $jasfailaktiviti = JasFailDetailAktiviti::where('ekas_id', $jasdetail)->get();
        foreach ($jasfailaktiviti as $keyjasfailaktiviti => $valuejasfailaktiviti) {
            $aktiviti_kod[] = $valuejasfailaktiviti->aktiviti;
            $aktiviti_name = MasterActivity::where('aktiviti', 'like', '%' . $valuejasfailaktiviti->aktiviti . '%')->first();
            if ($aktiviti_name) {
                $aktiviti_id[] = $aktiviti_name->keterangan;
            } else {
                $aktiviti_id[] = 'tiada';
            }
        }
        $this->data['aktiviti'] = implode(", ", $aktiviti_id);
        $this->data['aktivitikod'] = implode(", ", $aktiviti_kod);
        $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();
        $distribute = Distribution::where('no_fail_jas', $jasfail->nofail)->where('active', 1)->first();
        if ($distribute) {
            $this->data['distribute'] = $distribute->assigned_to_user_id;
        } else {
            $this->data['distribute'] = '';

        }
        $this->data['staff_states'] = $staff_states = UserStaff::where('state_id', $jasfail->jasdetail->negeri)
            ->with(['detail_user', 'role'])
            ->whereHas('detail_user', function ($user) {
                return $user->whereHas('model_has_role', function ($role) {
                    return $role->whereIn('role_id', [7]);
                });
            })->get();

        $this->data['staff_penyelia'] = $staff_states1 = UserStaff::where('state_id', $jasfail->jasdetail->negeri)
            ->with(['detail_user', 'role'])
            ->whereHas('detail_user', function ($user) {
                return $user->whereHas('model_has_role', function ($role) {
                    return $role->whereIn('role_id', [8]);
                });
            })->get();

        $this->data['staff_pelulus'] = $staff_states2 = UserStaff::where('state_id', $jasfail->jasdetail->negeri)
            ->with(['detail_user', 'role'])
            ->whereHas('detail_user', function ($user) {
                return $user->whereHas('model_has_role', function ($role) {
                    return $role->whereIn('role_id', [9]);
                });
            })->get();

        return view('rekod_ekas.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->penyelia);
        $jasfail = JasFail::findOrFail($request->id);

        if ($jasfail) {
            $log = new LogSystem;
            $log->module_id = 34;
            $log->activity_type_id = 2;
            $log->description = "Kemaskini Data Maklumat Ekas";
            $log->data_old = json_encode($jasfail);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        $jasfail->update($request->all());

        $distribute = Distribution::where('no_fail_jas', $jasfail->nofail)->where('active', 1)->first();

        if ($distribute) {

            if ($request->penyiasat) {
                $log1 = new LogSystem;
            }

            $log1->module_id = 34;
            $log1->activity_type_id = 12;
            $log1->description = "Pertukaran Pegawai - Rekod EKAS";
            $log1->data_old = json_encode($distribute);

            $distribution = $distribute;
            $distribution->no_fail_jas = $jasfail->nofail;
            $distribution->assigned_to_user_id = $request->penyiasat;
            $distribution->assigned_pelulus = $request->pelulus;
            $distribution->assigned_penyelia = $request->penyelia;
            $distribution->assigned_to_user_id_old = $distribute->assigned_to_user_id;
            $distribution->assigned_by = auth()->user()->id;
            $distribution->active = 1;
            $distribution->save();

            $log1->data_new = json_encode($distribute);
            $log1->url = $request->fullUrl();
            $log1->method = strtoupper($request->method());
            $log1->ip_address = $request->ip();
            $log1->created_by_user_id = auth()->id();
            $log1->save();

        } else {
            if ($request->penyiasat) {
                $distribution = Distribution::create(
                    [
                        'no_fail_jas' => $jasfail->nofail,
                        'assigned_to_user_id' => $request->penyiasat,
                        'assigned_pelulus' => $request->pelulus,
                        'assigned_penyelia' => $request->penyelia,
                        'assigned_by' => auth()->user()->id,
                        'active' => 1,
                    ]
                );
            }

        }

        $data = $request->all();
        if ($distribution->assigned_to_user_id) {
            $peranan = 'Pegawai Penyiasat';

            $user = User::find($distribution->assigned_to_user_id);
            $data['peranan'] = 'Pegawai Penyiasat';
            $data['receiver_user_id'] = $distribution->assigned_to_user_id;
            $data['nama_projek'] = $jasfail->name;
            $data['no_fail_jas'] = $jasfail->nofail;
            $data['nama'] = $user->name;

            sendMail($user, 4, $data);
            sendNotification(32, $data);

            // Mail::to($distribution->assignstaff->email)->send(new KemaskiniProjek($request->all(), 'Agihan Tugasan', $peranan));
            // Inbox::create([
            //     'subject' => 'Agihan Tugasan - ' . $jasfail->nofail,
            //     'message' => 'Tuan / Puan telah dilantik sebagai Pegawai Penyiasat di dalam Sistem Pemantauan EIA (SPEIA)<br>
            //         untuk menguruskan laporan-laporan bulanan bagi projek:<br>
            //         No Fail JAS: ' . $jasfail->nofail . '<br>
            //         Nama Projek: ' . $jasfail->name . '<br>',
            //     'sender_user_id' => auth()->id(), //penyelia
            //     'receiver_user_id' => $distribution->assigned_to_user_id, //Penyiasat
            //     'inbox_status_id' => 2,
            // ]);
        }
        if ($distribution->assigned_pelulus) {
            $peranan = 'Pelulus';

            $user = User::find($distribution->assigned_pelulus);
            $data['peranan'] = 'Pelulus';
            $data['receiver_user_id'] = $distribution->assigned_pelulus;
            $data['nama_projek'] = $jasfail->name;
            $data['no_fail_jas'] = $jasfail->nofail;
            $data['nama'] = $user->name;

            sendMail($user, 4, $data);
            sendNotification(32, $data);

            // Mail::to($distribution->assignstaffpelulus->email)->send(new KemaskiniProjek($request->all(), 'Agihan Tugasan', $peranan));
            // Inbox::create([
            //     'subject' => 'Agihan Tugasan - ' . $jasfail->nofail,
            //     'message' => 'Tuan / Puan telah dilantik sebagai Pegawai Pelulus di dalam Sistem Pemantauan EIA (SPEIA)<br>
            //             untuk menguruskan laporan-laporan bulanan bagi projek:<br>
            //             No Fail JAS: ' . $jasfail->nofail . '<br>
            //             Nama Projek: ' . $jasfail->name . '<br>',
            //     'sender_user_id' => auth()->id(), //penyelia
            //     'receiver_user_id' => $distribution->assigned_pelulus, //Pelulus
            //     'inbox_status_id' => 2,
            // ]);
        }
        if ($distribution->assigned_penyelia) {
            $peranan = 'Pegawai Penyelia';

            $user = User::find($distribution->assigned_penyelia);
            $data['peranan'] = 'Pegawai Penyelia';
            $data['receiver_user_id'] = $distribution->assigned_penyelia;
            $data['nama_projek'] = $jasfail->name;
            $data['no_fail_jas'] = $jasfail->nofail;
            $data['nama'] = $user->name;

            sendMail($user, 4, $data);
            sendNotification(32, $data);

            // Mail::to($distribution->assignstaffpenyelia->email)->send(new KemaskiniProjek($request->all(), 'Agihan Tugasan', $peranan));
            // Inbox::create([
            //     'subject' => 'Agihan Tugasan - ' . $jasfail->nofail,
            //     'message' => 'Tuan / Puan telah dilantik sebagai Pegawai Penyelia di dalam Sistem Pemantauan EIA (SPEIA)<br>
            //                 untuk menguruskan laporan-laporan bulanan bagi projek:<br>
            //                 No Fail JAS: ' . $jasfail->nofail . '<br>
            //                 Nama Projek: ' . $jasfail->name . '<br>',
            //     'sender_user_id' => auth()->id(), //penyelia
            //     'receiver_user_id' => $distribution->assigned_penyelia, //Penyelia
            //     'inbox_status_id' => 2,
            // ]);
        }

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
