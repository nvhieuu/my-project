<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

$sum = 0;
$cart = [];
if (session()->has('user')) {
    $cart = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
    ON giohang.IDSanPham = sanpham.IDSanPham 
    INNER JOIN khachhang 
    ON giohang.IDKhachHang = khachhang.IDKhachHang 
    WHERE giohang.IDKhachHang = ? ', [
        Session::get('user')[0]->IDKhachHang
    ]);
}
foreach ($cart as $key => $value) {
    $sum += ($value->DonGia * ((100 - $value->KhuyenMai) / 100)) * $value->SoLuong;
}
?>
<div class="w-full bg-red-600">
    <div class="w-11/12 mx-auto flex">
        <div class="w-1/4">
            <a href="/index">
                <img id="logo-pc" src="/image/logo/logo_1.jpg" alt="logo" class="w-30 h-12 py-3 px-1 my-3 mx-16">
            </a>
        </div>
        <div class="w-1/4 flex text-center py-3 px-1 mx-20">
            <form action="{{ route('search-product-post') }}" method="POST" class="p-1.5 mx-3 flex">
            {{ csrf_field() }}
                <input id="input-search" name="Search" type="text" placeholder="Tìm kiếm sản phẩm..."
                    class="w-72 h-8 font-normal rounded text-xs pl-3">
                <button id="btn-search" type="submit"
                    class="w-20 h-8 font-normal bg-black text-white border-solid rounded text-sm">Tìm kiếm</button>
            </form>
        </div>
        <div class="w-2/4 flex">
            <div class="w-1/2 flex items-center justify-center">
                <div class="pr-3">
                    <i class='bx bxs-cart text-5xl text-white'></i>
                </div>
                <div>
                    <a href="/cart">
                        <p class="text-white font-bold"><a href="{{ url('cart') }}">GIỎ HÀNG</a></p>
                        <p class="text-white"><span>{{count($cart)}}</span> sp
                            <span>{{ number_format($sum)}}</span> VNĐ
                        </p>
                    </a>
                </div>
            </div>
            <div class="w-1/2 flex items-center justify-center text-white">
                <div class="pr-3">
                    <i class='bx bxs-user text-5xl'></i>
                </div>
                @if (session()->has('user'))
                <div class="flex">
                    <span class="flex items-center font-bold">
                        <a href="{{ url('info-customer') }}">{{ Session::get('user')[0]->HoTen }}</a>
                        <a href="{{ url('logout') }}"><i class='bx bx-log-out-circle ml-3 text-2xl'></i></a>
                    </span>
                </div>
                @else
                <div>
                    <p class="text-white font-bold cursor-pointer" onclick="clickss()">ĐĂNG NHẬP</p>
                    <p class="text-white font-bold cursor-pointer" onclick="clicksss()">ĐĂNG KÝ</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="w-full bg-blue-900">
    <div class="w-11/12 flex mx-auto">
        <div class="w-1/4 py-2 flex text-white font-bold text-xl">
            <i class='bx bx-list-ul text-3xl flex items-center'></i>
            <span class="flex items-center">DANH MỤC SẢN PHẨM</span>
            <span class=" flex items-center"><i class='bx bx-caret-down ml-3 text-xl'></i></span>
        </div>
        <div class="w-3/4">
            <ul class="w-full text-white flex" id="menu">
                <li class="p-3  relative hover:text-blue-200 font-bold 
                text-xm"><a href="/index">TRANG CHỦ</a>
                </li>
                <li class="p-3 hover:bg-red-600 relative hover:text-blue-200 font-bold 
                text-xm"><a href="{{ url('/category/BALO') }}">BALO</a>

                    <ul class="w-60 absolute top-full left-0 z-20 sub-menu">
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOLT') }}"> Balo laptop</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALODL') }}"> Balo du lịch thể thao</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOTT') }}"> Balo thời trang</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOHS') }}"> Balo học sinh</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOMQ') }}"> Balo một quai</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOMA') }}"> Balo máy ảnh</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/BALOTE') }}"> Balo trẻ em</a></li>
                    </ul>
                </li>
                <li class="p-3 hover:bg-red-600 relative hover:text-blue-200 font-bold 
                text-xm"><a href="{{ url('/category/VALI') }}">VALI KÉO</a>
                    <ul class="w-60 absolute top-full left-0 z-20 sub-menu">
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/VALIVNC') }}"> Vali vỏ nhựa cứng</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/VALIVND') }}"> Vali kéo nhựa dẽo</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/VALIKBV') }}"> Vali kéo bằng vải</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/VALIVTE') }}"> Vali trẻ em</a></li>
                    </ul>
                </li>
                <li class="p-3 hover:bg-red-600 relative hover:text-blue-200 font-bold 
                text-xm"><a href="{{ url('/category/TUIXACH') }}">TÚI XÁCH</a>
                    <ul class="w-60 absolute top-full left-0 z-20 sub-menu">
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/TUIDLTT') }}"> Túi du lịch thể thao</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/TUIDC') }}"> Túi đeo chéo</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/TUIDMTB') }}"> Túi đựng máy tính bảng</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/TUIDMA') }}"> Túi đựng máy ảnh</a></li>
                    </ul>
                </li>
                <li class="p-3 hover:bg-red-600 relative hover:text-blue-200 font-bold 
                text-xm"><a href="{{ url('/category/CAPCL') }}">CẶP CÁC LOẠI</a>
                    <ul class="w-60 absolute top-full left-0 z-20 sub-menu">
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/CAPDLT') }}"> Cặp đựng laptop</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"> <a href="{{ url('/category/product/CAPSO') }}"> Cặp số</a></li>
                    </ul>
                </li>
                <li class="p-3 hover:bg-red-600 relative hover:text-blue-200 font-bold 
                text-xm"><a href="{{ url('/category/PHUKIEN') }}">PHỤ KIỆN</a>
                    <ul class="w-60 absolute top-full left-0 z-20 sub-menu">
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/PKAMTB') }}"> Áo mưa trùm balo</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/PKBTBV') }}"> Bao trùm vali kéo</a></li>
                        <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                        text-xm"><a href="{{ url('/category/product/PKTCS') }}"> Túi chống sốc</a></li>
                    </ul>
                </li>
                <li class="p-3 hover:bg-red-600 hover:text-blue-200 font-bold 
                text-xm"><a href="">GIẢM GIÁ THÁNG 10</a></li>
            </ul>
        </div>
    </div>
</div>