<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
        $rules = [
            'title' => 'required|not_html',
            'description' => 'required',
            'email' => 'required|email',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'not_html' => 'The :attribute may not contain HTML.'
        ];
    }
}
