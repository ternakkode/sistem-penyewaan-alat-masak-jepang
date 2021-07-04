@extends('layout.admin')
@section('title', 'Tambah Menu')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('content')
<form method="POST" action="{{ url('admin/menu') }}">
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Menu</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kategori">Nama Menu</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori_id">
                                <option selected disabled>Kategori</option>
                                @foreach($kategories as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menu_utama">Menu Wajib</label>
                            <select class="form-control" name="menu_utama">
                                <option selected value="N">TIDAK</option>
                                <option selected value="Y">YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" style="min-height:100px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="legalitas">Alat</label>
                            <div class="form-group">
                                @foreach($alats as $alat)
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="alat[]" id="alat_{{ $alat->id }}"
                                        value="{{ $alat->id }}" class="selectgroup-input">
                                    <span class="selectgroup-button" for="alat_{{ $alat->id }}">{{ $alat->nama }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="needsclick dropzone" id="document-dropzone">
                            </div>
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous"></script>
<script>
    let uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ url('api/menu/image/upload') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
        }
    }
</script>
@endsection
