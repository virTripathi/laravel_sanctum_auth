<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\AjaxResponses;
use Illuminate\Support\Facades\DB;

class PhotoUploadController extends Controller
{
    use AjaxResponses;
    public function index(Request $request) {
        if($request->ajax()) {
            $image_validation = Validator::make($request->all(),[
                'file' => ['required', 'image'],
            ]);
            if($image_validation->fails()) {
                return $this->error($image_validation->errors()->all(),'Unprocessable Content',422);
            }
            try {
                $uploadedImage = $request->file('file');
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = $uploadedImage->storeAs('uploads', $imageName, 'public');
                $photo_url = asset('storage/' . $imagePath);
                DB::table('file_uploads')->insert(['url'=>$photo_url]);
                return $this->success(['file_url'=>$photo_url],'Success',201);
            } catch(\Exception $e) {
                return $this->error([],"Some Error Occured!! Please Try Again Later",500);
            }
        }
        return view('photo_upload_using_ajax');
    }
}
