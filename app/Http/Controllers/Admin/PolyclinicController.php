<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Polyclinic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolyclinicController extends Controller
{
    public function index()
    {
        $polyclinics = Polyclinic::latest()->paginate(10);

        return view('admin.polyclinics.index', compact('polyclinics'));
    }

    public function create()
    {
        return view('admin.polyclinics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:polyclinics,code',
            'name' => 'required|max:255',
            'location' => 'nullable|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Polyclinic::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.polyclinics.index')
            ->with('success', 'Poliklinik berhasil ditambahkan.');
    }

    public function show(Polyclinic $polyclinic)
    {
        return view('admin.polyclinics.show', compact('polyclinic'));
    }

    public function edit(Polyclinic $polyclinic)
    {
        return view('admin.polyclinics.edit', compact('polyclinic'));
    }

    public function update(Request $request, Polyclinic $polyclinic)
    {
        $request->validate([
            'code' => 'required|unique:polyclinics,code,' . $polyclinic->id,
            'name' => 'required|max:255',
            'location' => 'nullable|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $polyclinic->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.polyclinics.index')
            ->with('success', 'Poliklinik berhasil diperbarui.');
    }

    public function destroy(Polyclinic $polyclinic)
    {
        $polyclinic->delete();

        return redirect()
            ->route('admin.polyclinics.index')
            ->with('success', 'Poliklinik berhasil dihapus.');
    }
}