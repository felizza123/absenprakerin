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
                    <form action="{{route('admin.datasiswa.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group mb-2">
                            <label for="nis">NIS <span class="text-danger">*</span></label>
                            <input type="number" name="nis" id="nis" value="{{old('nis')}}" class="form-control @error('nis') is-invalid @enderror" />

                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" />

                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" id="jurusan" value="{{old('jurusan')}}" class="form-control @error('jurusan') is-invalid @enderror" />

                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="mulaiprakerin">Mulai Prakerin <span class="text-danger">*</span></label>
                            <input type="date" name="mulaiprakerin" id="mulaiprakerin" value="{{old('mulaiprakerin')}}"  class="form-control @error('mulaiprakerin') is-invalid @enderror" />

                            @error('mulaiprakerin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="akhirprakerin">Akhir Prakerin <span class="text-danger">*</span></label>
                            <input type="date" name="akhirprakerin" id="akhirprakerin" value="{{old('akhirprakerin')}}"  class="form-control @error('akhirprakerin') is-invalid @enderror" />

                            @error('akhirprakerin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group mb-2">
                            <label for="foto" class="form-label">Foto<span class="text-danger">*</span></label>
                            <input type="file" name="foto" id="foto" value="{{old('foto')}}" class="form-control @error ('foto') is-invalid @enderror" />
                            
                            @error('foto')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
            </div>
        </section>

        <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.datasiswa.index')}}" class="btn btn-secondary">Batal</a>
    </form>
    </div>
@endsection