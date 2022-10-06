<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request) {
        if ($request->hasFile('fileUpload')) {
            $files = $request->file('fileUpload');
            // File upload location
            $location = 'image/product/';
   
            // Upload file
            $arrayImage = [];
            foreach ($files as $key => $file) {
                $filename = time() . "_" .$file->getClientOriginalName();
                $file->move(public_path($location), $filename);
                $image = (object)[];
                $image->STT = 0;
                $image->SRC = $location . $filename;
                array_push($arrayImage,$image);
            }
            
            DB::table('sanpham')->insert([
                "IDSanPham" => time(),
                "TenSanPham" => $request->TenSanPham,
                "KhuyenMai" => $request->KhuyenMai,
                "IDDongSanPham" => $request->IDDongSanPham,
                "Anh" => json_encode($arrayImage),
                "DonGia" => $request->DonGia,
                "MoTa" => $request->MoTa,
                "ChiTiet" => $request->ChiTiet,
                "TinhTrang" => 1
            ]);
            redirect()->to("product-admin")->send();
        }
            
    }
}
