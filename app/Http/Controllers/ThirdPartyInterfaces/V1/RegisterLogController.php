<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\RegisterLogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RegisterLogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class RegisterLogController extends Controller
{

    /**
     * @param RegisterLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(RegisterLogRequest $request)
    {
        return response()->json([
            'status' => 1,
            'message' => '记录成功。'
        ]);
    }
}
