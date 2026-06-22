@extends('layouts.admin')

@section('title', 'Edit Dokter')

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
    .preview-box {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .preview-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
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
    <h2 class="form-title">Edit Data Dokter</h2>
    
    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Poliklinik</label>
            <select name="polyclinic_id" class="input-field" required>
                @foreach($polyclinics as $polyclinic)
                    <option value="{{ $polyclinic->id }}" {{ $doctor->polyclinic_id == $polyclinic->id ? 'selected' : '' }}>
                        {{ $polyclinic->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Kode Dokter</label>
            <input type="text" name="code" class="input-field" value="{{ $doctor->code }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Dokter</label>
            <input type="text" name="name" class="input-field" value="{{ $doctor->name }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Spesialis</label>
            <input type="text" name="specialist" class="input-field" value="{{ $doctor->specialist }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Foto Profil Sekarang</label>
            <div class="preview-box">
                @if($doctor->photo)
                    <img src="{{ asset('storage/' . $doctor->photo) }}" class="preview-img">
                @else
                    <span style="font-size: 0.875rem; color: #94a3b8;">Tidak ada foto profil</span>
                @endif
            </div>
            <label class="form-label" style="font-size: 0.75rem; color: #64748b; margin-top: 0.5rem;">Ganti Foto (Kosongkan jika tidak ingin diubah)</label>
            <input type="file" name="photo" class="input-field">
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Singkat / Biografi</label>
            <textarea name="description" rows="4" class="input-field">{{ $doctor->description }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="input-field">
                <option value="active" {{ $doctor->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $doctor->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Update Data Dokter</button>
            <a href="{{ route('admin.doctors.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection