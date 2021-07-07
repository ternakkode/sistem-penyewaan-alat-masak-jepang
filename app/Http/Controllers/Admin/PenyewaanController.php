<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Penyewaan;
use App\Model\StatusPenyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenyewaanController extends Controller
{
    public function index()
    {
        $payload['statusPenyewaans'] = StatusPenyewaan::all();
        $payload['penyewaans'] = Penyewaan::all();

        return view('page/admin/penyewaan', $payload);
    }

    public function detail($id) {
        $payload['penyewaan'] = Penyewaan::find($id);

        return view('page/admin/detail_penyewaan', $payload);
    }

    public function update($id, Request $request) {
        $status = $request->input('status');

        $penyewaan = Penyewaan::find($id);
        $penyewaan->status_penyewaan_id = $status;
        $penyewaan->save();


        return redirect('admin/penyewaan')->with('success_message', 'Berhasil mengubah data penyewaan'); 
    }
}
