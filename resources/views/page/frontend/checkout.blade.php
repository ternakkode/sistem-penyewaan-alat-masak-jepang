@extends('layout.frontend')
@section('title', 'Checkout')
@section('content')
<form method="post">
    @csrf
    <div id="content">
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="shopping-cart">
                    <div class="cart-ship-info">
                        <div class="row">
                            <div class="col-sm-7">
                                <h6>Data Pelanggan</h6>
                                <form>
                                    <ul class="row">
                                        <li class="col-md-6">
                                            <label>Nama
                                                <input type="text" name="nama" value="{{ $user->nama }}">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <label>Nomor Telefon
                                                <input type="number" name="no_telefon" value="{{ $user->no_telefon }}">
                                            </label>
                                        </li>
                                        <li class="col-md-12">
                                            <label>Alamat
                                                <input type="text" name="alamat" value="{{ $user->alamat }}">
                                            </label>
                                        </li>
                                        <li class="col-md-12">
                                            <label>Tanggal Pemesanan
                                                <input type="date" name="tanggal_pemesanan" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <label>Jam Mulai
                                                <input type="number" min="8" max="21" name="jam_mulai" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <label>Jam Selesai
                                                <input type="number" min="9" max="24" name="jam_selesai">
                                            </label>
                                        </li>
                                    </ul>
                                </form>
                            </div>

                            <!-- SUB TOTAL -->
                            <div class="col-sm-5">
                                <h6>Ringkasan Pesanan</h6>
                                <div class="order-place">
                                    <div class="order-detail">
                                        @foreach($keranjangs as $keranjang)
                                        <p>{{ $keranjang->pivot->qty }} {{ $keranjang->nama }} <span>Rp.
                                                {{ $keranjang->pivot->qty * $keranjang->harga }} (Rp
                                                {{$keranjang->harga}} satuan)</span></p>
                                        @endforeach

                                        <!-- SUB TOTAL -->
                                        <p class="all-total">Total Biaya <span> Rp {{ $totalBelanjaan }}</span></p>
                                    </div>
                                    <div class="pay-meth">
                                        <button type="submit" class="btn btn-dark pull-right margin-top-30">Buat
                                            Pesanan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
@endsection