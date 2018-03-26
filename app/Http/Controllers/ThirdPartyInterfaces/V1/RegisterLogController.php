<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\RegisterLogRequest;
use App\Models\MimeRegisterLog;
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
        MimeRegisterLog::create([
            'phone' => $request->input('phone'),
            'identity' => $request->input('identity')
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
