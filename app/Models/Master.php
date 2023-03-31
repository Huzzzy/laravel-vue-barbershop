<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = 'masters';
    protected $guarded = false;

    public function getImageUrlAttribute()
    {
        if (substr($this->photo, 0, 6) === 'images') {
            return url('storage/' . $this->photo);
        }
        else {
            return $this->photo;
        }
    }
}
