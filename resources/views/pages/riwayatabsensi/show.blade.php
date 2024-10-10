@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Riwayat Absensi
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <td>{{$riwayatabsensi->id}}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>{{$riwayatabsensi->nis}}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{$riwayatabsensi->namasiswa_id}}</td>              
                                </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{$riwayatabsensi->jurusan}}</td>
                            </tr>
                            <tr>
                                <th>Hari Tanggal</th>
                                <td>{{$riwayatabsensi->haritanggal}}</td>
                            </tr>
                           <tr>
                                <th>Status</th>
                                <td>
                                    @if($riwayatabsensi->status == 'Hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($riwayatabsensi->status == 'Izin')
                                        <span class="badge bg-warning">Izin</span>
                                    @else
                                        <span class="badge bg-danger">Sakit</span>
                                    @endif
                                </td>
                           </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{$riwayatabsensi->keterangan}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.riwayatabsensi.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection