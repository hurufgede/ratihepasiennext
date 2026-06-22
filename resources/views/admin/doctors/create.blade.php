@extends('layouts.admin')

@section('title', 'Tambah Dokter')

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
    .error-message {
        display: block;
        color: #ef4444;
        font-size: 0.75rem;
        font-weight: 500;
        margin-top: 0.375rem;
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
    <h2 class="form-title">Tambah Dokter</h2>
    
    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Poliklinik</label>
            <select name="polyclinic_id" class="input-field">
                <option value="">Pilih Poliklinik</option>
                @foreach($polyclinics as $polyclinic)
                    <option value="{{ $polyclinic->id }}" {{ old('polyclinic_id') == $polyclinic->id ? 'selected' : '' }}>
                        {{ $polyclinic->name }}
                    </option>
                @endforeach
            </select>
            @error('polyclinic_id')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Kode Dokter</label>
            <input type="text" name="code" class="input-field" placeholder="Contoh: DOC-001" value="{{ old('code') }}">
            @error('code')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Nama Dokter</label>
            <input type="text" name="name" class="input-field" placeholder="Contoh: dr. John Doe, Sp.A" value="{{ old('name') }}">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Spesialis</label>
            <input type="text" name="specialist" class="input-field" placeholder="Contoh: Anak / Kandungan" value="{{ old('specialist') }}">
            @error('specialist')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Foto Dokter</label>
            <input type="file" name="photo" class="input-field">
            @error('photo')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi / Biografi Singkat</label>
            <textarea name="description" rows="5" class="input-field" placeholder="Tulis deskripsi dokter di sini...">{{ old('description') }}</textarea>
            @error('description')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="input-field">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            @error('status')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Simpan Dokter</button>
            <a href="{{ route('admin.doctors.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection