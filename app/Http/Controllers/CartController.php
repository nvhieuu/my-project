<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function AddCart(Request $request)
    {
        if (session()->has('user')) {
            $idDemo = DB::select('SELECT * FROM giohang ORDER BY IDGioHang DESC ')[0]->IDGioHang;
            $idDemo = explode('GH',$idDemo);
            $idDemo = $idDemo[1] + 1;
            $idDemo = "GH" . $idDemo;
          
            $cartCheck = DB::select('SELECT * FROM giohang WHERE IDSanPham = ? AND 
            IDKhachHang = ? ', [
                $request->IDSanPham, Session::get('user')[0]->IDKhachHang
            ]);
            if (count($cartCheck) > 0) {
                DB::update(
                    'UPDATE giohang SET SoLuong = SoLuong + ? WHERE IDGioHang = ? ',
                    [$request->SoLuong, $cartCheck[0]->IDGioHang]
                );
            } else {
                
                DB::insert(
                    'INSERT INTO giohang(IDGioHang, IDKhachHang, IDSanPham, SoLuong) VALUES (?,?,?,?)',
                    [$idDemo, Session::get('user')[0]->IDKhachHang, $request->IDSanPham, $request->SoLuong]
                );
            }
            redirect()->to('cart')->send();
        } else {
            redirect()->to('index')->send();
        }
    }

    public function DeleteItemCart($id)
    {
        DB::delete("DELETE FROM giohang WHERE IDGioHang = ? ", [
            $id
        ]);
        redirect()->to('cart')->send();
    }

    public function updateCart(Request $request)
    {
        DB::update(
            'UPDATE giohang SET SoLuong = ? WHERE IDGioHang = ? ',
            [$request->SoLuong, $request->ID]
        );
        $item = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
        ON giohang.IDSanPham = sanpham.IDSanPham 
        INNER JOIN khachhang 
        ON giohang.IDKhachHang = khachhang.IDKhachHang 
        WHERE giohang.IDKhachHang = ? AND IDGioHang = ? ', [
            Session::get('user')[0]->IDKhachHang,
            $request->ID
        ]);
        $cart = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
        ON giohang.IDSanPham = sanpham.IDSanPham 
        INNER JOIN khachhang 
        ON giohang.IDKhachHang = khachhang.IDKhachHang 
        WHERE giohang.IDKhachHang = ? ', [
            Session::get('user')[0]->IDKhachHang
        ]);
        $sumCart = 0;
        $sumItem = 0;
        foreach ($cart as $key => $value) {
            $sumCart += ($value->DonGia * ((100 - $value->KhuyenMai) / 100)) * $value->SoLuong;
        }
        $sumItem = ($item[0]->DonGia * ((100 - $item[0]->KhuyenMai) / 100)) * $item[0]->SoLuong;
        return response()->json([
            'sumItem' => "". number_format($sumItem),
            'sumCart' => "".number_format($sumCart)
        ]);
    }

    /*public function UpdateInfo(Request $request)
    {
        DB::update(
            'UPDATE khachhang SET HoTen = ? , DiaChi = ? , NgaySinh = ? WHERE IDKhachHang = ?',
            $request->full__name, $request->address, $request->birthday, $request->number__phone,
            Session::get('user')[0]->IDKhachHang
        );
    }*/
}
