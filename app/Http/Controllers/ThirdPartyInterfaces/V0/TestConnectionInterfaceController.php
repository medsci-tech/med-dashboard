<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V0;

use App\Http\Requests\ThirdPartyInterfaces\V0\TestConnectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TestConnectionInterfaceController
 * @package App\Http\Controllers\ThirdPartyInterfaces\V0
 */
class TestConnectionInterfaceController extends Controller
{

    /**
     * @param TestConnectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(TestConnectionRequest $request)
    {
        return $request->handle();
    }
}
