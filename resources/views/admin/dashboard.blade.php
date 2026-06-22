@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Layanan</h5>
                <h2>{{ $totalServices }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Poliklinik</h5>
                <h2>{{ $totalPolyclinics }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Dokter</h5>
                <h2>{{ $totalDoctors }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Total Pengumuman</h5>
                <h2>{{ $totalAnnouncements }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection