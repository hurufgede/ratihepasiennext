<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::where('status', 'active')->get();

        return view('frontend.doctors.index', compact('doctors'));
    }

    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();

        return view('frontend.doctors.show', compact('doctor'));
    }
}