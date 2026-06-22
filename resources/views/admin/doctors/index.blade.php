@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Data Dokter</h2>

    <a href="{{ route('admin.doctors.create') }}"
       class="btn btn-primary">
        Tambah Dokter
    </a>
</div>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Foto</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Poliklinik</th>
            <th>Spesialis</th>
            <th>Status</th>
            <th width="220">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($doctors as $doctor)

        <tr>

            <td>
                @if($doctor->photo)
                    <img
                        src="{{ asset('storage/'.$doctor->photo) }}"
                        width="70"
                    >
                @endif
            </td>

            <td>{{ $doctor->code }}</td>

            <td>{{ $doctor->name }}</td>

            <td>{{ $doctor->polyclinic->name }}</td>

            <td>{{ $doctor->specialist }}</td>

            <td>{{ $doctor->status }}</td>

            <td>

                <a
                    href="{{ route('admin.doctors.show',$doctor->id) }}"
                    class="btn btn-info btn-sm"
                >
                    Detail
                </a>

                <a
                    href="{{ route('admin.doctors.edit',$doctor->id) }}"
                    class="btn btn-warning btn-sm"
                >
                    Edit
                </a>

                <form
                    action="{{ route('admin.doctors.destroy',$doctor->id) }}"
                    method="POST"
                    style="display:inline-block"
                >
                    @csrf
                    @method('DELETE')

                    <button
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
            <td colspan="7" align="center">
                Data tidak ditemukan
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

{{ $doctors->links() }}

@endsection