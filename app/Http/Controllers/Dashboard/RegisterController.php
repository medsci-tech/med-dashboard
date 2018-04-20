<?php

namespace App\Http\Controllers\DashBoard;

use App\Facades\Helper\Helper;
use App\Http\Requests\DashBoard\RegisterLogRequest;
use App\Models\MimeRegisterLog;
use App\Http\Controllers\Controller;

/**
 * Class RegisterController
 * @package App\Http\Controllers\DashBoard
 */
class RegisterController extends Controller
{
    /**
     * @param RegisterLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(RegisterLogRequest $request)
    {
        $dates = Helper::getDateFromRange($request->input('start_date'), $request->input('end_date'));
        $countArray = array();
        foreach ($dates as $date) {
            $countArray[$date] = MimeRegisterLog::whereBetween('created_at', [date_create($date), date_create(date("Y-m-d", strtotime("+1 day", strtotime($date))))])->count();
        }
        return response()->json([
            'status' => 1,
            'data' => $countArray
        ]);
    }
}
