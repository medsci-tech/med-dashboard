<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class WechatLoginLogRequest
 * @package App\Http\Requests\ThirdPartyInterfaces\V1
 */
class WechatLoginLogRequest extends FormRequest
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
            'phone' => 'unique:members,mobile',
            'identity' => 'required',
            'openid' => 'required'
        ];
    }
}
