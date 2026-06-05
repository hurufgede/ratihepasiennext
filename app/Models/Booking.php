<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'patient_id',
        'polyclinic_id',
        'doctor_id',
        'doctor_schedule_id',
        'visit_date',
        'complaint',
        'guardian_name',
        'guardian_relation',
        'status',
        'admin_note',
        'verified_by',
        'verified_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function doctorSchedule()
    {
        return $this->belongsTo(DoctorSchedule::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function bookingStatusLogs()
    {
        return $this->hasMany(BookingStatusLog::class);
    }
}
