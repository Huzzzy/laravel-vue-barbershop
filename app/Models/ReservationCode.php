<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationCode extends Model
{
    use HasFactory;

    protected $table = 'reservation_codes';
    protected $guarded = false;
}
