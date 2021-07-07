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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">No Telefon</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Total Biaya</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penyewaans as $key => $penyewaan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $penyewaan->nama }}</td>
                                <td>{{ $penyewaan->no_telefon }}</td>
                                <td>{{ $penyewaan->tanggal_pemesanan }}</td>
                                <td>{{ $penyewaan->total_biaya }}</td>
                                <td>
                                    {{ $penyewaan->statusPenyewaan->nama }}
                                </td>
                                <td>
                                    <a href="{{ url('order/'.$penyewaan->id) }}"
                                        class="btn btn-warning btn-sm">Detail</a>
                                </td>
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
