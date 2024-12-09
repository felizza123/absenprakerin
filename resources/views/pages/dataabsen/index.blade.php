@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <h3>
                <span class="bi bi-people"></span>
                Data Absen
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
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataabsen as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nis}}</td>
                                    <td>{{$item->datasiswa ? $item->datasiswa->nama : 'N/A' }}</td>                                     
                                    <td>{{$item->haritanggal}}</td>
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
                                        <a href="{{ route('admin.dataabsen.show', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm me-1">
                                            <i class="align-middle" data-feather="eye"></i>
                                            Show
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route('admin.dataabsen.destroy', $item->id) }}`)">
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