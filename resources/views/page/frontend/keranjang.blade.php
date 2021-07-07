@extends('layout.frontend')
@section('title', 'Keranjang')
@section('content')
<!-- Content -->
<div id="content">
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
        <div class="container">
            <div class="shopping-cart text-center">
                <div class="cart-head">
                    <ul class="row">
                        <!-- PRODUCTS -->
                        <li class="col-sm-2 text-left">
                            <h6>Produk</h6>
                        </li>
                        <!-- NAME -->
                        <li class="col-sm-4 text-left">
                            <h6>Nama</h6>
                        </li>
                        <!-- PRICE -->
                        <li class="col-sm-2">
                            <h6>Harga Satuan</h6>
                        </li>
                        <!-- QTY -->
                        <li class="col-sm-1">
                            <h6>Jumlah</h6>
                        </li>

                        <!-- TOTAL PRICE -->
                        <li class="col-sm-2">
                            <h6>TOTAL</h6>
                        </li>
                        <li class="col-sm-1"> </li>
                    </ul>
                </div>
                @foreach ($keranjangs as $keranjang)
                <ul class="row cart-details">
                    <li class="col-sm-6">
                        <div class="media">
                            @foreach($keranjang->foto as $foto)
                            @if ($foto->foto_utama)
                            <div class="media-left media-middle"> <a href="#" class="item-img"> <img
                                        class="media-object" src="{{ menu_image_link($foto->url) }}" alt=""> </a> </div>
                            @endif
                            @endforeach

                            <!-- Item Name -->
                            <div class="media-body">
                                <div class="position-center-center">
                                    <h5>{{ $keranjang->nama }}</h5>
                                    <p>Alat yang didapatkan : @if ($keranjang->alat->isEmpty()) Tidak ada
                                        @else @foreach($keranjang->alat as $alat) {{ $alat->nama }} @endforeach @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- PRICE -->
                    <li class="col-sm-2">
                        <div class="position-center-center"> <span class="price"><small>Rp</small>
                                {{ $keranjang->harga }}</span>
                        </div>
                    </li>

                    <!-- QTY -->
                    <li class="col-sm-1">
                        <div class="position-center-center">
                            <span class="price">{{ $keranjang->pivot->qty }}</span>
                        </div>
                    </li>

                    <!-- TOTAL PRICE -->
                    <li class="col-sm-2">
                        <div class="position-center-center"> <span class="price"><small>Rp </small>
                                {{ $keranjang->harga * $keranjang->pivot->qty }}</span>
                        </div>
                    </li>

                    <!-- REMOVE -->
                    <li class="col-sm-1">
                        <div class="position-center-center"> <a href="{{ url('keranjang/hapus/'.$keranjang->id) }}"><i
                                    class="icon-close"></i></a> </div>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </section>

    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
        <div class="container">

            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info margin-top-0">
                <div class="row">
                    <div class="col-sm-12">
                        <h6>Total Belanjaan</h6>
                        <div class="grand-total">
                            <div class="order-detail">
                                <p class="all-total">TOTAL <span> Rp {{ $totalBelanjaan }}</span></p>
                            </div>
                        </div>

                        <div class="coupn-btn"> <a href="{{ url('menu') }}" class="btn">Lanjutkan Belanja</a> <a
                                href="{{ url('checkout') }}" class="btn">Proses</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
