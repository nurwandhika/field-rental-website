<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $casts = [
        'is_open' => 'boolean'
    ];

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function images()
    {
        return $this->hasMany(FieldImage::class);
    }
}
