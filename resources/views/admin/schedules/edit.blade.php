@extends('layouts.admin')

@section('title', 'Edit Jadwal Dokter')

@section('content')
<style>
    .form-container {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        max-width: 800px;
    }
    .form-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 1.5rem;
    }
    .form-group {
        margin-bottom: 1.25rem;
    }
    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.5rem;
    }
    .input-field {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        background-color: #ffffff;
        color: #0f172a;
        font-family: inherit;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    .input-field:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    .btn-group {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
    }
    .btn-submit {
        padding: 0.75rem 1.5rem;
        background-color: #4f46e5;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .btn-submit:hover {
        background-color: #4338ca;
    }
    .btn-back {
        padding: 0.75rem 1.5rem;
        background-color: #ffffff;
        color: #64748b;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.2s;
    }
    .btn-back:hover {
        background-color: #f8fafc;
        color: #334155;
    }
</style>

<div class="form-container">
    <h2 class="form-title">Edit Jadwal Dokter</h2>
    
    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Dokter</label>
            <select name="doctor_id" class="input-field">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Poliklinik</label>
            <select name="polyclinic_id" class="input-field">
                @foreach($polyclinics as $polyclinic)
                    <option value="{{ $polyclinic->id }}" {{ $schedule->polyclinic_id == $polyclinic->id ? 'selected' : '' }}>
                        {{ $polyclinic->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Hari</label>
            <select name="day" class="input-field">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <option value="{{ $day }}" {{ $schedule->day == $day ? 'selected' : '' }}>
                        {{ $day }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Jam Mulai</label>
                <input type="time" name="start_time" class="input-field" value="{{ $schedule->start_time }}">
            </div>
            <div class="form-group">
                <label class="form-label">Jam Selesai</label>
                <input type="time" name="end_time" class="input-field" value="{{ $schedule->end_time }}">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Kuota</label>
                <input type="number" name="quota" class="input-field" value="{{ $schedule->quota }}">
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="input-field">
                    <option value="active" {{ $schedule->status == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ $schedule->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Update Jadwal</button>
            <a href="{{ route('admin.schedules.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection