<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
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
        'images'
    ];

    protected $casts = [
        'garage' => 'boolean',
        'balcony' => 'boolean',
        'terrace' => 'boolean',
        'elevator' => 'boolean',
        'cave' => 'boolean',
        'images' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
