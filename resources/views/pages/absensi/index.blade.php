@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-people"></span>
                Absensi
            </h3>
        </div>

        <a href="{{ route('admin.absensi.create') }}"
        class="btn btn-primary mb-3 btn-lg">
        <i class="align-middle" data-feather="plus-circle" ></i>
        Absen
        </a>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absensi as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->namasiswa}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <a href="{{ route('admin.absensi.show', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm me-1">
                                            <span class="bi bi-eye"></span>
                                            Show
                                        </a>
                                        <a href="{{ route('admin.absensi.edit', $item->id) }}"
                                            class="btn btn-secondary btn-sm me-1">
                                            <span class="bi bi-pencil"></span>
                                            Edit
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route('admin.absensi.destroy', $item->id) }}`)">
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