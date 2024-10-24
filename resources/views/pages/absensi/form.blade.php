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
                                Silahkan isi form dibawah ini untuk absen :
                            </div>
                            <div class="card-body">

                                @if(Session::has('success'))
                                <div class="alert alert-success" style="background-color: #d4edda; color: #111; border-color: #c3e6cb; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px;">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                                        <form action="{{ route('admin.form.store') }}" method="POST">
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
                                                        <label for="haritanggal" class="form-label">Hari Tanggal <span class="text-danger">*</span></label>
                                                        <input type="date" name="haritanggal" id="haritanggal" value="{{ old('haritanggal') }}" class="form-control @error('haritanggal') is-invalid @enderror" />
                                                        
                                                        @error('haritanggal')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            
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
                                            
                                            

                                            <div class="form-group mb-2">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                            
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Hadir" value="Hadir" class="form-check-input @error('status') is-invalid @enderror"
                                                        {{ (old('status', $item->status) == 'Hadir') ? 'checked' : '' }} />
                                                    <label for="Hadir" class="form-check-label">Hadir</label>
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Izin" value="Izin" class="form-check-input @error('status') is-invalid @enderror"
                                                        {{ (old('status', $item->status) == 'Izin') ? 'checked' : '' }} />
                                                    <label for="Izin" class="form-check-label">Izin</label>
                                                </div>
                                            
                                                <div class="form-check">
                                                    <input type="radio" name="status" id="Sakit" value="Sakit" class="form-check-input @error('status') is-invalid @enderror"
                                                        {{ (old('status', $item->status) == 'Sakit') ? 'checked' : '' }} />
                                                    <label for="Sakit" class="form-check-label">Sakit</label>
                                                </div>
                                            
                                                @error('status')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            
                                            <div class="form-group mb-3">
                                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                            
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            

                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Simpan <span class="bi bi-send"></span>
                                        </button>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.riwayatabsensi.index') }}" class="btn btn-secondary w-100">
                                            Kembali
                                        </a>
                                    </div>    

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</section>
@endsection