@extends('layouts.admin')

@section('title', 'Tambah Setting')

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
    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Key Pengaturan</label>
            <input 
                type="text" 
                name="key" 
                class="input-field" 
                placeholder="Contoh: nama_website, email_kontak" 
                required
            >
        </div>

        <div class="form-group">
            <label class="form-label">Value / Isi Nilai</label>
            <textarea 
                name="value" 
                rows="5" 
                class="input-field" 
                placeholder="Masukkan konfigurasi atau teks nilai di sini..."
            ></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-submit">Simpan Pengaturan</button>
            <a href="{{ route('admin.settings.index') }}" class="btn-back">Kembali</a>
        </div>
    </form>
</div>
@endsection