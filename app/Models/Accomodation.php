<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'bedrooms',
        'bathrooms',
        'living_space',
        'land_area',
        'description',
        'garage',
        'balcony',
        'terrace',
        'elevator',
        'energetic_class',
        'cave',
    ];
}
