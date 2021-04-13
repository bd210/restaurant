<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialRequest extends FormRequest
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
            'name' => 'required|unique:specials,name|min:3|max:40',
            'title' => 'required|unique:specials,title|min:3',
            'description' => 'required',
            'tab'=> 'required|unique:specials,tab',
            'picture' => 'required|image'
        ];
    }
}
