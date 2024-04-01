<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
