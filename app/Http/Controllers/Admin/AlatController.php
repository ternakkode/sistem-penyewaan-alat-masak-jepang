<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Model\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $payload['alats'] = Alat::all();

        return view('page/admin/alat/index', $payload);
    }

    public function create()
    {
        return view('page/admin/alat/create');
    }


    public function store(Request $request)
    {
        $alat = new Alat();
        $alat->nama = $request->input('nama');
        $alat->stok = $request->input('stok');
        $alat->save();

        return redirect('admin/alat')->with('success_message', 'Berhasil menambahkan data alat baru');
    }

    public function edit($id)
    {
        $payload['alat'] = Alat::find($id);
        if (!$payload['alat']) redirect('admin/alat')->with('failed_message', 'Data alat makanan tidak ditemukan');

        return view('page/admin/alat/edit', $payload);
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::find($id);
        if (!$alat) redirect('admin/alat')->with('failed_message', 'Data alat tidak ditemukan');

        $alat->nama = $request->input('nama');
        $alat->stok = $request->input('stok');
        $alat->save();

        return redirect('admin/alat')->with('success_message', 'Berhasil mengubah data alat makanan');
    }

    public function destroy($id)
    {
        $alat = Alat::find($id);
        if (!$alat) redirect('admin/alat')->with('failed_message', 'Data alat tidak ditemukan');
        $alat->delete();

        return redirect('admin/alat')->with('success_message', 'Berhasil menghapus data alat makanan');
    }
}
