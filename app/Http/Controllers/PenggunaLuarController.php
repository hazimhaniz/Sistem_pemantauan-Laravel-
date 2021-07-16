<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaLuarController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function emc(){
		return view('form.PenggunaLuar.EMC');
	}

	public function eo(){
		return view('form.PenggunaLuar.EO');
	}

	public function pp(){
		return view('form.PenggunaLuar.penggerakProjek');
	}
}
