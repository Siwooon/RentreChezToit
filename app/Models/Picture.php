<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'path',
        'user_id',
        'accomodation_id',
        'ad_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accomodation()
    {
        return $this->belongsTo(Accomodation::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}