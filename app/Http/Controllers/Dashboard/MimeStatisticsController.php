<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use App\Models\MimeStatistics;
use Illuminate\Http\Request;

/**
 * Class MimeStatisticsController
 * @package App\Http\Controllers\DashBoard
 */
class MimeStatisticsController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(Request $request)
    {
        return response()->json([
            'status' => 1,
            'data' => MimeStatistics::first()->toArray()
        ]);
    }
}
