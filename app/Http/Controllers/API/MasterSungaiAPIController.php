<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterSungai;

class MasterSungaiAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getRivers(Request $request)
    {
        try {
            $rivers = MasterSungai::select('id', 'lembangan_2020', 'sungai_2020')
                ->where('lembangan_2020', 'LIKE', '%' . $request->lembangan . '%')
                ->groupBy('sungai_2020')
                ->get();

            if (!$rivers) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiada Sungai Untuk ' . $request->lembangan . '.'
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Berjaya Mendapatkan Maklumat Sungai.',
                'data' => $rivers
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
