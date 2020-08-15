<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class StoreProduct extends FormRequest
{

    const ROLE_MAIN = 'admin';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == self::ROLE_MAIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'between:3,20'],
            'price' => ['required', 'numeric']
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно',
            'name.between' => 'Короткая строка (мин. 3 символа)',
            'price.required'  => 'Цена обязательна',
            'price.numeric' => 'Цена может содержать только цифры'
        ];
    }
}
