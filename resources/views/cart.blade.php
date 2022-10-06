@include('document')
@include('head')

<?php
$sum = 0;
foreach ($cart as $key => $value) {
    $sum += ($value->DonGia * ((100 - $value->KhuyenMai) / 100)) * $value->SoLuong;
}
?>

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-11/12 mx-auto">
            <div class="w-full mb-10">
                <div class="w-full my-5">
                    <span class="text-3xl font-bold">GIỎ HÀNG({{count($cart)}} SẢN PHẨM)</span>
                </div>
                <div class="w-full bg-gray-200">
                    <div class="w-11/12 py-10 mx-auto ">
                        <div class="w-full flex bg-blue-500 py-2">
                            <div class="w-4/12">
                                <span class="pl-3 font-semibold text-white">Sản phẩm</span>
                            </div>
                            <div class="w-3/12">
                                <span class="font-semibold text-white">Đơn giá</span>
                            </div>
                            <div class="w-2/12">
                                <span class="font-semibold text-white">Số lượng</span>
                            </div>
                            <div class="w-3/12">
                                <span class="font-semibold text-white">Thành tiền</span>
                            </div>
                        </div>
                        @foreach ($cart as $item)
                        <div class="w-full flex py-5 bg-white">
                            <div class="w-4/12">
                                <span class="pl-3 font-medium">{{$item->TenSanPham}}</span>
                            </div>
                            <div class="w-3/12">
                                <span
                                    class="font-medium text-red-500">{{number_format($item->DonGia * ((100 - $item->KhuyenMai) / 100))}}
                                    VNĐ</span>
                            </div>
                            <div class="w-2/12">
                                <input onchange="onChangeNumberCart('{{ $item->IDGioHang }}',this)"
                                    class="font-medium text-center" type="number" value="{{ $item->SoLuong }}" min="1"
                                    max="10">
                            </div>
                            <div class="w-3/12 flex">
                                <div class="w-3/4">
                                    <span id="sumItem{{$item->IDGioHang}}"
                                        class="font-medium text-red-500 pl-2">{{number_format(($item->DonGia * ((100 - $item->KhuyenMai) / 100))*$item->SoLuong) }}
                                        VNĐ</span>
                                </div>
                                <div class="w-1/4 text-center text-gray-400 text-lg">
                                    <a href="{{ url('delete-cart/'.$item->IDGioHang) }}">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="w-full flex  py-5">
                            <div class="w-9/12">
                                <a href="{{ url('/index') }}"><span class="text-blue-500">Chọn thêm sản phẩm</span></a>
                            </div>
                            <div class="w-3/12">
                                <div>
                                    <span class="font-medium">Tổng cộng:</span>
                                    <span id="sumCart" class="font-medium text-red-500">{{ number_format($sum) }}
                                        VNĐ</span>
                                </div>
                                @if (session()->has('user'))
                                <div class="p-2 mt-3">
                                    <a href="{{ url('/pay') }}"><span
                                            class="bg-red-500 text-lg text-white font-normal p-2">TIẾN HÀNH ĐẶT
                                            HÀNG</span></a>
                                </div>
                                @else
                                <div class="m-3 flex">
                                    <p class="bg-red-500 text-lg text-white font-normal p-2 mr-3" onclick="clickss()">ĐĂNG NHẬP</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Footer')
        @include('login')
        @include('reg')
    </div>

</body>

</html>