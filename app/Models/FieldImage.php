<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id','url'
    ];

    public function field()
    {
        $this->hasOne(Field::class);
    }
}
