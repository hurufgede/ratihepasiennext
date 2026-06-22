@extends('layouts.admin')

@section('title', 'Edit Jadwal Dokter')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Edit Jadwal Dokter</h2>
    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.schedules.update',$schedule->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Dokter</label>

                <select
                    name="doctor_id"
                    class="form-control"
                >

                    @foreach($doctors as $doctor)

                    <option
                        value="{{ $doctor->id }}"
                        {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}
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
                        {{ $schedule->polyclinic_id == $polyclinic->id ? 'selected' : '' }}
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

                    @foreach([
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday',
                        'Sunday'
                    ] as $day)

                    <option
                        value="{{ $day }}"
                        {{ $schedule->day == $day ? 'selected' : '' }}
                    >
                        {{ $day }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Jam Mulai</label>

                <input
                    type="time"
                    name="start_time"
                    class="form-control"
                    value="{{ $schedule->start_time }}"
                >

            </div>

            <div class="mb-3">

                <label>Jam Selesai</label>

                <input
                    type="time"
                    name="end_time"
                    class="form-control"
                    value="{{ $schedule->end_time }}"
                >

            </div>

            <div class="mb-3">

                <label>Kuota</label>

                <input
                    type="number"
                    name="quota"
                    class="form-control"
                    value="{{ $schedule->quota }}"
                >

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select
                    name="status"
                    class="form-control"
                >

                    <option
                        value="active"
                        {{ $schedule->status == 'active' ? 'selected' : '' }}
                    >
                        Aktif
                    </option>

                    <option
                        value="inactive"
                        {{ $schedule->status == 'inactive' ? 'selected' : '' }}
                    >
                        Tidak Aktif
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update
            </button>

            <a
                href="{{ route('admin.schedules.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection