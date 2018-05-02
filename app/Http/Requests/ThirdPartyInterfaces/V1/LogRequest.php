<?php

namespace App\Http\Requests\ThirdPartyInterfaces\V1;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'start_date' => 'required',
<<<<<<< Updated upstream
            'end_date' => 'required'
=======
            'end_date' => 'required',
            //'phone' => 'exists:members,mobile'
>>>>>>> Stashed changes
        ];
    }
}
