<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Doctor;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')->latest()->take(6)->get();
        $doctors = Doctor::where('status', 'active')->latest()->take(6)->get();
        $announcements = Announcement::where('status', 'active')->latest()->get();

        return view('frontend.home', compact(
            'services',
            'doctors',
            'announcements'
        ));
    }
}