@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Show - Data Absen
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <td>{{$dataabsen->id}}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>{{$dataabsen->nis}}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{ $dataabsen->datasiswa ? $dataabsen->datasiswa->nama : 'N/A' }}</td>                                    
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{$dataabsen->jurusan}}</td>
                            </tr>
                            <tr>
                                <th>Hari Tanggal</th>
                                <td>{{$dataabsen->haritanggal}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($dataabsen->status == 'Hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($dataabsen->status == 'Izin')
                                        <span class="badge bg-warning">Izin</span>
                                    @else
                                        <span class="badge bg-danger">Sakit</span>
                                    @endif
                                </td>
                           </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{$dataabsen->keterangan}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.dataabsen.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection