<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Polyclinic;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = DoctorSchedule::with([
            'doctor',
            'polyclinic'
        ])->latest()->paginate(10);

        return view(
            'admin.schedules.index',
            compact('schedules')
        );
    }

    public function create()
    {
        $doctors = Doctor::where('status', 'active')->get();

        $polyclinics = Polyclinic::where(
            'status',
            'active'
        )->get();

        return view(
            'admin.schedules.create',
            compact(
                'doctors',
                'polyclinics'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'polyclinic_id' => 'required|exists:polyclinics,id',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'quota' => 'nullable|integer|min:1',
            'status' => 'required',
        ]);

        DoctorSchedule::create([
            'doctor_id' => $request->doctor_id,
            'polyclinic_id' => $request->polyclinic_id,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'quota' => $request->quota,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil ditambahkan'
            );
    }

    public function show(DoctorSchedule $schedule)
    {
        $schedule->load([
            'doctor',
            'polyclinic'
        ]);

        return view(
            'admin.schedules.show',
            compact('schedule')
        );
    }   

    public function edit(DoctorSchedule $schedule)
    {
        $doctors = Doctor::all();

        $polyclinics = Polyclinic::all();

        return view(
            'admin.schedules.edit',
            compact(
                'schedule',
                'doctors',
                'polyclinics'
            )
        );
    }

    public function update(
        Request $request,
        DoctorSchedule $schedule
    ) {

        $request->validate([
            'doctor_id' => 'required',
            'polyclinic_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'quota' => 'nullable|integer|min:1',
            'status' => 'required',
        ]);

        $schedule->update([
            'doctor_id' => $request->doctor_id,
            'polyclinic_id' => $request->polyclinic_id,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'quota' => $request->quota,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil diperbarui'
            );
    }

    public function destroy(
        DoctorSchedule $schedule
    ) {

        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with(
                'success',
                'Jadwal berhasil dihapus'
            );
    }
}