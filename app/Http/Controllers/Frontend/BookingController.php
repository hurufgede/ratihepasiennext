<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserBookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'polyclinic_id' => ['required', 'exists:polyclinics,id'],
            'doctor_schedule_id' => ['required', 'exists:doctor_schedules,id'],
            'visit_date' => ['required', 'date', 'after_or_equal:today'],
            'complaint' => ['nullable', 'string', 'max:1000'],
        ]);

        $user = auth()->user();

        if (!$user->patient) {
            return back()
                ->withInput()
                ->with('error', 'Data pasien belum terhubung dengan akun Anda.');
        }

        $date = Carbon::parse($request->visit_date);

        $dayMap = [
            'Sunday' => 'minggu',
            'Monday' => 'senin',
            'Tuesday' => 'selasa',
            'Wednesday' => 'rabu',
            'Thursday' => 'kamis',
            'Friday' => 'jumat',
            'Saturday' => 'sabtu',
        ];

        $day = $dayMap[$date->format('l')];

        DB::beginTransaction();

        try {
            $schedule = DoctorSchedule::with([
                'doctor',
                'polyclinic'
            ])
                ->where('id', $request->doctor_schedule_id)
                ->where('polyclinic_id', $request->polyclinic_id)
                ->where('day', $day)
                ->where('status', 'active')
                ->lockForUpdate()
                ->first();

            if (!$schedule) {
                DB::rollBack();

                return back()
                    ->withInput()
                    ->with('error', 'Jadwal dokter tidak tersedia untuk tanggal tersebut.');
            }

            $booked = Booking::where('doctor_schedule_id', $schedule->id)
                ->whereDate('visit_date', $date)
                ->whereNotIn('status', [
                    'cancelled',
                    'rejected'
                ])
                ->lockForUpdate()
                ->count();

            if ($booked >= $schedule->quota) {
                DB::rollBack();

                return back()
                    ->withInput()
                    ->with('error', 'Kuota jadwal dokter sudah penuh.');
            }

            $existingBooking = Booking::where('patient_id', $user->patient->id)
                ->whereDate('visit_date', $date)
                ->whereNotIn('status', [
                    'cancelled',
                    'rejected'
                ])
                ->first();

            if ($existingBooking) {
                DB::rollBack();

                return back()
                    ->withInput()
                    ->with('error', 'Anda sudah memiliki booking pada tanggal tersebut.');
            }

            $bookingCode = $this->generateBookingCode();

            $booking = Booking::create([
                'booking_code' => $bookingCode,
                'patient_id' => $user->patient->id,
                'polyclinic_id' => $schedule->polyclinic_id,
                'doctor_id' => $schedule->doctor_id,
                'doctor_schedule_id' => $schedule->id,
                'visit_date' => $date,
                'complaint' => $request->complaint,
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()
                ->route('home')
                ->with('success', 'Booking berhasil dibuat.')
                ->with('booking', $booking->load([
                    'patient',
                    'doctor',
                    'polyclinic',
                    'doctorSchedule'
                ]));
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Booking gagal dibuat. Silakan coba kembali.');
        }
    }

    private function generateBookingCode()
    {
        do {
            $code = 'RT-' . now()->format('ymd') . '-' . strtoupper(
                Str::random(5)
            );
        } while (
            Booking::where('booking_code', $code)->exists()
        );

        return $code;
    }
}