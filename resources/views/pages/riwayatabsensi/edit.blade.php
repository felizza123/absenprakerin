@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3 style="text-align: center;">
            <span class="bi bi-building bold"></span>
            <strong>Edit - Riwayat Absensi</strong>
        </h3>
    </div>
    <section class="section">  
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow">
                        <div class="card-header">
                            Silahkan edit form dibawah ini untuk absen :
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.riwayatabsensi.update', $riwayatabsensi->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3"> 
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="namasiswa_id" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                            <select name="namasiswa_id" class="form-select @error('namasiswa_id') is-invalid @enderror">
                                                <option value="">Pilih Nama Siswa</option>
                                                @foreach($datasiswa as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $riwayatabsensi->namasiswa_id) selected @endif>
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
                                            <input type="number" name="nis" id="nis" value="{{ old('nis', $riwayatabsensi->nis) }}" class="form-control @error('nis') is-invalid @enderror" />

                                            @error('nis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3"> 
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="haritanggal" class="form-label">Hari Tanggal <span class="text-danger">*</span></label>
                                            <input type="date" name="haritanggal" id="haritanggal" value="{{ old('haritanggal', $riwayatabsensi->haritanggal) }}" class="form-control @error('haritanggal') is-invalid @enderror" />
                                            
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
                                            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $riwayatabsensi->jurusan) }}" class="form-control @error('jurusan') is-invalid @enderror" />
                                            
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
                                        <input type="radio" name="status" id="Hadir" value="Hadir" class="form-check-input" @if($riwayatabsensi->status == 'Hadir') checked @endif />
                                        <label for="Hadir" class="form-check-label">Hadir</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input type="radio" name="status" id="Izin" value="Izin" class="form-check-input" @if($riwayatabsensi->status == 'Izin') checked @endif />
                                        <label for="Izin" class="form-check-label">Izin</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="status" id="Sakit" value="Sakit" class="form-check-input" @if($riwayatabsensi->status == 'Sakit') checked @endif />
                                        <label for="Sakit" class="form-check-label">Sakit</label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $riwayatabsensi->keterangan) }}</textarea>
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
    </section>
</div>
@endsection
