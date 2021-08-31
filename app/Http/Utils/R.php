<?php

namespace App\Http\Utils;

use HTTP_CODE;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class R extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static public function ok($data = [])
    {
        return response()->json([
            'code' => 200,
            'message' => "success",
            'data' => $data,
        ]);
    }

    static public function error($code,$message, $data = [])
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
