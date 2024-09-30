@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-people"></span>
            Data Siswa
        </h3>
    </div>

    
    <a href="{{ route('admin.datasiswa.create') }}"
    class="btn btn-primary mb-3">
    <span class="bi bi-plus-circle"></span>
        Created New
    </a>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasiswa as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <a href="{{ route('admin.datasiswa.show', $item->id) }}"
                                        class="btn btn-outline-secondary btn-sm me-1">
                                        <span class="bi bi-eye"></span>
                                        Show
                                    </a>
                                    <a href="{{ route('admin.datasiswa.edit', $item->id) }}"
                                        class="btn btn-secondary btn-sm me-1">
                                        <span class="bi bi-pencil"></span>
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route('admin.datasiswa.destroy', $item->id) }}`)">
                                        <span class="bi bi-trash"></span>
                                        Delete
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

<form action="" id="form-delete" method="POST">
    @csrf
    @method('DELETE')
</form>

@endsection

