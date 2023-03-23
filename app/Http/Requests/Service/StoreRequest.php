<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Наименование должно быть заполнено',
            'title.string' => 'Поле Наименование должно быть строкой',
            'price.required' => 'Поле Цена должно быть заполнено',
            'price.integer' => 'Поле Цена должно быть числом',
        ];
    }
}
