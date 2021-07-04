@extends('layout.frontend')
@section('title', 'Registrasi')
@section('content')
<!-- Content -->
<div id="content">
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="shopping-cart">
                <div class="cart-ship-info register">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Daftar Akun Baru</h6>
                            <form method="post">
                                @csrf
                                <ul class="row">
                                    <li class="col-md-12">
                                        <label> Nama
                                            <input type="text" name="nama" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> Email
                                            <input type="email" name="email" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> No Telefon
                                            <input type="number" name="no_telefon" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> Username
                                            <input type="text" name="username" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label>Password
                                            <input type="password" name="password" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-12">
                                        <label>Alamat
                                            <input type="text" name="alamat" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <button type="submit" class="btn">Daftar Sekarang</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
