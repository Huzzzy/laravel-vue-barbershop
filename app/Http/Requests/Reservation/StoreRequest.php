<?php

namespace App\Http\Requests\Reservation;

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
            'name' => 'required|string',
            'phone' => 'required|string|min:12|max:12',
            'master_id' => 'required|integer|exists:masters,id',
            'date' => 'required',
            'time' => 'required',
            'services' => 'required|array',
            'services.*' => 'required|integer|exists:services,id',
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
            'name.required' => 'Поле Имя должно быть заполнено',
            'name.string' => 'Поле Имя должно быть строкой',
            'phone.required' => 'Поле Телефон должно быть заполнено',
            'phone.string' => 'Поле Телефон должно быть строкой',
            'services.required' => 'Поле Услуги должно быть заполнено',
            'master_id.required' => 'Поле Мастер должно быть заполнено',
            'date.required' => 'Поле Дата должно быть заполнено',
            'time.required' => 'Поле Время должно быть заполнено',
        ];
    }
}
