@extends('layouts.admin')

@section('title', 'Tambah Setting')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Tambah Setting</h2>
    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.settings.store') }}"
            method="POST"
        >

            @csrf

            <div class="mb-3">

                <label>Key</label>

                <input
                    type="text"
                    name="key"
                    class="form-control"
                    placeholder="contoh: website_name"
                    required
                >

            </div>

            <div class="mb-3">

                <label>Value</label>

                <textarea
                    name="value"
                    rows="5"
                    class="form-control"
                    placeholder="Isi value setting"
                ></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Simpan
            </button>

            <a
                href="{{ route('admin.settings.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection