@extends('layouts.admin')

@section('title', 'Edit Pengumuman')

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
    <h2 class="form-title">Edit Pengumuman</h2>
    
    <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Judul Pengumuman</label>
            <input type="text" name="title" class="input-field" value="{{ $announcement->title }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Isi / Konten Pengumuman</label>
            <textarea name="content" rows="6" class="input-field" required>{{ $announcement->content }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Publish / Mulai</label>
            <input type="datetime-local" name="start_date" class="input-field" value="{{ $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Berakhir</label>
            <input type="datetime-local" name="end_date" class="input-field" value="{{ $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="input-field">
                <option value="active" {{ $announcement->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $announcement->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Update Pengumuman</button>
            <a href="{{ route('admin.announcements.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection