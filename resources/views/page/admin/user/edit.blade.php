@extends('layout.admin')
@section('title', 'Ubah Pengguna')
@section('content')
<form method="POST" action="{{ url('admin/user/'.$user->id) }}">
    @method('PUT')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Ubah Pengguna</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-muted">Biarkan kosong apabila tidak ingin mengubah</small>
                        </div>
                        <div class="form-group">
                            <label for="role">Akses</label>
                            <select class="form-control" name="role_id">
                                <option selected disabled>Akses</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if ($role->id == $user->role_id) selected @endif>{{ $role->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" style="min-height:100px">{{ $user->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telefon">No Telefon</label>
                            <input type="number" name="no_telefon" class="form-control" value="{{ $user->no_telefon }}">
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
