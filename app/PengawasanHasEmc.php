<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PengawasanHasEmc extends Model
{
    protected $table = 'pengawasan_has_emc';

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function pengawasan() {
        return $this->belongsTo('App\PakejHasPengawasan', 'pakej_has_pengawasan_id', 'id');
    }

    public function pengawasanEMC($projek_id) {

        $status = PengawasanHasEmc::select('*','pengawasan_has_emc.id as pengawasanEMCid','pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.projek_pakej_id','s.jenis_pengawasan_id', 's.stesen', DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.user_id',auth()->user()->id)
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->get();
        
        // dd($status);
		// dd(vsprintf(str_replace(['?'], ['\'%s\''], $status->toSql()), $status->getBindings()));

        return $status;
    }

    public function stesenstatus($projek_id) {
        $status = PengawasanHasEmc::select('*','pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.projek_pakej_id','s.jenis_pengawasan_id', 's.stesen', DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->get();
       
        // dd($status);
		// dd(vsprintf(str_replace(['?'], ['\'%s\''], $status->toSql()), $status->getBindings()));

        return $status;
    }


    public function stesenstatususer($projek_id, $user_id) {
        // dd($projek_id);
        $status = PengawasanHasEmc::select('*','pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen',DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->where('pengawasan_has_emc.user_id',$user_id)->get();
        // dd($Sstatus);
        // dd($status);
        $statusall = 'Lengkap';
        $pakejPengawasan = array();
	    foreach ($status as $key1 => $value1) {
            // $stak[] = $value1;
            $pakejPengawasan[] = $value1->pakej_has_pengawasan_id;

	        if ($value1->status_stesen == 'Belum Lengkap') {
	            return 'Tidak Lengkap';
	        }
        }

        $pakejPengawasanJson = json_encode($pakejPengawasan);
        // dd($status);
        if ($statusall == "Lengkap") {
            $statusall = $this->getCurretStatusForEMC($projek_id, $user_id , $pakejPengawasanJson);
        }

        return $statusall;
    }

    public function getCurretStatusForEMC($projek_id, $user_id, $pakejPengawasanJson) {
        $pakejPengawasanJson = json_decode($pakejPengawasanJson);
        $status = PengawasanHasEmc::select('*','pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen',DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->whereIn('pakej_has_pengawasan_id',$pakejPengawasanJson)->where('pengawasan_has_emc.user_id',$user_id)->get();
        
        $statusall = "Semakan PP";
        foreach ($status as $statuss) {
            if ($statuss->is_hantar == 0) {
                $statusall = "Lengkap";
            }
        }
        
        return  $statusall;
    
    }

    public function stesenstatuspp($projek_id) {
        $status = PengawasanHasEmc::select('pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen',DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->get();
        $statusall = 1;
        $projekpakej = ProjekPakej::where('projek_id',$projek_id)->get();
        foreach ($projekpakej as $key => $value) {
	    foreach ($status as $key1 => $value1) {
	        // $stak[] = $value1;
            if ($value->id == $value1->pakej_id) {
    	        if ($value1->status_stesen == 'Belum Lengkap') {
    	            $statusall = 0;
    	        }
            }
	    }
        }
        // dd($statusall);

        return $statusall;
    }

    public function pakejbyemc($projek_id, $user_id) {
        $status = PengawasanHasEmc::select('pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen')
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->where('pengawasan_has_emc.user_id',$user_id)->groupBy('php.pakej_id')->get();
        // dd($status);
        // dd($status);
        $statusall = 1;
        $pakej = array();
        foreach ($status as $key1 => $value1) {
            $pakej[] = $value1->pakej_id;
        }
        // dd($pakej);
        return $pakej;
    }

    public function detailbyemc($projek_id, $user_id, $pakej) {
        $status = PengawasanHasEmc::select('pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.id as stesen_id','s.jenis_pengawasan_id', 's.stesen')
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('s.projek_pakej_id',$pakej)->where('php.status',1)->where('pengawasan_has_emc.user_id',$user_id)->pluck('stesen_id');
        // dd($status);
        // dd($status);
        $statusall = 1;
        $pakej = array();
        // foreach ($status as $key1 => $value1) {
        //     $pakej[] = $value1;
        // }
        // dd($pakej);
        return $status;
    }

    public function emchasmarin($projek_id, $user_id) {
        $status = PengawasanHasEmc::select('pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen',DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)
        ->where('php.pengawasan_id',2)
        ->where('php.status',1)
        ->where('pengawasan_has_emc.user_id',$user_id)->first();
        $statusall = 1;
        if (is_null($status)) {
        	$statusall = 0;
        }
        return $statusall;
    }

    public function createPengawasanDetails($projek_id, $user_id) {

        $status = PengawasanHasEmc::select('pengawasan_has_emc.user_id', 'phu.projek_id', 'php.pakej_id', 'php.pengawasan_id', 's.jenis_pengawasan_id', 's.stesen',DB::raw('(CASE WHEN s.stesen IS NULL THEN "Belum Lengkap" ELSE "Lengkap" END) as status_stesen'))
        ->leftJoin('projek_has_user as phu', 'pengawasan_has_emc.user_id','=','phu.user_id')
        ->leftJoin('pakej_has_pengawasan as php', 'pengawasan_has_emc.pakej_has_pengawasan_id','=','php.id')
        ->leftJoin('stesen as s',function ($join) {
            $join->on('s.projek_pakej_id', '=', 'php.pakej_id');
            $join->on('s.jenis_pengawasan_id', '=', 'php.pengawasan_id');
        })
        ->where('phu.projek_id',$projek_id)->where('php.status',1)->where('pengawasan_has_emc.user_id',$user_id)->get();
        // dd($status);
        // foreach()
        // dd($status);
        // dd($status);
        $statusall = 'Semakan PP';
	    foreach ($status as $key1 => $value1) {
	        // $stak[] = $value1;
	        if ($value1->status_stesen == 'Belum Lengkap') {
	            return 'Tidak Lengkap';
	        }
        }
        
    }
}
