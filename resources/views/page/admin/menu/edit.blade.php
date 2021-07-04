@extends('layout.admin')
@section('title', 'Ubah Menu')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('content')
<form method="POST" action="{{ url('admin/menu/'.$menu->id) }}">
    @method('PUT')
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Ubah Menu</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kategori">Nama Menu</label>
                            <input type="text" name="nama" class="form-control" value="{{ $menu->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori_id">
                                <option selected disabled>Kategori</option>
                                @foreach($kategories as $k)
                                <option value="{{ $k->id }}" @if($k->id == $menu->kategori_id) selected
                                    @endif>{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menu_utama">Menu Wajib</label>
                            <select class="form-control" name="menu_utama">
                                <option value="N" @if(!$menu->menu_utama) selected @endif>TIDAK</option>
                                <option value="Y" @if($menu->menu_utama) selected @endif>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $menu->stok }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"
                                style="min-height:100px">{{ $menu->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="legalitas">Alat</label>
                            <div class="form-group">
                                @foreach($alats as $alat)
                                <label class="selectgroup-item">
                                    <input type="checkbox" name="alat[]" id="alat_{{ $alat->id }}"
                                        value="{{ $alat->id }}" class="selectgroup-input" @foreach ($menu->alat as
                                    $menuAlat)
                                    @if ($menuAlat->id == $alat->id) checked @endif
                                    @endforeach>
                                    <span class="selectgroup-button" for="alat_{{ $alat->id }}">{{ $alat->nama }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="row mb-4 product-image-wrapper">
                                @foreach($menu->foto as $foto)
                                <div class="col-md-3 mx-1">
                                    <img src="{{ menu_image_link($foto->url) }}" class="img-thumbnail">
                                    <div class="produk-img-cta mt-2 text-center">
                                        @if(!$foto->foto_utama)
                                        <button type="button"
                                            class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                                            data-id="{{ $foto->id }}" data-menu="{{ $menu->id }}">JADIKAN
                                            UTAMA</button>
                                        @endif

                                        <button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image"
                                            data-id="{{ $foto->id }}" data-menu="{{ $menu->id }}">HAPUS</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

    function updateDomFoto(fotoProduks) {
        let html = '';
        fotoProduks.forEach(function (foto) {
            html += `<div class="col-md-3 mx-1">
                    <img src="/storage/images/produk/${foto.url}" class="img-thumbnail">
                    <div class="produk-img-cta mt-2 text-center">`

            if (!foto.foto_utama) {
                html += `<button type="button" class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                    data-id="${foto.id}"
                    data-menu="${foto.menu_id}"
                    >JADIKAN UTAMA</button>`;
            }

            html += `<button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image" 
                    data-id="${foto.id}"
                    data-menu="${foto.menu_id}"
                    >HAPUS</button>
                    </div>
                    </div>`;
        });
        
        $('.product-image-wrapper').html(html);
    }

    $('.product-image-wrapper').on('click', '.btn-set-primary-image', function () {
        let menuId = $(this).data('menu');
        let imageId = $(this).data('id');

        $.ajax({
            type: 'PATCH',
            url: `/api/menu/${menuId}/image/${imageId}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });

    $('.product-image-wrapper').on('click', '.btn-delete-image', function () {
        let menuId = $(this).data('menu');
        let imageId = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `/api/menu/${menuId}/image/${imageId}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });
</script>
@endsection
