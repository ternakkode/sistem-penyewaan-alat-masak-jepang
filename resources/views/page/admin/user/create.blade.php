@extends('layout.admin')
@section('title', 'Tambah Pengguna')
@section('content')
<form method="POST" action="{{ url('admin/user') }}">
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Pengguna</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Akses</label>
                            <select class="form-control" name="role_id">
                                <option selected disabled>Akses</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" style="min-height:100px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telefon">No Telefon</label>
                            <input type="number" name="no_telefon" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
