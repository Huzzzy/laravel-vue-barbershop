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
        $date = explode('/', $this->date);
        list($date[0], $date[1], $date[2]) = [$date[2], $date[0], $date[1]];
        $date = implode('-', $date);
        $this->merge([
            'phone' => preg_replace('~\D+~', '', $this->phone),
            'date' => $date,
        ]);
    }
}
