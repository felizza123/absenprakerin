@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Edit - Absensi
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.absensi.update', $absensi->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="nis">Nis<span class="text-danger">*</span></label>
                            <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$absensi->nis}}">

                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="namasiswa" class="form-label">Nama Siswa</label>
                            <select name="namasiswa" id="namasiswa" class="form-select">
                                <option>Pilih Siswa</option>
                                @foreach($absensi as $item)
                                <option value="{{$item->id}}">{{ $item->nama }}</option> 
                                @endforeach
                            </select>           
                         </div>

                        <div class="form-group mb-2">
                            <label for="jurusan">Jurusan<span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{$absensi->jurusan}}">

                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-select @error ('status') is-invalid @enderror" >

                                @foreach($status as $item)
                                    <option value="{{ $item->id }}" @if(old('status') == $item->id) selected @endif>
                                        {{ $item->status }}
                                    </option>
                                @endforeach
                            </select>

                            @error('institution_id')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>                   
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{$absensi->keterangan}}</textarea>
                        </div>
            

            </div>
        </section>

        <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('admin.absensi.index')}}" class="btn btn-secondary">Batal</a>
            
    </form>
    </div>
@endsection