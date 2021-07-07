@extends('layout.admin')
@section('title', 'Data Penyewaan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title float-left">Detail Penyewaan</div>
            </div>
            <div class="card-body">
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
</div>
@endsection
