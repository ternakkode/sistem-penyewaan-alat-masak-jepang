<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Model\Pembayaran;
use App\Model\Penyewaan;
use App\Model\Pengiriman;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function dashboard() {
        $payload['menus'] = Menu::where('menu_utama', true)->limit(4)->get();

        return view('page/frontend/dashboard', $payload);
    }

    public function menu() {
        $payload['menus'] = Menu::all();

        return view('page/frontend/menu', $payload);
    }

    public function detailMenu($menuId) {
        $payload['menu'] = Menu::find($menuId);
        if (!$payload['menu']) return redirect('menu');
        $payload['reviews'] = Review::whereHas('penyewaan', function ($query) use ($payload){
            $query->whereHas('menu', function ($q) use($payload) {
                $q->where('menu.id', $payload['menu']->id);
            });
        })->get();
        
        return view('page/frontend/detailMenu', $payload);
    }

    public function tambahKeranjang(Request $request) {
        DB::beginTransaction();

        $menuId = $request->input('menu_id');
        $qty = $request->input('qty') ?? 1;
        $user = auth()->user();

        $currentUserKeranjang = $user->keranjang()->where('menu.id', $menuId)->first();
        if ($currentUserKeranjang) {
            $qty += $currentUserKeranjang->pivot->qty;
            $user->keranjang()->updateExistingPivot($menuId, [
                'qty' => $qty
            ]);
        } else {
            $user->keranjang()->attach($menuId, ['qty' => $qty]);
        }

        $menu = Menu::find($menuId);
        if ($menu->stok < $qty) {
            DB::rollBack();
            return redirect()->back();
        }

        DB::commit();

        return redirect('keranjang');
    }

    public function keranjang() {
        $payload['keranjangs'] = auth()->user()->keranjang;

        $payload['totalBelanjaan'] = 0;
        foreach ($payload['keranjangs'] as $keranjang) {
            $payload['totalBelanjaan'] += $keranjang->pivot->qty * $keranjang->harga;
        }

        return view('page/frontend/keranjang', $payload);
    }

    public function hapusKeranjang($menuId) {
        auth()->user()->keranjang()->detach($menuId);

        return redirect('keranjang');
    }

    public function checkout() {
        $isMenuUtamaFound = auth()->user()->keranjang()->where('menu_utama', true)->get();
        if ($isMenuUtamaFound->isEmpty()) {
            return redirect('menu');
        }

        $payload['user'] = auth()->user();
        $payload['keranjangs'] = auth()->user()->keranjang;

        $payload['totalBelanjaan'] = 0;
        foreach ($payload['keranjangs'] as $keranjang) {
            $payload['totalBelanjaan'] += $keranjang->pivot->qty * $keranjang->harga;
        }

        $payload['pengirimans'] = Pengiriman::all();
        $payload['pembayarans'] = Pembayaran::all();

        return view('page/frontend/checkout', $payload);
    }

    public function checkoutProcess(Request $request) {
        // insert required data
        $penyewaan = new Penyewaan();
        $penyewaan->user_id = auth()->user()->id;
        $penyewaan->nama = $request->input('nama');
        $penyewaan->no_telefon = $request->input('no_telefon');
        $penyewaan->alamat = $request->input('alamat');
        $penyewaan->pengiriman_id = $request->input('pengiriman');
        $penyewaan->pembayaran_id = $request->input('pembayaran');
        $penyewaan->tanggal_pemesanan = $request->input('tanggal_pemesanan');
        $penyewaan->jam_mulai = $request->input('jam_mulai');
        $penyewaan->jam_selesai = $request->input('jam_selesai');
        $penyewaan->ongkir = $penyewaan->pengiriman_id == 1 ? 20000 : 0;
        $penyewaan->total_biaya = 0;
        
        // fetch status order
        $statusPenyewaanId = 96;
        if ($penyewaan->pembayaran_id == 1) {
            $statusPenyewaanId = 11;
        }

        $penyewaan->status_penyewaan_id = $statusPenyewaanId;
        $penyewaan->save();

        // count total amount should paid, add detail menu ordered, add used alat to order
        $totalBelanjaan = 0;
        $menuPenyewaan = [];

        $keranjangs = auth()->user()->keranjang;
        foreach($keranjangs as $keranjang) {
            $totalBelanjaan += $keranjang->pivot->qty * $keranjang->harga;
            $menuPenyewaan[$keranjang->id] = [
                'jumlah' => $keranjang->pivot->qty,
                'harga' => $keranjang->harga
            ];

            foreach ($keranjang->alat as $alat) {
                $currentAlat = $penyewaan->alat()->where('alat.id', $alat->id)->first();
                if ($currentAlat) {
                    $jumlah = $currentAlat->pivot->jumlah + 1;
                    $penyewaan->alat()->updateExistingPivot($alat->id, [
                        'jumlah' => $jumlah
                    ]);
                } else {
                    $penyewaan->alat()->attach($alat->id, [
                        'jumlah' => 1
                    ]);
                }
            }
        }

        $penyewaan->total_biaya = $totalBelanjaan + $penyewaan->ongkir;
        $penyewaan->save();

        $penyewaan->menu()->attach($menuPenyewaan);

        auth()->user()->keranjang()->delete();
    }
}
