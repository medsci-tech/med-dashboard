<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\LogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class LogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class LogController extends Controller
{

    /**
     * @param LogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(LogRequest $request)
    {
        return response()->json([
            'status' => 1,
            'message' => '记录成功。'
        ]);
    }
}
