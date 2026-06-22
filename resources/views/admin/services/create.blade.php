@extends('layouts.admin')

@section('title', 'Tambah Layanan')

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
    .input-field::placeholder {
        color: #94a3b8;
    }
    /* Kustomisasi khusus input file */
    input[type="file"].input-field {
        padding: 0.5rem;
        cursor: pointer;
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
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Judul Layanan</label>
            <input 
                type="text" 
                name="title" 
                class="input-field" 
                placeholder="Masukkan judul layanan medis..." 
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <textarea 
                name="description" 
                rows="5" 
                class="input-field" 
                placeholder="Jelaskan detail mengenai alur atau fasilitas layanan ini..."
            >{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Unggah Gambar / Ilustrasi</label>
            <input 
                type="file" 
                name="image" 
                class="input-field"
            >
        </div>

        <div class="form-group">
            <label class="form-label">Status Publikasi</label>
            <select name="status" class="input-field">
                <option value="active">Aktif (Ditampilkan)</option>
                <option value="inactive">Tidak Aktif (Disembunyikan)</option>
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Simpan Layanan</button>
            <a href="{{ route('admin.services.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection