<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:32',
            'gender' => 'required|in:Female,Male',
            'culture' => 'min:3|max:64',
            'died' => 'required|min:3|max:128',
            'born' => 'min:3|max:128'
        ];
    }
}
