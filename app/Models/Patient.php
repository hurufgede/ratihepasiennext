<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nik',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'mother_name',
        'address',
        'phone',
        'email',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
