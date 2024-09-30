@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Create New - datasiswas
            </h3>
        </div>

        <a href="{{route('admin.datasiswa.index')}}" class="btn m-3 btn-primary">Kembali</a>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.datasiswa.store')}}" method="POST">
                        @csrf 

                        <div class="form-group mb-2">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                </div>
            </div>
        </section>

        <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.datasiswa.index')}}" class="btn btn-secondary">Batal</a>
    </form>
    </div>
@endsection