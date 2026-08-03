<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Polyclinic;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('polyclinic')
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        $polyclinics = Polyclinic::where('status', 'active')
            ->orderBy('name')
            ->get();

        $services = Service::where('status', 'active')
            ->orderBy('title')
            ->get();

        $schedules = DoctorSchedule::with([
            'doctor',
            'polyclinic'
        ])
            ->withCount([
                'bookings as booked_count' => function ($query) {
                    $query->whereNotIn('status', [
                        'cancelled',
                        'rejected'
                    ]);
                }
            ])
            ->where('status', 'active')
            ->whereHas('doctor', function ($query) {
                $query->where('status', 'active');
            })
            ->whereHas('polyclinic', function ($query) {
                $query->where('status', 'active');
            })
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('frontend.home', compact(
            'doctors',
            'polyclinics',
            'services',
            'schedules'
        ));
    }
}