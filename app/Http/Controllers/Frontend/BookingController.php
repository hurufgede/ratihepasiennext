<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('frontend.bookings.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function success($id)
    {
        return view('frontend.bookings.success');
    }
}