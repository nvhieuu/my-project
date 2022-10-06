@include('document')
@include('head')

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-full z-40">
            <div class="w-11/12 mx-auto">
                <div class="flex pt-10">

                    <div class="w-4/12 ">
                        @php
                        $src = json_decode($product->Anh);
                        @endphp
                        <div class="w-full border border-gray-200">
                            <img src="/{{ $src[0]->SRC }}" id="imageMain" alt="">
                        </div>
                        <div class="w-full flex">
                            @foreach ($src as $image)
                            <div class="w-1/4 border border-gray-200">
                                <img onclick="onClickChangeImage(this)" class="w-full cursor-pointer" src="/{{ $image->SRC }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-5/12 px-3">
                        <div class="text-4xl border-b-2">
                            <span>{{$product->TenSanPham}}</span>
                        </div>
                        <div class="text-red-500 text-3xl px-1 my-3 bg-gray-100">
                            @if ($product->KhuyenMai == 0)
                            <span class="mx-3">{{number_format($product->DonGia)}}
                                VNĐ</span> &nbsp;&nbsp;&nbsp;
                            @else
                            <span class="mx-3">{{number_format($product->DonGia *((100 - $product->KhuyenMai)/100))}}
                                VNĐ</span> &nbsp;&nbsp;&nbsp;
                            <strike class="mx-3 text-gray-700">{{number_format($product->DonGia)}} VNĐ</strike>
                            @endif
                        </div>
                        <div class="my-2 py-2">
                            <span class="font-bold">Tình trạng:</span>
                            @if ($product->TinhTrang == 1)
                            <span class="bg-green-300 rounded-sm p-2">Còn hàng</span>
                            @else
                            <span class="bg-red-500 text-white rounded-sm p-2">Hết hàng</span>
                            @endif
                        </div>
                        <div>
                            <div class="my-3">
                                <span> {!! $product->ChiTiet !!}</span>
                            </div>
                            <form method="POST" action="{{ route('add-cart') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="IDSanPham" value="{{ $product->IDSanPham }}">
                                <div>
                                    <span class="text-xl">Số lượng:</span>
                                    <input class="bg-gray-200 text-center text-xl" type="number" value="1" min="1" max="10" name="SoLuong">
                                </div>
                                @if ($product->TinhTrang == 0)
                                <p class="my-2 text-2xl py-2 font-semibold text-red-600">
                                    Sản phẩm hiện hết hàng . Khách hàng vui lòng xem
                                    những sản phẩm khác.
                                </p>
                                @else
                                <div class="flex text-2xl py-3">
                                    <button type="button" class="w-56 h-10 bg-red-500 rounded text-white mx-1">MUA
                                        NGAY</button>
                                    <button type="submit" class="w-56 h-10 bg-red-100 rounded text-red-500 mx-1">
                                        Thêm vào giỏ</button>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="w-3/12">
                        <div class="border border-gray-200">
                            <div class="flex bg-gray-100 mb-1 rounded p-3 mb-3">
                                <div class="flex items-center">
                                    <i class='bx bxs-truck text-4xl text-red-500 px-1'></i>
                                    <p class="text-sm">Giao hàng nội thành 30 phút - 1 tiếng</p>
                                </div>
                            </div>
                            <div class="flex bg-gray-100 mb-1 rounded p-3 mb-3">
                                <div class="flex items-center">
                                    <i class='bx bx-credit-card text-4xl text-red-500 px-1'></i>
                                    <p class="text-sm">Ship COD toàn quốc</p>
                                </div>
                            </div>
                            <div class="flex bg-gray-100 mb-1 rounded p-3 mb-3">
                                <div class="flex items-center">
                                    <i class='bx bx-log-in-circle text-4xl text-red-500 px-1'></i>
                                    <p class="text-sm">Đổi hàng trong 3 ngày với k/h nội thành và 7 ngày với k/h tỉnh
                                        (còn
                                        tem mác)</p>
                                </div>
                            </div>
                            <div class="flex bg-gray-100 rounded p-3 mb-3">
                                <div class="flex items-center">
                                    <i class='bx bx-phone-call text-4xl text-red-500 px-1'></i>
                                    <p class="text-sm">Tổng đài miễn cước: 18006392</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-3/12 mx-auto">
                        <p class="text-center py-2 bg-red-500 text-2xl text-white font-normal">CHI TIẾT SẢN PHẨM</p>
                    </div>
                    <div class="my-5">
                        <span> {!! $product->MoTa !!}</span>
                    </div>
                    <div>
                        <p class="text-2xl font-normal">Thông tin chi tiết:</p>
                    </div>
                    <div class="my-5">
                        <span> {!! $product->ChiTiet !!}</span>
                    </div>
                    <div class="w-full">
                        <div class="flex">
                            <img class="w-1/2" src="/{{ $src[0]->SRC }}" alt="">

                            <img class="w-1/2" src="/{{ $src[1]->SRC }}" alt="">
                        </div>
                        <div class="flex">
                            <img class="w-1/2" src="/{{ $src[2]->SRC }}" alt="">

                            <img class="w-1/2" src="/{{ $src[3]->SRC }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-11/12 mx-auto">
            <div class="my-4 w-full border-solid border-b-4 border-yellow-500">
                <div class="w-36 text-center p-2 bg-yellow-500 font-bold text-white">
                    SẢN PHẨM LIÊN QUAN
                </div>
            </div>
        </div>
        <div class="w-11/12 mx-auto flex flex-wrap">
            @foreach($products as $data)
            <div class="w-1/4 p-2 border-2 border-solid border-gray-200 text-center">
                <img src="/{{ json_decode($data->Anh)[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
                <p class="py-1 w-11/12 mx-auto whitespace-nowrap overflow-ellipsis overflow-hidden font-bold">
                    {{$data->TenSanPham}}
                </p>
                <p class="pb-1"><span class="font-bold text-red-600">
                        @if ($data->KhuyenMai == 0)
                        <span class="mx-3">{{number_format($data->DonGia)}} VNĐ</span>
                        @else
                        <span class="mx-3">{{number_format($data->DonGia *((100 - $data->KhuyenMai)/100))}} VNĐ</span>
                        <strike class="mx-3 text-gray-700">{{number_format($data->DonGia)}} VNĐ</strike>
                        @endif
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @include('Footer')
    @include('login')
    @include('reg')
    </div>

</body>

</html>