<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    private function responseSuccess(array $response) : JsonResponse {
        return response()->json(['success' => true,'result' => ($response["result"] ?? ""),'message' => $response["message"] ?? ""], 200);
    }                 

    private function responseError(array $response) : JsonResponse {
        return response()->json(['success' => false,'result' => ($response["result"] ?? ""),'message' => $response["message"] ?? ""], 400);
    }   

    public function responseData(array $response) : JsonResponse {
        if ($response["success"] === true){
            return $this->responseSuccess($response);
        }
        return $this->responseError($response);
    }
}