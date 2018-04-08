<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThirdPartyInterfaces\V1\WechatLoginLogRequest;
use App\Models\MimeWechatLoginLog;

/**
 * Class WechatLoginLogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class WechatLoginLogController extends Controller
{

    /**
     * @param WechatLoginLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(WechatLoginLogRequest $request)
    {
        MimeWechatLoginLog::create([
            'phone' => $request->input('phone'),
            'identity' => $request->input('identity'),
            'openid' => $request->input('openid'),
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
