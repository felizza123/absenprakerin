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
        class="btn btn-primary mb-4">
            <i class="align-middle" data-feather="plus-circle" ></i>
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
                            <th>Mulai Prakerin</th>
                            <th>Akhir Prakerin</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasiswa as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->mulaiprakerin}}</td>
                                <td>{{$item->akhirprakerin}}</td>
                                
                                <td>
                                    <img src="{{ asset('/storage/image/' . $item->foto) }}" class="img-thumbnail" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.datasiswa.show', $item->id) }}"
                                        class="btn btn-outline-secondary btn-sm me-1">
                                        <i class="align-middle" data-feather="eye"></i>
                                        Show
                                    </a>
                                    <a href="{{ route('admin.datasiswa.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm me-1">
                                        <i class="align-middle" data-feather="edit"></i>
                                        Edit
                                    </a>
                                    <a href="#" 
                                        class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route('admin.datasiswa.destroy', $item->id) }}`)">
                                        <i class="align-middle" data-feather="trash"></i>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        function handleDestroy(url) {
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat mengembalikan ini!",
                icon: "warning",
                buttons: ['Batal', 'Ya, Hapus!'],
                dangerMode: true,
            }).then((confirmed) => {
                if (confirmed) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>
@endpush