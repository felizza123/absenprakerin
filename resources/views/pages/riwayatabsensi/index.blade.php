@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-people"></span>
                Riwayat Absensi
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Hari Tanggal</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatabsensi as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nis}}</td>
                                    <td>{{$item->datasiswa ? $item->datasiswa->nama : 'N/A' }}</td> <!-- Mengambil nama siswa -->                                    
                                    <td>{{$item->haritanggal}}</td>
                                    <td>{{$item->jurusan}}</td>
                                    <td>
                                        @if($item->status == 'Hadir')
                                            <span class="badge bg-success">Hadir</span>
                                        @elseif($item->status == 'Izin')
                                            <span class="badge bg-warning">Izin</span>
                                        @else
                                            <span class="badge bg-danger">Sakit</span>
                                        @endif
                                    </td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <a href="{{ route('admin.riwayatabsensi.show', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm me-1">
                                            <i class="align-middle" data-feather="eye"></i>
                                            Show
                                        </a>
                                        <a href="{{route('admin.riwayatabsensi.edit', $item->id) }}" 
                                            class="btn btn-primary btn-sm me-1">
                                            <i class="align-middle" data-feather="edit"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
