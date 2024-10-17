@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center" style="height: 50px;">
                    <h3>🙌 Selamat Datang 🙌</h3>
                </div>
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

@endsection
