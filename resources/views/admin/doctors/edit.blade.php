@extends('layouts.admin')

@section('title', 'Edit Dokter')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Edit Dokter</h2>
    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.doctors.update', $doctor->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Poliklinik</label>

                <select
                    name="polyclinic_id"
                    class="form-control"
                >

                    <option value="">
                        Pilih Poliklinik
                    </option>

                    @foreach($polyclinics as $polyclinic)

                        <option
                            value="{{ $polyclinic->id }}"
                            {{ $doctor->polyclinic_id == $polyclinic->id ? 'selected' : '' }}
                        >
                            {{ $polyclinic->name }}
                        </option>

                    @endforeach

                </select>

                @error('polyclinic_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Kode Dokter</label>

                <input
                    type="text"
                    name="code"
                    class="form-control"
                    value="{{ old('code', $doctor->code) }}"
                >

                @error('code')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Nama Dokter</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $doctor->name) }}"
                >

                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Spesialis</label>

                <input
                    type="text"
                    name="specialist"
                    class="form-control"
                    value="{{ old('specialist', $doctor->specialist) }}"
                >

                @error('specialist')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Foto Saat Ini</label>

                <br>

                @if($doctor->photo)

                    <img
                        src="{{ asset('storage/' . $doctor->photo) }}"
                        alt="{{ $doctor->name }}"
                        width="150"
                        class="mb-2"
                    >

                @else

                    <p>Tidak ada foto</p>

                @endif

            </div>

            <div class="mb-3">

                <label>Ganti Foto</label>

                <input
                    type="file"
                    name="photo"
                    class="form-control"
                >

                @error('photo')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                >{{ old('description', $doctor->description) }}</textarea>

                @error('description')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select
                    name="status"
                    class="form-control"
                >

                    <option
                        value="active"
                        {{ $doctor->status == 'active' ? 'selected' : '' }}
                    >
                        Aktif
                    </option>

                    <option
                        value="inactive"
                        {{ $doctor->status == 'inactive' ? 'selected' : '' }}
                    >
                        Tidak Aktif
                    </option>

                </select>

                @error('status')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Dokter
            </button>

            <a
                href="{{ route('admin.doctors.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection