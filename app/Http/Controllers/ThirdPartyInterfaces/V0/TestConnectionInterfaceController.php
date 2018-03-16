<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V0;

use App\Http\Requests\ThirdPartyInterfaces\V0\TestConnection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestConnectionInterfaceController extends Controller
{

    public function handleRequest(TestConnection $request)
    {
        return $request->handle();
    }
}
