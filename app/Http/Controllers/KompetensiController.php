<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kompeten;
use App\UserEO;

class KompetensiController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }
  
  public function index(Request $request) {
    $ic1 = substr_replace($request->username, '-', 6, 0);
    $ic = substr_replace($ic1, '-', 9, 0);

    $check_if_exist = UserEO::where('username',$ic)->get();
    $response = file_get_contents('http://eimas.doe.gov.my/api/ekas/list.php?ic='.$ic);
    // ic test 891014026191
    $response = json_decode($response);

    if($response){
      return response()->json(['result' => $response,'success'=>true]);
    }else{
      return response()->json(['result' => $response,'success'=>false]);
    }
  }
}