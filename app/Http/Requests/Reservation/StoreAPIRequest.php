<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreAPIRequest extends FormRequest
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
            'data.name' => 'string',
            'data.phone' => 'string|min:12|max:12',
            'data.master_id' => 'integer|exists:masters,id',
            'data.date' => '',
            'data.time' => '',
            'data.services' => 'array',
            'data.services.*' => 'integer|exists:services,id',
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (isset($this->date, $this->phone)) {
            $date = explode('/', $this->date);
            list($date[0], $date[1], $date[2]) = [$date[2], $date[0], $date[1]];
            $date = implode('-', $date);
            $this->merge([
                'phone' => preg_replace('~\D+~', '', $this->phone),
                'date' => $date,
            ]);
        }
    }

    public function messages()
    {
        return [
            'name.string' => 'Поле Имя должно быть строкой',
            'phone.string' => 'Поле Телефон должно быть строкой',
        ];
    }
}
