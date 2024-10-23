@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Create New - Data Siswa
            </h3>
        </div>

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

                        <div class="row mb-3"> 
                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" />

                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="jurusan">Jurusan <span class="text-danger">*</span></label>
                                    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" class="form-control @error('jurusan') is-invalid @enderror" />

                                    @error('jurusan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3"> 
                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="mulaiprakerin">Mulai Prakerin <span class="text-danger">*</span></label>
                                    <input type="date" name="mulaiprakerin" id="mulaiprakerin" value="{{ old('mulaiprakerin') }}" class="form-control @error('mulaiprakerin') is-invalid @enderror" />

                                    @error('mulaiprakerin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6"> 
                                <div class="form-group mb-2">
                                    <label for="akhirprakerin">Akhir Prakerin <span class="text-danger">*</span></label>
                                    <input type="date" name="akhirprakerin" id="akhirprakerin" value="{{ old('akhirprakerin') }}" class="form-control @error('akhirprakerin') is-invalid @enderror" />

                                    @error('akhirprakerin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-2">
                            <label for="foto" class="form-label">Foto<span class="text-danger">*</span></label>
                            <input type="file" name="foto" id="foto" value="{{old('foto')}}" class="form-control @error ('foto') is-invalid @enderror" />
                            
                            @error('foto')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <img id="fotoPreview" src="" alt="Preview" class="img-thumbnail" style="display: none; max-width: 100%; height: auto;" width="300" />
                            <script>
                                document.getElementById('foto').addEventListener('change', function(event) {
                                    const file = event.target.files[0];
                                    const preview = document.getElementById('fotoPreview');
                            
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            preview.src = e.target.result; // Set src dengan hasil baca FileReader
                                            preview.style.display = 'block'; // Tampilkan gambar
                                        }
                                        reader.readAsDataURL(file); // Membaca file sebagai URL Data
                                    } else {
                                        preview.src = ''; // Reset jika tidak ada file yang dipilih
                                        preview.style.display = 'none'; // Sembunyikan gambar
                                    }
                                });
                            </script>        
                        </div>
                    </div>
            </div>
        </section>

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
    </form>
    </div>
@endsection