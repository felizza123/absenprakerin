@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 rounded">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center" style="height: 50px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> 
                    @endif
                    {{ __('You are logged in !') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="d-flex align-items-center">
                    <!-- Gambar -->
                    <img src="img/avatars/absen.jpg" width="400" height="100" class="img-fluid">
                    
                    <!-- Teks di samping gambar -->
                    <div class="ms-3">
                        <h4>Selamat Datang di Sistem Absensi Prakerin</h4>
                        <p>Ini adalah sistem absensi yang membantu siswa untuk absen dengan mudah. Dan admin dapat memantau kehadirannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
