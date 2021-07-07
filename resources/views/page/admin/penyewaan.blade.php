@extends('layout.admin')
@section('title', 'Data Penyewaan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title float-left">Data Penyewaaan</div>
            </div>
            <div class="card-body">
                <table class="table mt-3">
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
                            <form method="POST" action="{{ url('admin/penyewaan/'.$penyewaan->id) }}">
                                <td>
                                    <select class="form-control form-control-sm" name="status">
                                        @foreach($statusPenyewaans as $status)
                                        <option value="{{ $status->id }}" @if($penyewaan->statusPenyewaan->id ==
                                            $status->id) selected @endif>{{ $status->nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>

                                    @csrf
                                    <button onclick="$(this).closest('form').submit();"
                                        class="btn btn-secondary btn-sm mb-1">Simpan Status</button>
                                    <a href="{{ url('admin/penyewaan/'.$penyewaan->id) }}"
                                        class="btn btn-warning btn-sm">Detail</a>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });

</script>
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('success_message') }}'
    })

</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('failed_message') }}'
    })

</script>
@endif
@endsection
