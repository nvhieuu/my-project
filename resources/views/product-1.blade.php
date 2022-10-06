@include('document')
@include('head')

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-full z-40">
            <div class="w-11/12 mx-auto">
                <div class="w-full flex mb-5">
                    @include('filter')
                    <div class="w-3/4 mx-auto flex flex-wrap">
                <!-- Ô SẢN PHẨM -->
                @foreach($categoryy as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <div class="w-4/12 p-2 border-2 border-solid border-gray-200 text-center">
                    <a href="{{ url('san-pham/chi-tiet-san-pham/'.$item->IDSanPham) }}">
                        <img src="/{{ $src[0]->SRC }}" class="w-11/12 mx-auto h-72 object-cover" alt="">
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
            </div>
        </div>
        @include('Footer')
    </div>


    @include('login')
    @include('reg')
</body>

</html>