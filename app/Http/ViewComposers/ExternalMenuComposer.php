<?php
namespace App\Http\ViewComposers;

use App\Projek;
use App\ProjekHasUser;
use Auth;
use Illuminate\View\View;

class ExternalMenuComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $projeks = [];
        $user = Auth::user();

        if ($user) {
            $projekIDs = ProjekHasUser::where('status', 101)->where('user_id', $user->id)->whereIn('role_id', [4, 5, 6])->get()->pluck('projek_id')->toArray();
            // $projeks = Projek::where('status', 200)->whereIn('id', $projekIDs)->get();
            $projeks = Projek::whereIn('projek.status', [ 211, 212, 203, 204, 200])->whereIn('projek.id', $projekIDs)->join('projek_detail', 'projek_detail.projek_id','=','projek.id')->whereIn('projek_detail.status_id',[500, 211,203,204,212])->select(['projek.id as id',
                                'projek.no_fail_jas',
                                'projek.nama_projek',
                                'projek.status'])->get();

            foreach ($projeks as $key1 => $projek) {
                $userPPs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 4)->whereNotIn('status',[110])->get();
                foreach ($userPPs as $key => $userPP) {
                    if ($userPP->status != 101) {
                        $projeks->forget($key);
                    }
                }

                $userEOs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 5)->whereNotIn('status',[110])->get();
                if (count($userEOs) == 0) {
                    $projeks->forget($key1);
                } else {
                    foreach ($userEOs as $key => $userEO) {
                        if ($userEO->status != 101) {
                            $projeks->forget($key);
                        }
                    }
                }

                $userEMCs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 6)->whereNotIn('status',[110])->get();
                if (count($userEMCs) == 0) {
                    $projeks->forget($key1);
                } else {
                    foreach ($userEMCs as $key => $userEMC) {
                        if ($userEMC->status != 101) {
                            $projeks->forget($key);
                        }
                    }
                }
            }
        }

        $view->with(['projeks' => $projeks]);
    }
}
