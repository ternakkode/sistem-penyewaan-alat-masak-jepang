@extends('layout.frontend')
@section('title', 'Detail Menu')
@section('content')
<!-- Content -->
<div id="content">
    <section class="padding-top-100 padding-bottom-100">
        <div class="container">

            <!-- SHOP DETAIL -->
            <form method="post" action="{{ url('keranjang') }}">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <div class="shop-detail">
                    <div class="row">

                        <!-- Popular Images Slider -->
                        <div class="col-md-7">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    @foreach($menu->foto as $foto)
                                    <li data-thumb="{{ menu_image_link($foto->url) }}"> <img class="img-responsive"
                                            src="{{ menu_image_link($foto->url) }}" alt=""> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- COntent -->
                        <div class="col-md-5">
                            <h4>{{ $menu->nama }}</h4>
                            <span class="price"><small>Rp. </small>{{ $menu->harga }}</span>

                            <!-- Sale Tags -->
                            <ul class="item-owner">
                                <li>Kategori : <span> {{ $menu->kategori->nama }}</span></li>
                                <li>Alat yang didapatkan : <span> @foreach($menu->alat as $alat)
                                        {{ $alat->nama }} @endforeach</span></li>
                                <li>Stok Tersisa : <span>{{ $menu->stok }}</span></li>
                            </ul>

                            <!-- Item Detail -->
                            <p>{!! nl2br(e($menu->deskripsi)) !!}</p>

                            <!-- Short By -->
                            <div class="some-info">
                                <ul class="row margin-top-30">
                                    <li class="col-xs-4">
                                        <div class="quinty">
                                            <select name="qty" class="selectpicker">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </li>

                                    <!-- ADD TO CART -->
                                    <li class="col-xs-6"> <a href="#" onclick="$(this).closest('form').submit()"
                                            class="btn">Keranjang</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
</div>
@endsection
