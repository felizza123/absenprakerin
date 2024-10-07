@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3 style="text-align: center;">
                <span class="bi bi-building bold"></span>
                <strong>Absensi</strong>
            </h3>
        </div>

        <section class="section">  
                        <div class="container my-4">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            FORM ABSENSI
                                        </div>
                                        <div class="card-header">
                                            Silahkan isi form dibawah ini untuk absen :
                                        </div>
                                        <div class="card-body">
                    
                                            @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>  
                                            @endif  
                    
                                            <form action="{{ route('admin.absensi.store') }}" method="POST">
                                                @csrf
                    
                                                <form action="{{ route('admin.absensi.store') }}" method="POST">
                                                    @csrf
                                                
                                                    <form action="{{ route('admin.absensi.store') }}" method="POST">
                                                        @csrf
                                                    
                                                        <div class="row mb-3"> <!-- Row untuk Nama Siswa dan NIS -->
                                                            <div class="col-md-6"> <!-- Kolom untuk Nama Siswa -->
                                                                <div class="form-group mb-2">
                                                                    <label for="namasiswa">Nama Siswa</label>
                                                                    <select name="namasiswa" class="form-select @error('namasiswa') is-invalid @enderror">
                                                                        @foreach($datasiswa as $item)
                                                                            <option value="{{ $item->id }}" @if(old('namasiswa') == $item->id) selected @endif>
                                                                                {{ $item->namasiswa }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                    
                                                                    @error('namasiswa')
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}
                                                                        </div>                   
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="col-md-6"> <!-- Kolom untuk NIS -->
                                                                <div class="form-group mb-2">
                                                                    <label for="nis">NIS <span class="text-danger">*</span></label>
                                                                    <input type="number" name="nis" id="nis" value="{{ old('nis') }}" class="form-control @error('nis') is-invalid @enderror" />
                                                                    
                                                                    @error('nis')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                
                    
                                                <div class="form-group mb-2">
                                                    <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                                                    <input type="text" name="jurusan" id="jurusan" value="{{old('jurusan')}}" class="form-control @error('jurusan') is-invalid @enderror" />
                        
                                                    @error('jurusan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Hadir" value="Hadir" class="form-check-input" />
                                                    <label for="Hadir" class="form-check-label">Hadir</label>
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Izin" value="Izin" class="form-check-input" />
                                                    <label for="Izin" class="form-check-label">Izin</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Sakit" value="Sakit" class="form-check-input" />
                                                    <label for="Sakit" class="form-check-label">Sakit</label>
                                                </div>
                    
                                                <div class="form group mb-3">
                                                    <label for="keterangan">Keterangan :</label>
                                                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan')}}</textarea>
                                                        
                                                    @error('keterangan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary mb-2">
                                                    Submit <span class="bi bi-send"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </section>
        <a href="{{route('admin.absensi.index')}}" class="btn m-3 btn-secondary">Kembali</a>

    </div>
@endsection