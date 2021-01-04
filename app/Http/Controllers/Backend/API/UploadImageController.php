<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('admin.master.upload');
    }

    public function store(Request $request)
    {
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $extension = $request->file('upload')->getClientOriginalExtension();
            $temp_date = Carbon::now()->format('Y-m-d-h-i');
            $time = Carbon::now()->format('Y-m-d-h-i-s');
            $fileName = $time.$request->file('upload')->getClientOriginalName();
            $request->file('upload')->storeAs('tmp/'.$temp_date.'/'.Auth::id().'/ckeditor/',$fileName,'public');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/tmp/'.$temp_date.'/'.Auth::id().'/ckeditor/'.$fileName);
            $msg = 'Upload image successfully';
//            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url', '$msg')</script>";
//            @header('Content-type:text/html; charset=utf-8');
//            echo $response;

            return response()->json([
                "uploaded"=> 1,
                "fileName"=> $fileName,
                "url"=> $url
            ]);
        }
        return response()->json([
            "uploaded"=> 0,
            "error"=> [
                "message"=> "Error upload file"
            ]
        ]);
    }
}
