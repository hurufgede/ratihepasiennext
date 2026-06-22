@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Pengaturan Website</h2>

    <a
        href="{{ route('admin.settings.create') }}"
        class="btn btn-primary"
    >
        Tambah Setting
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
                    <th width="80">No</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($settings as $setting)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $setting->key }}</strong>
                    </td>

                    <td>
                        {{ Str::limit($setting->value, 80) }}
                    </td>

                    <td>

                        <a
                            href="{{ route('admin.settings.show',$setting->id) }}"
                            class="btn btn-info btn-sm"
                        >
                            Detail
                        </a>

                        <a
                            href="{{ route('admin.settings.edit',$setting->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.settings.destroy',$setting->id) }}"
                            method="POST"
                            style="display:inline-block"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus setting ini?')"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center">
                        Belum ada data setting
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $settings->links() }}

    </div>

</div>

@endsection