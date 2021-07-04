@extends('layout.frontend')
@section('title', 'Menu')
@section('content')
<!-- Content -->
<div id="content">
    <section class="padding-top-50 padding-bottom-150">
        <div class="container">

            <div class="heading text-center">
                <h4>Pilihan Menu</h4>
                <span>Pilihan menu terbaik kami.</span>
            </div>

            <div class="papular-block row">

                <!-- Item -->
                @foreach($menus as $menu)
                <div class="col-md-3">
                    <div class="item">
                        <!-- Item img -->
                        <div class="item-img">
                            @foreach($menu->foto as $foto)
                            @if ($foto->foto_utama)
                            <img class="img-1" src="{{ menu_image_link($foto->url) }}" alt="">
                            <img class="img-2" src="{{ menu_image_link($foto->url) }}" alt="">
                            @endif
                            @endforeach
                            <!-- Overlay -->
                            <div class="overlay">
                                <div class="position-center-center">
                                    <div class="inn">
                                        <a href="{{ url('menu/'.$menu->id) }}">
                                            <i class="icon-magnifier"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Item Name -->
                            <div class="item-name"> <a href="#.">{{ $menu->nama }}</a>
                                <p>{{ $menu->kategori->nama }}</p>
                            </div>
                            <!-- Price -->
                            <span class="price"><small>Rp. </small> {{ $menu->harga }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
</div>
@endsection
