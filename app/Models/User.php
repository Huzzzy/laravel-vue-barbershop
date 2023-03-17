<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;

    static function getStatus()
    {
        return [
            self::STATUS_TRUE => 'Есть запись',
            self::STATUS_FALSE => 'Нету записей',
        ];
    }
    public function getStatusTitleAttribute()
    {
        return self::getStatus()[$this->status];
    }

    protected $table = 'users';
    protected $guarded = false;
}
