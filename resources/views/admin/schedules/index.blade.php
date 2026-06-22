@extends('layouts.admin')

@section('title', 'Data Jadwal Dokter')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Jadwal Dokter</h2>

    <a
        href="{{ route('admin.schedules.create') }}"
        class="btn btn-primary"
    >
        Tambah Jadwal
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Dokter</th>
                    <th>Poliklinik</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kuota</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($schedules as $schedule)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $schedule->doctor->name }}
                    </td>

                    <td>
                        {{ $schedule->polyclinic->name }}
                    </td>

                    <td>
                        {{ $schedule->day }}
                    </td>

                    <td>
                        {{ $schedule->start_time }}
                        -
                        {{ $schedule->end_time }}
                    </td>

                    <td>
                        {{ $schedule->quota }}
                    </td>

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

                    <td>

                        <a
                            href="{{ route('admin.schedules.show',$schedule->id) }}"
                            class="btn btn-info btn-sm"
                        >
                            Detail
                        </a>

                        <a
                            href="{{ route('admin.schedules.edit',$schedule->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.schedules.destroy',$schedule->id) }}"
                            method="POST"
                            style="display:inline-block"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center">
                        Data belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{ $schedules->links() }}

@endsection