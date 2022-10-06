@include('document')
@include('head')


<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
$cart = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
ON giohang.IDSanPham = sanpham.IDSanPham 
INNER JOIN khachhang 
ON giohang.IDKhachHang = khachhang.IDKhachHang 
WHERE giohang.IDKhachHang = ? ', [
    Session::get('user')[0]->IDKhachHang
]);

$sum = 0;
foreach ($cart as $key => $value) {
    $sum += ($value->DonGia * ((100 - $value->KhuyenMai) / 100)) * $value->SoLuong;
}
?>

<body>
    <div class="w-full">
        @include('Header')
        <form action="{{ route('info-pay')}}" method="POST" class="w-full z-40">
            <div class="w-11/12 mx-auto">
                <div class="w-full flex my-5">
                    <div class="w-1/3">
                        <h2 class="font-medium text-xl text-center m-5"><span
                                class="text-white rounded-3xl bg-red-500 px-2">
                                1</span> Thông tin người nhận</h2>
                        <div class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Họ tên người nhận" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="full_name"
                                value="{{ Session::get('user')[0]->HoTen }}">
                            <input type="text" placeholder="Số diện thoại nhận hàng" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="number_phone"
                                value="{{ Session::get('user')[0]->SoDienThoai }}">
                            <input type="text" placeholder="Số nhà" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="sonha">
                            <input type="text" placeholder="Tỉnh/Thành phố" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="tinh">
                            <input type="text" placeholder="Quận/Huyện" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="huyen">
                            <input type="text" placeholder="Phường/xã" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="phuong">
                            <input type="text" placeholder="Ghi chú" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="ghichu">
                        </div>
                    </div>
                    <div class="w-1/3 border-r-2 border-l-2">
                        <h2 class="font-medium text-xl text-center m-5"><span
                                class="text-white rounded-3xl bg-red-500 px-2">
                                2</span> Phương thức thanh toán</h2>
                        <input class="ml-8 mr-1" type="radio"><span class="text-lg">Thanh toán tiền mặt khi nhận hàng
                            (COD)</span>
                    </div>

                    <div class="w-1/3 ml-3">
                        <h2 class="font-medium text-xl text-center m-5"><span
                                class="text-white rounded-3xl bg-red-500 px-2">
                                3</span> Thông tin giỏ hàng</h2>
                        <div class="w-full flex border-b-2 font-medium">
                            <div class="w-2/4 ml-3">Tên sản phẩm</div>
                            <div class="w-1/4 text-center">Số lượng</div>
                            <div class="w-1/4 pl-8">Giá</div>
                        </div>
                        @foreach ($cart as $item)
                        <div class="w-full flex">
                            <div class="w-2/4 ml-3 text-left">{{$item->TenSanPham}}</div>
                            <div class="w-1/4 text-center">{{$item->SoLuong}}</div>
                            <div class="w-1/4 text-right">
                                {{number_format($item->DonGia * ((100 - $item->KhuyenMai) / 100)*$item->SoLuong)}} VNĐ
                            </div>
                        </div>
                        @endforeach
                        <div class="w-full flex font-medium py-3">
                            <span class="w-3/4 ml-3">Tạm tính</span>
                            <span class="w-1/4 text-right">{{ number_format($sum) }} VNĐ</span>
                        </div>

                        <div class="w-full flex border-t-2 py-3">
                            <span class="w-3/4 ml-3">Phí vận chuyển</span>
                            <span class="w-1/4 text-right">0 ₫</span>
                        </div>
                        <div class="w-full flex border-t-2 font-medium py-3">
                            <span class="w-3/4 ml-3">Tổng cộng</span>
                            <span class="w-1/4 text-right">{{ number_format($sum) }} VNĐ</span>
                        </div>
                        <div class="w-full border-t-2 py-3">




                            <div class="w-full flex mt-10">
                                <div class="w-2/4">
                                    <button class="bg-red-600 px-4 font-bold py-1 
                         text-white text-center">
                                        Tiếp tục mua hàng
                                    </button>
                                </div>
                                <div class="w-2/4 ml-10">
                                    <button type="submit" class="bg-red-600 px-4 font-bold py-1 
                         text-white text-center">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>
</form>

    @include('Footer')
    </div>


    @include('login')
    @include('reg')
</body>

</html>