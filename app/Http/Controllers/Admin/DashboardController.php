<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPatients' => Patient::count(),
            'totalDoctors' => Doctor::count(),
            'totalBookings' => Booking::count(),
        ]);
    }
}