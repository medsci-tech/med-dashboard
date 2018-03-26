<?php

namespace App\Http\Controllers\DashBoard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function handleRequest(Request $request)
    {
        return response()->json([
            'status' => 1,
            'message' => 'success'
        ]);
    }
}
