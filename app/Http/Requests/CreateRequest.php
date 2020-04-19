<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
          'isbn' => ['required', 'integer','min:1'],
        ];
    }

    public function messages()
    {
      return [
        'isbn.required' => 'コードは必ず入力してください',
        'isbn.integer' => 'コードは半角整数で入力してください',
      ];
    }
}
