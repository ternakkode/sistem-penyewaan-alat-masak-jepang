<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $payload['kategories'] = Kategori::all();

        return view('page/admin/kategori/index', $payload);
    }

    public function create()
    {
        return view('page/admin/kategori/create');
    }


    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama = $request->input('nama');
        $kategori->save();

        return redirect('admin/kategori')->with('success_message', 'Berhasil menambahkan data kategori menu baru');
    }

    public function edit($id)
    {
        $payload['kategori'] = Kategori::find($id);
        if (!$payload['kategori']) redirect('admin/kategori')->with('failed_message', 'Data kategori tidak ditemukan');

        return view('page/admin/kategori/edit', $payload);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) redirect('admin/kategori')->with('failed_message', 'Data kategori tidak ditemukan');

        $kategori->nama = $request->input('nama');
        $kategori->save();

        return redirect('admin/kategori')->with('success_message', 'Berhasil mengubah data kategori menu');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) redirect('admin/kategori')->with('failed_message', 'Data kategori tidak ditemukan');
        $kategori->delete();

        return redirect('admin/kategori')->with('success_message', 'Berhasil menghapus data kategori menu');
    }
}
