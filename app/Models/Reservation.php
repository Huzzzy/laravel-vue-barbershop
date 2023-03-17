<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $guarded = false;

    public function master()
    {
        return $this->belongsTo(Master::class, 'master_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_reservations', 'reservation_id', 'service_id');
    }
}
