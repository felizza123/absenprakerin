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
                            <label for="nis">NIS </label>
                            <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$datasiswa->nis}}">

                            
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama </label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$datasiswa->nama}}">

                            
                        </div>

                        <div class="form-group mb-2">
                            <label for="jurusan">Jurusan </label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{$datasiswa->jurusan}}">

                            
                        </div>

                        <div class="form-group mb-2">
                            <label for="mulaiprakerin">Mulai Prakerin </label>
                            <input type="date" name="mulaiprakerin" id="mulaiprakerin" class="form-control @error('mulaiprakerin') is-invalid @enderror" value="{{$datasiswa->mulaiprakerin}}">

                            
                        </div>

                        <div class="form-group mb-2">
                            <label for="akhirprakerin">Akhir Prakerin </label>
                            <input type="date" name="akhirprakerin" id="akhirprakerin" class="form-control @error('akhirprakerin') is-invalid @enderror" value="{{$datasiswa->akhirprakerin}}">

                           
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