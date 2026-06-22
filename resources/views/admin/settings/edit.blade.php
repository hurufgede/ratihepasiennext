@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Edit Setting</h2>
    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.settings.update',$setting->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Key</label>

                <input
                    type="text"
                    name="key"
                    class="form-control"
                    value="{{ old('key',$setting->key) }}"
                    required
                >

            </div>

            <div class="mb-3">

                <label>Value</label>

                <textarea
                    name="value"
                    rows="5"
                    class="form-control"
                >{{ old('value',$setting->value) }}</textarea>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update
            </button>

            <a
                href="{{ route('admin.settings.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection