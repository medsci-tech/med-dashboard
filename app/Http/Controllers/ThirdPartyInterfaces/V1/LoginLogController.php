<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\LoginLogRequest;
use App\Models\MimeLoginLog;
use App\Http\Controllers\Controller;

/**
 * Class LoginLogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class LoginLogController extends Controller
{

    /**
     * @param LoginLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(LoginLogRequest $request)
    {
        MimeLoginLog::create([
            'phone' => $request->input('phone'),
            'identity' => $request->input('identity')
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
