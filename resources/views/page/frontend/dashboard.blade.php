@extends('layout.frontend')
@section('title', 'Home')
@section('content')
<section class="home-slider">

    <!-- SLIDE Start -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/images/bg.jpg') }}" alt="slider" data-bgposition="center center"
                        data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                        data-y="center" data-voffset="0" data-speed="800" data-start="800"
                        data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                        data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                        style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                        Grillkop </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                        data-y="center" data-voffset="110" data-speed="800" data-start="1300"
                        data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                        data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                        style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                        Probolinggo</div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                        data-voffset="240" data-speed="800" data-start="2200" data-easing="Power3.easeInOut"
                        data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-scrolloffset="0"
                        style="z-index: 8;"><a href="{{ url('menu') }}" class="btn">Beli Sekarang</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Content -->
<div id="content">
    <section class="padding-top-50 padding-bottom-150">
        <div class="container">
            <div class="heading text-center">
                <h4>Pilihan Menu</h4>
                <span>Pilihan menu terbaik kami.</span>
            </div>

            <!-- Popular Item Slide -->
            <div class="papular-block block-slide">

                @foreach($menus as $menu)
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
                @endforeach
            </div>
    </section>

    <!-- About -->
    <section class="small-about padding-top-150 padding-bottom-150">
        <div class="container">

            <!-- Main Heading -->
            <div class="heading text-center">
                <h4>Tentang Grillkop</h4>
                <p>Yakiniku is one of the most popular cooking styles in Japan. The best part of yakiniku is
                    grilling the meat yourself and cooking each choice cut of meat just the way you like it. At
                    Kintan Buffet (Kintan means golden tongue, 金舌, in Japanese) we offer a premium Japanese BBQ
                    experience in a classy environment and at good value.</p>
            </div>
        </div>
    </section>
</div>
@endsection