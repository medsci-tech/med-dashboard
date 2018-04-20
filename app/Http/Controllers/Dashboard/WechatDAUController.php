<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use App\Facades\Helper\Helper;
use App\Http\Requests\DashBoard\LogRequest;
use App\Models\MimeWechatLoginLog;

/**
 * Class WechatDAUController
 * @package App\Http\Controllers\DashBoard
 */
class WechatDAUController extends Controller
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
            $countArray[$date] = sizeof(MimeWechatLoginLog::whereBetween('created_at', [date_create($date), date_create(date("Y-m-d", strtotime("+1 day", strtotime($date))))])->distinct('phone')->get());
        }
        return response()->json([
            'status' => 1,
            'data' => $countArray
        ]);
    }
}
