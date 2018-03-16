<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V0;

use Illuminate\Foundation\Http\FormRequest;

class TestConnection extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }


    public function handle()
    {
        return response()->json([
            'status' => '1',
            'message' => '接入成功！'
        ]);
    }
}
