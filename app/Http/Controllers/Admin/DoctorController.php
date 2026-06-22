<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Polyclinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('polyclinic')
            ->latest()
            ->paginate(10);

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $polyclinics = Polyclinic::where('status', 'active')->get();

        return view('admin.doctors.create', compact('polyclinics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'polyclinic_id' => 'required|exists:polyclinics,id',
            'code' => 'required|unique:doctors',
            'name' => 'required|max:255',
            'specialist' => 'required|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
            'status' => 'required|in:active,inactive',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')
                ->store('doctors', 'public');
        }

        Doctor::create([
            'polyclinic_id' => $request->polyclinic_id,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'specialist' => $request->specialist,
            'photo' => $photo,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Dokter berhasil ditambahkan');
    }

    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $polyclinics = Polyclinic::all();

        return view(
            'admin.doctors.edit',
            compact('doctor', 'polyclinics')
        );
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'polyclinic_id' => 'required|exists:polyclinics,id',
            'code' => 'required|unique:doctors,code,' . $doctor->id,
            'name' => 'required|max:255',
            'specialist' => 'required|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
            'status' => 'required|in:active,inactive',
        ]);

        $photo = $doctor->photo;

        if ($request->hasFile('photo')) {

            if ($doctor->photo &&
                Storage::disk('public')->exists($doctor->photo)) {

                Storage::disk('public')->delete($doctor->photo);
            }

            $photo = $request->file('photo')
                ->store('doctors', 'public');
        }

        $doctor->update([
            'polyclinic_id' => $request->polyclinic_id,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'specialist' => $request->specialist,
            'photo' => $photo,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Dokter berhasil diperbarui');
    }

    public function destroy(Doctor $doctor)
    {
        if (
            $doctor->photo &&
            Storage::disk('public')->exists($doctor->photo)
        ) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Dokter berhasil dihapus');
    }
}