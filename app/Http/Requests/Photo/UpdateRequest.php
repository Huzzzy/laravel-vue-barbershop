<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'file_path' => 'file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Наименование должно быть заполнено',
            'title.string' => 'Поле Наименование должно быть строкой',
            'file_path.required' => 'Поле Фото должно быть заполнено',
            'file_path.file' => 'Поле Фото должно быть файлом',
        ];
    }
}
