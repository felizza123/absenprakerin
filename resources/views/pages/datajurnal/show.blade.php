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
                                <td>{{$datajurnal->nama}}</td>
                            </tr>
                            <tr>
                                <th>Hari Tanggal</th>
                                <td>{{$datajurnal->hari_tanggal}}</td>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                <td>{{$datajurnal->jam}}</td>
                            </tr>
                            <tr>
                                <th>Jurnal</th>
                                <td>{{$datajurnal->jurnal}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{$datajurnal->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{$datajurnal->updated_at}}</td>
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