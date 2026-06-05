<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Service;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $doktors = \App\Models\Doctor::where('status', 'active')->get();
        $services = \App\Models\Service::where('status', 'active')->get();
        $announcements = \App\Models\Announcement::where('status', 'active')    ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.home', compact('doktors', 'services', 'announcements'));
    }
}
