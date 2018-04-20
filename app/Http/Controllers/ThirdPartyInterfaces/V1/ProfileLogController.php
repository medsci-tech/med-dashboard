<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\V1\MimeRequest;
use App\Http\Controllers\Controller;
use App\Models\MimeUserProfileLog;

/**
 * Class ProfileLogController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V1
 */
class ProfileLogController extends Controller
{

    /**
     * @param MimeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(MimeRequest $request)
    {
        MimeUserProfileLog::create([
            'phone' => $request->input('phone'),
            'identity' => $request->input('identity')
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
