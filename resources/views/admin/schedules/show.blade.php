@extends('layouts.admin')

@section('title', 'Detail Jadwal Dokter')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Detail Jadwal Dokter</h2>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Dokter</th>
                <td>{{ $schedule->doctor->name }}</td>
            </tr>

            <tr>
                <th>Poliklinik</th>
                <td>{{ $schedule->polyclinic->name }}</td>
            </tr>

            <tr>
                <th>Hari Praktik</th>
                <td>{{ $schedule->day }}</td>
            </tr>

            <tr>
                <th>Jam Mulai</th>
                <td>{{ $schedule->start_time }}</td>
            </tr>

            <tr>
                <th>Jam Selesai</th>
                <td>{{ $schedule->end_time }}</td>
            </tr>

            <tr>
                <th>Kuota Pasien</th>
                <td>{{ $schedule->quota }}</td>
            </tr>

            <tr>
                <th>Status</th>

                <td>

                    @if($schedule->status == 'active')

                        <span class="badge bg-success">
                            Aktif
                        </span>

                    @else

                        <span class="badge bg-danger">
                            Tidak Aktif
                        </span>

                    @endif

                </td>

            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $schedule->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate Pada</th>
                <td>{{ $schedule->updated_at }}</td>
            </tr>

        </table>

        <a
            href="{{ route('admin.schedules.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

</div>

@endsection