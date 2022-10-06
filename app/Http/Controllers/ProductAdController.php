<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductAdController extends Controller
{
    public function DeleteProduct($id)
    {
        DB::delete("DELETE FROM sanpham WHERE IDSanPham = ? ", [
            $id
        ]);
        redirect()->to('product-admin')->send();
    }


    public function Filter(Request $request)
    {
        $pr = DB::table('sanpham')
        ->whereRaw('sanpham.TenSanPham LIKE "%'.$request->search . '%"')
        ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
        return view('admin/search-pr')
        ->with('pr',$pr);
    }

    public function product($id)
    {
        $pro = DB::select(
            'SELECT * FROM sanpham WHERE IDSanPham = ?',[
            $id
            ]);
            return view('admin/update-pr')
            ->with('pro',$pro[0]);
    }

    public function UpdateProduct(Request $request)
    {
        DB::update(
            'UPDATE sanpham SET TenSanPham = ? , IDDongSanPham = ? , DonGia = ? , KhuyenMai = ? , TinhTrang = ? , MoTa = ? , ChiTiet = ?
             WHERE IDSanPham = ?',[
            $request->TenSanPham, $request->IDDongSanPham, $request->DonGia, $request->KhuyenMai , $request->TinhTrang , $request->MoTa, $request->ChiTiet,
            $request->id,
            ]);
            redirect()->to('product-admin')->send();
    }


    /*Route::get('Filter{search}', [ProductAdController::class, 'Filter']);*/
}