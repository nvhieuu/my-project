<?php

use Illuminate\Support\Facades\Session;

?>
@include('document')
@include('head')
@if (session()->has('resgiterSuccess'))
<script>
    alert('Đăng kí thành công');
</script>
@php
Session::forget('resgiterSuccess')
@endphp
@endif

@if (session()->has('ChangePasswordSuccess'))
<script>
    alert('Đổi mật khẩu thành công, vui lòng đăng nhập lại');
</script>
@php
Session::forget('ChangePasswordSuccess')
@endphp
@endif

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-full z-40">
            <div class="w-11/12 mx-auto">
                <div class="w-full flex mb-5">
                    @include('category')
                    <div class="w-3/4" style="height:450px;">
                        <img src="/image/banner/bannerIndex.jpg" class="w-11/12 mx-auto" style="height:450px;" alt="">
                    </div>
                </div>
            </div>

            <div class="w-11/12 mx-auto">
                <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                    <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                        BALO
                    </div>
                </div>
            </div>
            <div class="w-11/12 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($balo as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="san-pham/chi-tiet-san-pham/{{$item->IDSanPham}}">
                        <img src="{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                        <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                            {{$item->TenSanPham}}
                        </p>
                        <p class="pb-1"><span class="font-bold text-red-600">
                                @if ($item->KhuyenMai == 0)
                                <span class="mx-3">{{number_format($item->DonGia)}} VNĐ</span>
                                @else
                                <span class="mx-3">{{number_format($item->DonGia *((100 - $item->KhuyenMai)/100))}} VNĐ</span>
                                <strike class="mx-3 text-gray-700">{{number_format($item->DonGia)}} VNĐ</strike>
                                @endif


                        </p>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="w-11/12 mx-auto">
                <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                    <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                        VALI KÉO
                    </div>
                </div>
            </div>
            <div class="w-11/12 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($vali as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="san-pham/chi-tiet-san-pham/{{$item->IDSanPham}}">
                        <img src="{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                        <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                            {{$item->TenSanPham}}
                        </p>
                        <p class="pb-1"><span class="font-bold text-red-600">
                                @if ($item->KhuyenMai == 0)
                                <span class="mx-3">{{number_format($item->DonGia)}} VNĐ</span>
                                @else
                                <span class="mx-3">{{number_format($item->DonGia *((100 - $item->KhuyenMai)/100))}} VNĐ</span>
                                <strike class="mx-3 text-gray-700">{{number_format($item->DonGia)}} VNĐ</strike>
                                @endif


                        </p>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="w-11/12 mx-auto">
                <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                    <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                        TÚI XÁCH
                    </div>
                </div>
            </div>
            <div class="w-11/12 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($tuixach as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="san-pham/chi-tiet-san-pham/{{$item->IDSanPham}}">
                        <img src="{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                        <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                            {{$item->TenSanPham}}
                        </p>
                        <p class="pb-1"><span class="font-bold text-red-600">
                                @if ($item->KhuyenMai == 0)
                                <span class="mx-3">{{number_format($item->DonGia)}} VNĐ</span>
                                @else
                                <span class="mx-3">{{number_format($item->DonGia *((100 - $item->KhuyenMai)/100))}} VNĐ</span>
                                <strike class="mx-3 text-gray-700">{{number_format($item->DonGia)}} VNĐ</strike>
                                @endif


                        </p>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="w-11/12 mx-auto">
                <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                    <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                        CẶP
                    </div>
                </div>
            </div>
            <div class="w-11/12 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($capcl as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="san-pham/chi-tiet-san-pham/{{$item->IDSanPham}}">
                        <img src="{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                        <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                            {{$item->TenSanPham}}
                        </p>
                        <p class="pb-1"><span class="font-bold text-red-600">
                                @if ($item->KhuyenMai == 0)
                                <span class="mx-3">{{number_format($item->DonGia)}} VNĐ</span>
                                @else
                                <span class="mx-3">{{number_format($item->DonGia *((100 - $item->KhuyenMai)/100))}} VNĐ</span>
                                <strike class="mx-3 text-gray-700">{{number_format($item->DonGia)}} VNĐ</strike>
                                @endif


                        </p>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="w-11/12 mx-auto">
                <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                    <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                        PHỤ KIỆN
                    </div>
                </div>
            </div>
            <div class="w-11/12 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($phukien as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="san-pham/chi-tiet-san-pham/{{$item->IDSanPham}}">
                        <img src="{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                        <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                            {{$item->TenSanPham}}
                        </p>
                        <p class="pb-1"><span class="font-bold text-red-600">
                                @if ($item->KhuyenMai == 0)
                                <span class="mx-3">{{number_format($item->DonGia)}} VNĐ</span>
                                @else
                                <span class="mx-3">{{number_format($item->DonGia *((100 - $item->KhuyenMai)/100))}} VNĐ</span>
                                <strike class="mx-3 text-gray-700">{{number_format($item->DonGia)}} VNĐ</strike>
                                @endif


                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @include('Footer')
    </div>


    @include('login')
    @include('reg')
</body>

</html>