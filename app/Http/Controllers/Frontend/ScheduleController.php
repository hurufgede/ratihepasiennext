<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = DoctorSchedule::with([
            'doctor',
            'polyclinic',
            'booking',
        ])
        ->where('status', 'active')
        ->get();

        return view('frontend.schedules.index', compact('schedules'));
    }
}