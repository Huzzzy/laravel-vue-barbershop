<?php

namespace App\Http\Requests\Master;

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
            'name' => 'required|string',
            'description' => 'required|string',
            'photo' => 'file',
            'available_days' => 'string|nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $date = explode('/', $this->available_days);
        list($date[0], $date[1], $date[2]) = [$date[2], $date[0], $date[1]];
        $date = implode('-', $date);
        $this->merge([
            'date' => $date,
        ]);
    }
}
