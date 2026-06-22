<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()
            ->paginate(20);

        return view(
            'admin.settings.index',
            compact('settings')
        );
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings,key',
            'value' => 'nullable'
        ]);

        Setting::create($request->all());

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting berhasil ditambahkan');
    }

    public function show(Setting $setting)
    {
        return view(
            'admin.settings.show',
            compact('setting')
        );
    }

    public function edit(Setting $setting)
    {
        return view(
            'admin.settings.edit',
            compact('setting')
        );
    }

    public function update(
        Request $request,
        Setting $setting
    ) {

        $request->validate([
            'key' => 'required|unique:settings,key,' . $setting->id,
            'value' => 'nullable'
        ]);

        $setting->update($request->all());

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting berhasil diperbarui');
    }

    public function destroy(
        Setting $setting
    ) {

        $setting->delete();

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting berhasil dihapus');
    }
}