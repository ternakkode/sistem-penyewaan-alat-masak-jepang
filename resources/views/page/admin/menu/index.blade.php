@extends('layout.admin')
@section('title', 'Data Menu')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title float-left">Data Menu</div>
                <a href="{{ url('admin/menu/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data Menu</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $key => $menu)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $menu->nama }}</td>
                            <td>{{ $menu->kategori->nama }}</td>
                            <td>{{ $menu->harga }}</td>
                            <td>{{ $menu->stok }}</td>
                            <td><a href="{{ url('admin/menu/'.$menu->id.'/edit')}}"
                                    class="btn btn-primary btn-sm d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/menu/'.$menu->id)}}" class="d-inline">
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
