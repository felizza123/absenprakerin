@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-people"></span>
                Jurnal
            </h3>
        </div>

        <a href="{{ route('admin.jurnal.create') }}"
        class="btn btn-primary mb-3 btn-lg">
        <i class="align-middle" data-feather="plus-circle" ></i>
        Jurnal
        </a>

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
                                <th>Jurnal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jurnal as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nis}}</td>
                                    <td>{{$item->datasiswa ? $item->datasiswa->nama : 'N/A' }}</td>                                     
                                    <td>{{$item->haritanggal}}</td>
                                    <td>{{$item->jurnal}}</td>
                                    <td>
                                        <a href="{{ route('admin.jurnal.show', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm me-1">
                                            <i class="align-middle" data-feather="eye"></i>
                                            Show
                                        </a>
                                        <a href="{{ route('admin.jurnal.edit', $item->id) }}"
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