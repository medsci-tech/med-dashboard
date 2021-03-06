<?php

namespace App\Http\Controllers\DashBoard;

use App\Facades\Helper\Helper;
use App\Http\Requests\ThirdPartyInterfaces\V1\LogRequest;
use App\Http\Controllers\Controller;
use App\Models\MimeUserProfileLog;

/**
 * Class ProfileController
 * @package App\Http\Controllers\DashBoard
 */
class ProfileController extends Controller
{
    /**
     * @param LogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(LogRequest $request)
    {
        $dates = Helper::getDateFromRange($request->input('start_date'), $request->input('end_date'));
        $countArray = array();
        foreach ($dates as $date) {
            $countArray[$date] = MimeUserProfileLog::whereBetween('created_at', [date_create($date), date_create(date("Y-m-d", strtotime("+1 day", strtotime($date))))])->count();
        }
        return response()->json([
            'status' => 1,
            'data' => $countArray
        ]);
    }
}
