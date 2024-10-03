@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-building"></span>
                Absensi
            </h3>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="py-4">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <td>{{$absensi->id}}</td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>{{$absensi->nis}}</td>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{$absensi->namasiswa}}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>{{$absensi->jurusan}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$absensi->status}}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{$absensi->keterangan}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$absensi->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{$absensi->updated_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section>
        <td>
            <a href="{{route('admin.absensi.index')}}" class="btn btn-primary mb-2">Kembali</a>
        </td>

    </div>   
@endsection