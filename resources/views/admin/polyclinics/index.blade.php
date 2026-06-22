@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Data Poliklinik</h2>

    <a href="{{ route('admin.polyclinics.create') }}" class="btn btn-primary">
        Tambah Poliklinik
    </a>
</div>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th width="220">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($polyclinics as $polyclinic)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $polyclinic->code }}</td>
            <td>{{ $polyclinic->name }}</td>
            <td>{{ $polyclinic->location }}</td>
            <td>{{ $polyclinic->status }}</td>

            <td>
                <a href="{{ route('admin.polyclinics.show',$polyclinic->id) }}" class="btn btn-info btn-sm">
                    Detail
                </a>

                <a href="{{ route('admin.polyclinics.edit',$polyclinic->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form
                    action="{{ route('admin.polyclinics.destroy',$polyclinic->id) }}"
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
            <td colspan="6" class="text-center">
                Data kosong
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

{{ $polyclinics->links() }}

@endsection