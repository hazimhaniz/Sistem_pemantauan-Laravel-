<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ADintegrationController extends Controller
{
    public function index(Request $request) {


      $ldaprdn  = 'ldp2-service@doe.gov.my';
      $basedn = 'DC=doe,DC=gov,DC=my';
      $ldappass = 'P@ssword@ldp2';  // associated password
      $ldapserver = "ldap://10.19.158.16";
      // connect to ldap server
      // $word = 'doe.gov.my';
      // if (strpos($request->email, $word) !== false) {
        try {
          $ldapconn = ldap_connect($ldapserver);
          if(FALSE === $ldapconn){
            return response()->json(['result' => "server"]);
          }
          ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
          ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

          if(TRUE == @ldap_bind($ldapconn,$ldaprdn, $ldappass)){
              $filter ="(mail=$request->email)";
              $result = ldap_Search($ldapconn,$basedn,$filter);
              $AdData = ldap_get_entries($ldapconn,$result);
              // dd($AdData);
              if($AdData['count'] <> 0){
                $cawangan = $this->DateCheck($AdData[0]['physicaldeliveryofficename'][0]);
                $name = $AdData[0]['cn'][0];
                $username = $AdData[0]['displayname'][0];
                $userfound = User::where('email',$request->email)->first();
                // dd($AdData[0]['physicaldeliveryofficename'][0]);
                // dd($cawangan);

                if($userfound){
                    
                  if (!is_null($userfound->deleted_at)) {
                      if(auth()->user()->hasRole('admin_state') && $cawangan == 17){
                          return response()->json(['result' => "no"]);
                      }else{
                        if (auth()->user()->hasRole('admin_state')) {
                            if (auth()->user()->entity_staff->state_id == $cawangan && $userfound == null) {
                                return response()->json(['result' => "yes",'name' => $name,'cawangan' => $cawangan,'username' => $username,'negeri' => $AdData[0]['physicaldeliveryofficename'][0]]);
                            }else{
                                return response()->json(['result' => "no"]);
                            }
                        } else {
                            if ($userfound == null) {
                                return response()->json(['result' => "yes",'name' => $name,'cawangan' => $cawangan,'username' => $username,'negeri' => $AdData[0]['physicaldeliveryofficename'][0]]);
                            }else{
                                return response()->json(['result' => "no"]);
                            }
                        }
                      }
                  } else {
                      return response()->json(['result' => "wujud"]);
                  }

                }else{
                      if(auth()->user()->hasRole('admin_state') && $cawangan == 17){
                          return response()->json(['result' => "no"]);
                      }else{
                        if (auth()->user()->hasRole('admin_state')) {
                            if (auth()->user()->entity_staff->state_id == $cawangan) {
                                return response()->json(['result' => "yes",'name' => $name,'cawangan' => $cawangan,'username' => $username,'negeri' => $AdData[0]['physicaldeliveryofficename'][0]]);
                            }else{
                                return response()->json(['result' => "no"]);
                            }
                        } else {
                      // dd($cawangan);
                            return response()->json(['result' => "yes",'name' => $name,'cawangan' => $cawangan,'username' => $username,'negeri' => $AdData[0]['physicaldeliveryofficename'][0]]);
                        }
                          // return response()->json(['result' => "yes",'name' => $name,'cawangan' => $cawangan,'username' => $username]);
                      }

                }
              }else{
                $userfound = User::where('email',$request->email)->first();
                if ($userfound) {
                  return response()->json(['result' => "wujud"]);
                } else {
                  return response()->json(['result' => "no"]);
                }
              }
          }
          else {
              return response()->json(['result' => "server"]);
          }
          ldap_unbind($ldapconn);
        } catch (Exception $e){
          return response()->json(['result' => "server"]);
        }
      // }
    }

    public function DateCheck($cawangan){

      if($cawangan == 'JAS Johor'){
        $cawanganUser = 1;
      }elseif($cawangan == 'JAS Kedah'){
        $cawanganUser = 2;
      }elseif($cawangan == 'JAS Kelantan'){
        $cawanganUser = 3;
      }elseif($cawangan == 'JAS Melaka'){
        $cawanganUser = 4;
      }elseif($cawangan == 'JAS N.9'){
        $cawanganUser = 5;
      }elseif($cawangan == 'JAS Pahang'){
        $cawanganUser = 6;
      }elseif($cawangan == 'JAS P.Pinang'){
        $cawanganUser = 7;
      }elseif($cawangan == 'JAS Perak'){
        $cawanganUser = 8;
      }elseif($cawangan == 'JAS Perlis'){
        $cawanganUser = 9;
      }elseif($cawangan == 'JAS Selangor'){
        $cawanganUser = 10;
      }elseif($cawangan == 'JAS Terengganu'){
        $cawanganUser = 11;
      }elseif($cawangan == 'JAS Sabah'){
        $cawanganUser = 12;
      }elseif($cawangan == 'JAS Sarawak'){
        $cawanganUser = 13;
      }elseif($cawangan == 'JAS WPKL'){
        $cawanganUser = 14;
      }elseif($cawangan == 'JAS Labuan'){
        $cawanganUser = 15;
      }elseif($cawangan == 'JAS WP Putrajaya'){
        $cawanganUser = 16;
      }elseif($cawangan == 'JAS HQ'){
        $cawanganUser = 17;
      }else{
        $cawanganUser = 17;
        // $cawanganUser = 'Tiada '.$cawangan;
      }

    return  $cawanganUser;
  }
}
