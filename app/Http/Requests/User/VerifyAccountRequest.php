<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class VerifyAccountRequest extends FormRequest
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
            'profile.name'            => 'required',
            'profile.lastname'        => 'required',
            'email'                   => 'required|email|unique:user,email,' . $this->id,
            'profile.phone_number'    => 'required|regex:/^\+(?:[0-9]?){6,14}[0-9]$/',
            'profile.id_card'         => 'nullable|mimes:gif,jpg,jpeg,bmp,png,pdf',
            'profile.proof_residence' => 'nullable|mimes:gif,jpg,jpeg,bmp,png,pdf',
        ];
    }
}
