@include('document')
@include('head')


<?php


?>

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-full z-40">
            <div class="w-11/12 mx-auto">
                <div class="w-full  my-5">


                    <div class="w-full my-5">
                        <span class="text-3xl font-bold">ĐƠN HÀNG({{count($order)}} SẢN PHẨM)</span>
                    </div>
                    <div class="flex">
                        @foreach($info as $item)

                        <div class="w-3/12">

                            <div class=" bg-red-500">
                                <h2 class="font-medium text-xl text-center m-5 text-white">
                                    <span class="text-white rounded-3xl bg-blue-500 px-2">1</span>
                                    Thông tin người nhận
                                </h2>
                                <div class="px-3 flex flex-col w-full gap-3 ">
                                    <h3 class="pl-3 font-semibold text-white">Tên:
                                        <span class="px-4 py-2">{{$item->TenNguoiNhan}}</span>
                                    </h3>
                                    <h3 class="pl-3 font-semibold text-white">Địa chỉ:
                                        <span class="px-4 py-2">{{$item->DiaChi}}</span>
                                    </h3>
                                    <h3 class="pl-3 font-semibold text-white">
                                        Số điện thoại:
                                        <span class="px-4 py-2">{{$item->SoDienThoai}}</span>
                                    </h3>
                                    <h3 class="pl-3 font-semibold text-white">
                                        <span class="px-4 py-2">Thanh toán khi nhận hàng (COD)</span>
                                    </h3>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        
                        <div class="w-9/12  bg-gray-200">
                        @foreach($info as $item)

                            <div class="w-full">
                                <h2 class="font-medium text-xl text-center m-5"><span
                                        class="text-white rounded-3xl bg-red-500 px-2">
                                        2</span> Thông tin sản phẩm</h2>
                                <div class="w-11/12 mx-auto ">
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
                                    @foreach ($order as $itemm)
                                    <div class="w-full">
                                    <div class="w-full flex py-5 bg-white">
                                        <div class="w-4/12">
                                            <span class="pl-3 font-medium">{{$itemm->TenSanPham}}</span>
                                        </div>
                                        <div class="w-3/12">
                                            <span
                                                class="font-medium text-red-500">{{number_format($itemm->DonGia * ((100 - $itemm->KhuyenMai) / 100))}}
                                                VNĐ</span>
                                        </div>
                                        <div class="w-2/12">
                                            <span class="font-medium text-center">{{ $itemm->SoLuong }}</span>
                                        </div>
                                        <div class="w-3/12 flex">
                                            <div class="w-full">
                                                <span
                                                    class="font-medium text-red-500 pl-2">{{number_format($itemm->DonGia * ((100 - $itemm->KhuyenMai) / 100) * $itemm->SoLuong) }}
                                                    VNĐ</span>
                                            </div>

                                        </div>

                                    </div>
                                    


                                    <div class="float-right m-4">
                                        <span class="font-medium">Tình trạng:</span>
                                        @if($itemm->TinhTrangDonHang == 1)
                                        <span class="font-medium text-red-500">Đang duyệt</span>
                                        <a href="{{ route('cancel') }}">
                                            <span class="font-medium bg-red-500 text-white">Hủy đơn hàng</span>
                                        </a>
                                        @elseif($itemm->TinhTrangDonHang == 2)
                                        <span class="font-medium text-red-500">Đang giao</span>
                                        @elseif($itemm->TinhTrangDonHang == 3)
                                        <span class="font-medium text-red-500">Giao hàng thành công</span>
                                        @elseif($itemm->TinhTrangDonHang == 4)
                                        <span class="font-medium text-red-500">Đã hủy</span>
                                        @endif
                                    </div>
                                    </div>
                                    @endforeach
                                    <div class="float-right m-4">
                                        <span class="font-medium">Tổng cộng:</span>
                                        <span class="font-medium text-red-500">{{number_format($itemm->TongTien) }}
                                            VNĐ</span>
                                    </div>

                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>

                </div>

            </div>
        </div>
        @include('Footer')
    </div>


    @include('login')
    @include('reg')
</body>

</html>