@extends('layout.admin')
@section('title', 'Tambah Kategori Menu')
@section('content')
<form method="POST" action="{{ url('admin/kategori') }}">
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Kategori Menu</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control">
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
