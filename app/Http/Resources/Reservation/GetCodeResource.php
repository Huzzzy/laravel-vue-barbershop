<?php

namespace App\Http\Resources\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class GetCodeResource extends ReservationResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'email' => $this->email
        ];
    }
}
