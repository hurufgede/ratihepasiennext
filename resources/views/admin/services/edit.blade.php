@extends('layouts.admin')

@section('title', 'Edit Layanan')

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
    .form-group {
        margin-bottom: 1.5rem;
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
    input[type="file"].input-field {
        padding: 0.5rem;
    }
    .image-preview-box {
        margin-top: 0.5rem;
        display: inline-block;
        padding: 0.5rem;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
    }
    .image-preview-box img {
        border-radius: 8px;
        display: block;
        object-fit: cover;
    }
    .no-image-text {
        font-size: 0.875rem;
        color: #94a3b8;
        font-style: italic;
    }
    .btn-group {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
    }
    .btn-update {
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
    .btn-update:hover {
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
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Judul Layanan</label>
            <input 
                type="text" 
                name="title" 
                class="input-field" 
                value="{{ old('title', $service->title) }}" 
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <textarea 
                name="description" 
                rows="5" 
                class="input-field"
            >{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Gambar Saat Ini</label>
            <div>
                @if($service->image)
                    <div class="image-preview-box">
                        <img src="{{ asset('storage/'.$service->image) }}" width="150" alt="Preview Gambar">
                    </div>
                @else
                    <span class="no-image-text">Belum ada gambar yang diunggah</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Ganti Gambar Baru</label>
            <input 
                type="file" 
                name="image" 
                class="input-field"
            >
        </div>

        <div class="form-group">
            <label class="form-label">Status Publikasi</label>
            <select name="status" class="input-field">
                <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
                <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif (Disembunyikan)</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-update">Perbarui Layanan</button>
            <a href="{{ route('admin.services.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection