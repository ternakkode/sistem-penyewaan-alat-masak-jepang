@extends('layout.admin')
@section('title', 'Ubah Kategori Menu')
@section('content')
<form method="POST" action="{{ url('admin/kategori/'.$kategori->id) }}">
    @method('PUT')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Ubah Kategori Menu</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}">
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
