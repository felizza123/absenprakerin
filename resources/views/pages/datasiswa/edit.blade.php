@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Edit - Datasiswa
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.datasiswa.update', $datasiswa->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="nis">NIS <span class="text-danger">*</span></label>
                            <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$datasiswa->nis}}">

                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$datasiswa->nama}}">

                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{$datasiswa->jurusan}}">

                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="mulaiprakerin">Mulai Prakerin <span class="text-danger">*</span></label>
                            <input type="date" name="mulaiprakerin" id="mulaiprakerin" class="form-control @error('mulaiprakerin') is-invalid @enderror" value="{{$datasiswa->mulaiprakerin}}">

                            @error('mulaiprakerin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="akhirprakerin">Akhir Prakerin <span class="text-danger">*</span></label>
                            <input type="date" name="akhirprakerin" id="akhirprakerin" class="form-control @error('akhirprakerin') is-invalid @enderror" value="{{$datasiswa->akhirprakerin}}">

                            @error('akhirprakerin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" />
                            <img src="{{asset('/storage/image/'.$datasiswa->foto)}}" class="img-thumbnail" alt="" width="200">
                        </div>
            </div>
        </section>

        <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.datasiswa.index')}}" class="btn btn-secondary">Batal</a>
            
    </form>
    </div>
@endsection