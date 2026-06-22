@extends('layouts.admin')

@section('content')

<h2>Tambah Jadwal Dokter</h2>

<form
    action="{{ route('admin.schedules.store') }}"
    method="POST"
>

@csrf

<div class="mb-3">

    <label>Dokter</label>

    <select
        name="doctor_id"
        class="form-control"
    >

        @foreach($doctors as $doctor)

            <option
                value="{{ $doctor->id }}"
            >
                {{ $doctor->name }}
            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label>Poliklinik</label>

    <select
        name="polyclinic_id"
        class="form-control"
    >

        @foreach($polyclinics as $polyclinic)

            <option
                value="{{ $polyclinic->id }}"
            >
                {{ $polyclinic->name }}
            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label>Hari</label>

    <select
        name="day"
        class="form-control"
    >

        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>

    </select>

</div>

<div class="mb-3">
    <label>Jam Mulai</label>

    <input
        type="time"
        name="start_time"
        class="form-control"
    >
</div>

<div class="mb-3">
    <label>Jam Selesai</label>

    <input
        type="time"
        name="end_time"
        class="form-control"
    >
</div>

<div class="mb-3">
    <label>Kuota</label>

    <input
        type="number"
        name="quota"
        class="form-control"
    >
</div>

<div class="mb-3">

    <label>Status</label>

    <select
        name="status"
        class="form-control"
    >
        <option value="active">Aktif</option>
        <option value="inactive">Tidak Aktif</option>
    </select>

</div>

<button class="btn btn-primary">
    Simpan
</button>

</form>

@endsection