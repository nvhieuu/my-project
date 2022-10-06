<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerAdController extends Controller
{
    public function DeleteCustomer($id)
    {
        DB::delete("DELETE FROM khachhang WHERE IDKhachHang = ? ", [
            $id
        ]);
        redirect()->to('customer-admin')->send();
    }

    public function Customer($id)
    {
        $cus = DB::select(
            'SELECT * FROM khachhang WHERE IDKhachHang = ?',[
            $id
            ]);
            return view('admin/update-customer')
            ->with('cus',$cus[0]);
    }

    public function UpdateCustomer(Request $request)
    {
        DB::update(
            'UPDATE khachhang SET HoTen = ? , NgaySinh = ? , DiaChi = ? , SoDienThoai = ? WHERE IDKhachHang = ?',[
            $request->Name, $request->BirthDay, $request->Address, $request->NumberPhone,
            $request->id,
            ]);
            redirect()->to('customer-admin')->send();
    }

    public function find(Request $request)
    {
        $cus = DB::table('khachhang')
        ->whereRaw('khachhang.HoTen LIKE "%'.$request->search . '%"')
        ->get();
        return view('admin/search-cus')
        ->with('cus',$cus);
    }

    
    /*Route::get('Find', [CustomerAdController::class, 'Find']);*/
}