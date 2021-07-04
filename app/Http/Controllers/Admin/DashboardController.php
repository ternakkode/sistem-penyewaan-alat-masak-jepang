<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Model\Penyewaan;
use App\Model\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $payload['totalProduk'] = Menu::count();
        $payload['totalOrder'] = Penyewaan::count();
        $payload['totalPelanggan'] = User::count();
        $payload['totalPenjualan'] = Penyewaan::sum('total_biaya');


        return view('page/admin/index', $payload);
    }
}
