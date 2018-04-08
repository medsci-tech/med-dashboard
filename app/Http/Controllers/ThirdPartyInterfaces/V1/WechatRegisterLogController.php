<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\WechatRegisterLogRequest;
use App\Http\Controllers\Controller;
use App\Models\MimeWechatRegisterLog;

/**
 * Class WechatRegisterLogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class WechatRegisterLogController extends Controller
{

    /**
     * @param WechatRegisterLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(WechatRegisterLogRequest $request)
    {
        MimeWechatRegisterLog::create([
            'phone' => $request->input('phone'),
            'identity' => $request->input('identity'),
            'openid' => $request->input('openid')
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
