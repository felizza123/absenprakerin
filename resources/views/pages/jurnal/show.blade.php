@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Show - Jurnal
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <td>{{$jurnal->id}}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>{{$jurnal->nis}}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{ $jurnal->datasiswa ? $jurnal->datasiswa->nama : 'N/A' }}</td>                           
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{$jurnal->jurusan}}</td>
                            </tr>
                            <tr>
                                <th>Hari Tanggal</th>
                                <td>{{$jurnal->haritanggal}}</td>
                            </tr>
                            <tr>
                                <th>Waktu Mulai</th>
                                <td>{{ \Carbon\Carbon::parse($jurnal->waktumulai)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Selesai</th>
                                <td>{{ \Carbon\Carbon::parse($jurnal->waktuselesai)->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Jurnal</th>
                                <td>{{$jurnal->jurnal}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.jurnal.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection