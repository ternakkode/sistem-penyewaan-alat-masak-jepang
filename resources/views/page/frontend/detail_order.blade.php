@extends('layout.frontend')
@section('title', 'Data Penyewaan')
@section('content')
<!-- Content -->
<div id="content" style="min-height:100vh">
    <section class="chart-page">
        <div class="container">
            <div class="shopping-cart">
                <div class="cart-ship-info register">
                    <h3 class="text-center" style="padding-bottom:30px;">Data Penyewaan</h3>
                    <h3>Data Pembeli : </h3>

                    <table class="table mt-3">
                        <tbody>
                            <tr>
                                <td>Nama : </td>
                                <td>{{ $penyewaan->nama }}</td>
                            </tr>
                            <tr>
                                <td>No Telefon : </td>
                                <td>{{ $penyewaan->no_telefon }}</td>
                            </tr>
                            <tr>
                                <td>Alamat : </td>
                                <td>{{ $penyewaan->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Pemesanan : </td>
                                <td>{{ $penyewaan->tanggal_pemesanan }}</td>
                            </tr>
                            <tr>
                                <td>Jam Mulai : </td>
                                <td>{{ $penyewaan->jam_mulai }}</td>
                            </tr>
                            <tr>
                                <td>Jam Selesai : </td>
                                <td>{{ $penyewaan->jam_selesai }}</td>
                            </tr>
                            <tr>
                                <td>Total Biaya : </td>
                                <td>{{ $penyewaan->total_biaya }}</td>
                            </tr>
                            <tr>
                                <td>Status : </td>
                                <td>{{ $penyewaan->statusPenyewaan->nama }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>Menu yang dibeli : </h3>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penyewaan->menu as $key => $menu)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $menu->nama }}</td>
                                <td>{{ $menu->jumlah }}</td>
                                <td>{{ $menu->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>Alat yang didapatkan : </h3>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penyewaan->alat as $key => $alat)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $alat->nama }}</td>
                                <td>{{ $alat->pivot->jumlah }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
