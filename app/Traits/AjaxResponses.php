<?php

namespace App\Traits;

trait AjaxResponses{
    private function success($data = [], string $message = 'OK', int $code = 200) {
        return response()->json(['data'=>$data,'message'=>$message],$code);
    }

    protected function error($data, $message=null, $code=404){
       return response()->json([
        'status'=>0,
        'message'=>$message,
        'data'=>$data,
        ],$code);
    }
}