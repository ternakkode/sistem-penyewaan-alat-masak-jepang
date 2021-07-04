<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Alat;
use App\Model\Kategori;
Use App\Model\Menu;
use App\Model\MenuFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $payload['menus'] = Menu::all();

        return view('page/admin/menu/index', $payload);
    }

    public function create()
    {
        $payload['alats'] = Alat::all();
        $payload['kategories'] = Kategori::all();

        return view('page/admin/menu/create', $payload);
    }

    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->nama = $request->input('nama');
        $menu->kategori_id = $request->input('kategori_id');
        $menu->menu_utama = $request->input('menu_utama') == "Y" ? true : false;
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->stok = $request->input('stok');
        $menu->save();

        $fotos = $request->input('foto');
        if (isset($fotos)) {
            $photos = [];
            $oldStorageFolder = config('url.tmp_produk_foto');
            $newStorageFolder = config('url.produk_foto');

            foreach ($fotos as $foto) {
                $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
                
                if ($moveFile) {
                    $newFoto = [];
                    $newFoto['url'] = $foto;
                    $newFoto['foto_utama'] = empty($photos) ? 1 : 0;
                    array_push($photos, $newFoto);
                }
            }

            $menu->foto()->createMany($photos);
        }

        $alat = $request->input('alat');
        if (isset($alat)) {
            $menu->alat()->attach($alat);
        }

        return redirect('admin/menu')->with('success_message', 'Berhasil menambahkan data menu baru');
    }

    public function edit($id)
    {
        $payload['menu'] = Menu::find($id);
        if (!$payload['menu']) redirect('admin/menu')->with('failed_message', 'Data menu makanan tidak ditemukan');
        $payload['alats'] = Alat::all();
        $payload['kategories'] = Kategori::all();

        return view('page/admin/menu/edit', $payload);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if (!$menu) redirect('admin/menu')->with('failed_message', 'Data menu tidak ditemukan');

        $menu->nama = $request->input('nama');
        $menu->kategori_id = $request->input('kategori_id');
        $menu->menu_utama = $request->input('menu_utama') == "Y" ? true : false;
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->stok = $request->input('stok');
        $menu->save();

        $fotos = $request->input('foto');
        if (isset($fotos)) {
            $photos = [];
            $oldStorageFolder = config('url.tmp_produk_foto');
            $newStorageFolder = config('url.produk_foto');
            $currentMenuPhotos = MenuFoto::where('menu_id', $menu->id)->get();

            foreach ($fotos as $foto) {
                $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
                
                if ($moveFile) {
                    $newFoto = [];
                    $newFoto['url'] = $foto;
                    $newFoto['foto_utama'] = empty($photos) && $currentMenuPhotos->isEmpty() ? 1 : 0;
                    array_push($photos, $newFoto);
                }
            }

            $menu->foto()->createMany($photos);
        }

        $menu->alat()->detach();
        $alat = $request->input('alat');
        if (isset($alat)) {
            $menu->alat()->attach($alat);
        }

        return redirect('admin/menu')->with('success_message', 'Berhasil mengubah data menu');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (!$menu) redirect('admin/menu')->with('failed_message', 'Data menu tidak ditemukan');
        $menu->delete();

        return redirect('admin/menu')->with('success_message', 'Berhasil menghapus data menu');
    }
}
