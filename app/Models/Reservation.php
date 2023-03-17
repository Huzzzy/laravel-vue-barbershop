<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;

    static function getStatus()
    {
        return [
            self::STATUS_TRUE => 'Активная',
            self::STATUS_FALSE => 'Неактивная',
        ];
    }
    public function getStatusTitleAttribute()
    {
        return self::getStatus()[$this->status];
    }

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
        return $this->belongsToMany(Service::class, 'reservation_service', 'reservation_id', 'service_id');
    }
}
