<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingStatusController extends Controller
{
    public function index()
    {
        return view('frontend.booking-status.index');
    }

    public function show($bookingCode)
    {
        $booking = Booking::where(
            'booking_code',
            $bookingCode
        )->firstOrFail();

        return view(
            'frontend.booking-status.show',
            compact('booking')
        );
    }
}