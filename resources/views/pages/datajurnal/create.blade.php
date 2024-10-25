@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Create New - Siswa Jurnal
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.datajurnal.store')}}" method="POST">
                        @csrf 

                        <div class="row mb-3">  
                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="namasiswa_id" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                    <select name="namasiswa_id" class="form-select @error('namasiswa_id') is-invalid @enderror">
                                        <option value="">Pilih Nama Siswa</option>
                                        @foreach($datasiswa as $item)
                                            <option value="{{ $item->id }}" @if(old('namasiswa_id') == $item->id) selected @endif>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                        
                                    @error('namasiswa_id')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                                    <select name="nis" id="nis" class="form-select @error('nis') is-invalid @enderror">
                                        <option value="">Pilih NIS Siswa</option>
                                        @foreach ($datasiswa as $item)
                                            <option value="{{ $item->nis }}" @if(old('nis') == $item->nis) selected @endif>{{ $item->nis }}</option>
                                        @endforeach
                                    </select>

                                    @error('nis')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                                    <select name="jurusan" id="jurusan" class="form-select @error('jurusan') is-invalid @enderror">
                                        <option value="">Pilih Jurusan</option>
                                        @foreach ($datasiswa as $item)
                                            <option value="{{ $item->jurusan }}" @if(old('jurusan') == $item->jurusan) selected @endif>{{ $item->jurusan }}</option>
                                        @endforeach
                                    </select>

                                    @error('jurusan')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary w-100">
                                Simpan <span class="bi bi-send"></span>
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('admin.datasiswa.index') }}" class="btn btn-secondary w-100">
                                Kembali
                            </a>
                        </div> 
                </div>
            </div>   
@endsection