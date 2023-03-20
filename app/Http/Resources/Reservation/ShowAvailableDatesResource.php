<?php

namespace App\Http\Resources\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ShowAvailableDatesResource extends ReservationResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $enabledDates = [];
        $disabledDates = [];

        $master_reservations = Reservation::where('master_id', $this->id)->get();
        $defaultAvailableDates = json_decode($this->available_days);

        foreach ($master_reservations as $reservation) {
            $enabledDates[] = $reservation->date;
        }

        $enabledDates = array_unique($enabledDates);

        foreach ($enabledDates as $date) {
            $count = Reservation::where('master_id', $this->id)->where('date', $date)->count();

            if ($count >= 12) {
                $disabledDates[] = $date;
            }
        }

        $enabledDates = array_diff($defaultAvailableDates, $disabledDates);
        $dates = [];

        foreach ($enabledDates as $date ) {
            $dates[] = $this->ChangeDateFormatToTempusPlugin($date);
        }
        $enabledDates = $dates;

        return [
            'enabledDates' => $enabledDates,
        ];
    }
}
