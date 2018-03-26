<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Requests\DashBoard\DAURequest;
use App\Http\Controllers\Controller;
use App\Facades\Helper\Helper;
use App\Models\MimeLog;

/**
 * Class DAUController
 * @package App\Http\Controllers\DashBoard
 */
class DAUController extends Controller
{
    /**
     * @param DAURequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(DAURequest $request)
    {
        $dates = Helper::getDateFromRange($request->input('start_date'), $request->input('end_date'));
        $countArray = array();
        foreach ($dates as $date) {
            $countArray[$date] = sizeof(MimeLog::where('action', 'login')->whereBetween('created_at', [date_create($date), date_create(date("Y-m-d", strtotime("+1 day", strtotime($date))))])->distinct('phone')->get());
        }
        return response()->json([
            'status' => 1,
            'data' => $countArray
        ]);
    }
}
