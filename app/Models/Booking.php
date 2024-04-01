<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    // public function equipment()
    // {
    //     return $this->belongsTo(Equipment::class);
    // }
}
