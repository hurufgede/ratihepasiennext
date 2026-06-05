<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    protected $fillable = [
        'code',
        'name',
        'slug',
        'location',
        'status',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
