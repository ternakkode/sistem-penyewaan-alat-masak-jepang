@extends('layout.admin')
@section('title', 'Data Pengguna')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title float-left">Data Pengguna</div>
                <a href="{{ url('admin/user/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data Pengguna</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Akses</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->role->nama }}</td>
                            <td><a href="{{ url('admin/user/'.$user->id.'/edit')}}"
                                    class="btn btn-primary btn-sm d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/user/'.$user->id)}}" class="d-inline">
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
