<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Polyclinic;
use App\Models\Service;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalPolyclinics = Polyclinic::count();
        $totalDoctors = Doctor::count();
        $totalAnnouncements = Announcement::count();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalPolyclinics',
            'totalDoctors',
            'totalAnnouncements'
        ));
    }
}