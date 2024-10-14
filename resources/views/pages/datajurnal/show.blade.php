@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Show - Data Jurnal
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <td>{{$datajurnal->id}}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>{{$datajurnal->nis}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $datajurnal->datasiswa ? $datajurnal->datasiswa->nama : 'N/A' }}</td> <!-- Mengambil nama siswa -->                                    
                            </tr>
                            <tr>
                                <th>Hari Tanggal</th>
                                <td>{{$datajurnal->haritanggal}}</td>
                            </tr>
                            <tr>
                                <th>Waktu Mulai</th>
                                <td>{{$datajurnal->waktumulai}}</td>
                            </tr>
                            <tr>
                                <th>Waktu Selesai</th>
                                <td>{{$datajurnal->waktuselesai}}</td>
                            </tr>
                            <tr>
                                <th>Jurnal</th>
                                <td>{{$datajurnal->jurnal}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.datajurnal.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection