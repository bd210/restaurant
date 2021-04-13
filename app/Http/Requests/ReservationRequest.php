<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'name'=> 'required|min:3|max:25',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d\TH:i',
            'people' => 'required|numeric',
            'message' => 'required|min:5|max:10000'
        ];
    }
}
