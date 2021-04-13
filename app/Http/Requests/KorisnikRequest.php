<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KorisnikRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:4|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:25',
            'confirm_password' => 'required|same:password|min:3|max:25',
            'picture'=>'image'


        ];
    }
}
