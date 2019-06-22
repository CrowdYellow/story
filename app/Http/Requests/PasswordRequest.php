<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'oldPassword' => ['required', 'string', 'min:8'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'oldPassword' => '原密码',
        ];
    }
}
