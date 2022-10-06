<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function order($id)
    {
        $order = DB::table('donhang')
    ->where('donhang.IDDonHang', '=', $id )
    ->join('chitietdonhang','donhang.IDdonHang','chitietdonhang.IDdonHang')
    ->join('sanpham','chitietdonhang.IDSanPham','sanpham.IDSanPham')
    ->get();
    return view('admin/detail-order')
            ->with('order',$order);
    }

    public function UpdateSus($id)
    {
        DB::update("UPDATE donhang SET TinhTrang = 2 WHERE IDDonHang = ? ", [
            $id
        ]);
            redirect()->to('bill-admin')->send();
    }

    public function UpdateCan($id)
    {
        DB::update("UPDATE donhang SET TinhTrang = 4 WHERE IDDonHang = ? ", [
            $id
        ]);
            redirect()->to('bill-admin')->send();
    }

    public function UpdateSuss($id)
    {
        DB::update("UPDATE donhang SET TinhTrang = 3 WHERE IDDonHang = ? ", [
            $id
        ]);
            redirect()->to('bill-admin')->send();
    }
   
}

/*Route::get('detail-order', [OrderController::class, 'order']);*/