@extends('layout.admin')
@section('title', 'Data Kategori Menu')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title float-left">Data Kategori Menu</div>
                <a href="{{ url('admin/kategori/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data Kategori Menu</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategories as $key => $kategori)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td><a href="{{ url('admin/kategori/'.$kategori->id.'/edit')}}"
                                    class="btn btn-primary btn-sm d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/kategori/'.$kategori->id)}}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('success_message') }}'
    })
</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('failed_message') }}'
    })
</script>
@endif
@endsection
