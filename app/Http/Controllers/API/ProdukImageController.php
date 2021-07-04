<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\MenuFoto;
use Illuminate\Http\Request;

class ProdukImageController extends Controller
{
    public function upload(Request $request) {
        $image = $request->file('file');
        
        $fileName = uniqid() . '_' . trim($image->getClientOriginalName());
        
        $image->storeAs(config('url.tmp_produk_foto'), $fileName);

        return response()->json([
            'name' => $fileName,
            'original_name' => $image->getClientOriginalName()
        ]);
    }

    public function setPrimary($menuId, $imageId) {
        MenuFoto::where([
            ['menu_id', '=', $menuId],
            ['foto_utama', '=', true]
        ])->update(['foto_utama' => false]);

        MenuFoto::where('id', $imageId)->update(['foto_utama' => true]);

        return MenuFoto::where('menu_id', $menuId)->get();
    }

    public function delete($menuId, $imageId) {
        $menuFoto = MenuFoto::find($imageId);
        if ($menuFoto->foto_utama) {
            $randomPhoto = MenuFoto::where('id', '!=', $imageId)->first();
            $randomPhoto->foto_utama = true;
            $randomPhoto->save();
        }
        
        $menuFoto->delete();

        return MenuFoto::where('menu_id', $menuId)->get();
    }
}
