<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()
            ->paginate(10);

        return view(
            'admin.announcements.index',
            compact('announcements')
        );
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'required'
        ]);

        Announcement::create($request->all());

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function show(Announcement $announcement)
    {
        return view(
            'admin.announcements.show',
            compact('announcement')
        );
    }

    public function edit(Announcement $announcement)
    {
        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    public function update(
        Request $request,
        Announcement $announcement
    ) {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'status' => 'required'
        ]);

        $announcement->update($request->all());

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy(
        Announcement $announcement
    ) {

        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}