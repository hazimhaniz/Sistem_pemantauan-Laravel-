<?php

namespace App\Http\Controllers\Review;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review\ReviewCA;
use App\Nofile\NofileAttachment;
use App\Console\Commands\GetNoFailEkas;
use Storage;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_ca(Request $request)
    {
        if($request->ajax()){

            $reviewCA = ReviewCA::orderBy('id', 'DESC');

            return datatables()->of($reviewCA)
                /*->editColumn('created_at', function ($complaint) {
                    return date('d/m/Y h:i A', strtotime($complaint->created_at));
                })*/
                ->make(true);
        }
        return view('review.review_ca');
    }

    public function list_search_ca(Request $request)
    {
        if($request->ajax()){
            $userUnion = UserExternal::where('registration_no', 'LIKE', $request->registration_no)->first();
             //dd($userUnion->name);
            if($userUnion)
                $reviewCA = ReviewCA::where('union_name', 'LIKE', '%'.$userUnion->name.'%')->orderBy('id', 'DESC');
            else
                $reviewCA = ReviewCA::where('id', 0);

            return datatables()->of($reviewCA)
                /*->editColumn('created_at', function ($complaint) {
                    return date('d/m/Y h:i A', strtotime($complaint->created_at));
                })*/
                ->make(true);
        }
        return view('review.review_ca');
    }

    public function nofile_upload_list(Request $request){
        if($request->ajax()){
            $review = NofileAttachment::where('is_submit', 1)->orderBy('id', 'DESC');

            return datatables()->of($review)
                ->editColumn('action', function ($review) {
                    $button = "";
                    $button .= '<a data-toggle="tooltip" title="Muat Turun" href="'.route('admin.review.download.ca', $review->id).'" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-download"></i></a>';
                    if($review->is_submit!=1)
                        $button .= '<a data-toggle="tooltip" title="Kemaskini" href="'.route('admin.review.edit.ca', $review->id).'" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
                    else
                        $button .= '';
                    return $button;
                })
                ->make(true);
        }
        return view('Nofilejas.nofail_upload_list');
    }

    public function view_nofile_upload()
    {
        return view('Nofilejas.review_nofile_upload');
    }

    public function ca_edit_upload(Request $request)
    {
        if($request->ajax()){
            $review = ReviewAttachment::findOrFail($request->id);

            $attachment = [
                'id' => $review->id,
                'name' => $review->name,
                'size' => Storage::disk('uploads')->size($review->url)
            ];

            return response()->json($attachment);
        }
        $id = $request->id;
        return view('review.review_ca_upload', compact('id'));
    }

    public function nofile_upload_submit(Request $request)
    {
        if($request->file('file')->isValid()){
            $path = Storage::disk('uploads')->putFileAs(
                'No_file_Upload',
                $request->file('file'),
                uniqid().'_'.$request->file('file')->getClientOriginalName()
            );

            $review = NofileAttachment::create([
                'name' => $request->file('file')->getClientOriginalName(),
                'url' => $path,
                'type' => 'ekas',
                'created_by_user_id' => auth()->id()
            ]);
         
        }
        
            \Config::set('excel.import.startRow', 2);
            $review = NofileAttachment::findOrFail($review->id);
            $path = Storage::disk('uploads')->path($review->url);
            $data = \Excel::toArray($review,$path);

            if($data){
                $arrayDataItems = $data[0][0];
                $arrayColumn = ['Bil','nofail','jas_ekas_id','name','status','lokasi','negeri','nama_penggerak','pegawai_penggerak','daerah','tarikh_kelulusan','aktiviti','jenis']; 

                if($arrayDataItems == NULL){
                    unset($arrayDataItems);
                }                 //dd($data[0][1]);
                if($arrayDataItems === $arrayColumn){
                    foreach ($data[0] as $key => $value) {
                        if($key > 0){
                            //dd($value);
                            $arr[] = [
                                'name' => $value[3],
                                'nofail' => $value[1],
                                'status' => $value[4],
                            ];
                            $arr2[] = [
                                'jas_ekas_id' => $value[2],
                                'aktiviti' => $value[11],
                                'lokasi' => $value[5],
                                'negeri' => $value[6],
                                'nama_penggerak' => $value[7],
                                'pegawai_penggerak' => $value[8],
                                'daerah' => $value[9],
                                'tarikh_kelulusan' => $value[10],
                            ];
                            $arr3[] = [
                                'ekas_id' => $value[2],
                                'aktiviti' => $value[11],
                                'jenis' => $value[12],
                            ];
                        }
                    }
                } else {
                    return response()->json(['status' => 'error', 'title' => 'Gagal!', 'message' => 'Sila pastikan format excel sama seperti yang diminta.']);
                }
                if(!empty($arr)){
                    $database_int_staging = DB::connection('mysql2');
                    $database_int_staging->table('jas_fail')->insert($arr);
                    $database_int_staging->table('jas_fail_detail')->insert($arr2);
                    $database_int_staging->table('jas_fail_detail_aktiviti')->insert($arr3);
                    $database_int_staging->table('jas_fail_detail')->update(['jas_fail_id'=>DB::raw('id')]);
                    $review->is_submit = 1;
                    $review->save();
                    \Artisan::call('GetNoFail:Ekas');

                    return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data berjaya di import.', 'redirect' => route('admin.review.list.nofile')]);
                }
            }
            
    }

    public function nofile_delete(Request $request)
    {
        $review = NofileAttachment::findOrFail($request->id);
        Storage::disk('uploads')->delete($review->url);
        $review->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

    public function ca_download(Request $request)
    {
        $review = ReviewAttachment::findOrFail($request->id);
        return Storage::disk('uploads')->download($review->url);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

}
