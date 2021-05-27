<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatioRequest extends FormRequest
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
            'width' => 'required|integer|between:100,500',
            'height' => 'required|integer|between:100,500',
            'background' => ['required', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'color' => ['required', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'], // todo вынести в кастомное правило
        ];
    }
}
