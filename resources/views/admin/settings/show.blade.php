@extends('layouts.admin')

@section('title', 'Detail Setting')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Detail Setting</h2>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th width="250">
                    Key
                </th>

                <td>
                    {{ $setting->key }}
                </td>

            </tr>

            <tr>

                <th>
                    Value
                </th>

                <td>
                    {!! nl2br(e($setting->value)) !!}
                </td>

            </tr>

            <tr>

                <th>
                    Dibuat
                </th>

                <td>
                    {{ $setting->created_at }}
                </td>

            </tr>

            <tr>

                <th>
                    Diupdate
                </th>

                <td>
                    {{ $setting->updated_at }}
                </td>

            </tr>

        </table>

        <a
            href="{{ route('admin.settings.index') }}"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </div>

</div>

@endsection