@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Show - Datasiswa
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <h3 class = "fw-bold mb-2 pb-2 border-bottom">Detail Datasiswa</h3>
                        
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>NIS</th>
                                <td>{{$datasiswa->nis}}</td>
                            </tr>
                            <tr>
                                <th>Datasiswa Nama</th>
                                <td>{{$datasiswa->nama}}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{$datasiswa->jurusan}}</td>
                            </tr>
                            <tr>
                                <th>Mulai Prakerin</th>
                                <td>{{$datasiswa->mulaiprakerin}}</td>
                            </tr>
                            <tr>
                                <th>Akhir Prakerin</th>
                                <td>{{$datasiswa->akhirprakerin}}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <img src="{{asset('/storage/image/'.$datasiswa->foto)}}" class="img-thumbnail" alt="" width="200">
                                </td>
                            </tr>
                                <td>Created At</td>
                                <td>{{Carbon\Carbon::parse($datasiswa->Created_at)->isoFormat('DD MMM Y HH:mm')}}</td>
                            </tr>
                            <tr>
                                <td>Updated At</td>
                                <td>{{Carbon\Carbon::parse($datasiswa->Updated_at)->isoFormat('DD MMM Y HH:mm')}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.datasiswa.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection