<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accomodation()
    {
        return $this->belongsTo(Accomodation::class);
    }
}
