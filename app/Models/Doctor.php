<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'polyclinic_id',
        'code',
        'name',
        'slug',
        'specialist',
        'photo',
        'description',
        'status',
    ];

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
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
