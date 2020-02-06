<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser{

    public function successResponse($data, $code = Response::HTTP_OK){
        // $data = array('a', 'b');
        return response($data, $code)->header('Content-Type', 'application/json');
    }


    public function errorResponse($message, $code){
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    public function errorMessage($message, $code){
        return response($message, $code)->header('Content-Type', 'application/json');
    }

}
