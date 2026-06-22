@extends('layouts.admin')

@section('title', 'Data Layanan')

@section('content')

<div class="page-header">
    <h1>Data Layanan</h1>

    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        Tambah Layanan
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <table class="table">

        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($services as $service)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($service->image)
                        <img
                            src="{{ asset('storage/'.$service->image) }}"
                            width="80"
                            alt=""
                        >
                    @else
                        -
                    @endif
                </td>

                <td>{{ $service->title }}</td>

                <td>{{ $service->slug }}</td>

                <td>
                    <span class="badge">
                        {{ $service->status }}
                    </span>
                </td>

                <td>

                    <a
                        href="{{ route('admin.services.show',$service->id) }}"
                        class="btn btn-info"
                    >
                        Detail
                    </a>

                    <a
                        href="{{ route('admin.services.edit',$service->id) }}"
                        class="btn btn-warning"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.services.destroy',$service->id) }}"
                        method="POST"
                        style="display:inline-block"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data?')"
                        >
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" align="center">
                    Data belum tersedia
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

{{ $services->links() }}

@endsection