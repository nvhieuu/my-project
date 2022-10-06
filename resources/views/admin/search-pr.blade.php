@include('admin/head-admin')
@include('admin/cate-admin')

<div class="w-4/5 max-h-full overflow-scroll" onscroll="onScrollMain()" id="main">
    <div class="w-11/12 mx-auto">
        <div class="w-full py-3 mt-3 mb-6 relative">
            <input type="text" class="w-full p-2 pl-9 rounded-lg border-2 border-solid border-gray-300"
                placeholder="Nhập từ khóa tìm kiếm...">
            <i class="bx bx-search absolute top-7 left-3"></i>
        </div>
        <div class="w-full mb-5">
            <p class="text-3xl font-bold mb-3" id="product">Sản phẩm</p>
            <div class="flex w-full p-3">
                
                <div class="w-3/12 flex">
                    <span class="mx-4 p-3 m-2 font-semibold w-1/3">Lọc</span>
                    <select name="" id="" class="p-3 m-2 w-2/3">
                        <option value="">Tất cả</option>
                    </select>
                </div>
                <div class="w-5/12 flex">
                    <form action="{{ route('filter') }}" method="get" class="w-full flex">
                    <input class="p-3 m-2 w-56 w-2/3" placeholder="Nhập tên sản phẩm" name="search">
                    <button class="mx-4 p-3 m-2 font-semibold w-1/3" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="overflow-y-auto" style="max-height: 400px;">
                <table>
                    <tr>
                    <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Loại</th>
                        <th>Giá</th>
                        <th>Tình trạng</th>
                        <th>Khuyến mãi</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                        
                    </tr>
                    @foreach($pr as $item)
                    @php
                    $src = json_decode($item->Anh);
                    @endphp
                    <tr>
                    <td><img src="{{ $src[0]->SRC }}" class="w-20 h-20 object-cover"></td>
                        <td>{{$item->TenSanPham}} </td>
                        <td>{{$item->IDDongSanPham}} </td>
                        <td>{{$item->DonGia}}<u>đ</u></td>
                        @if($item->TinhTrang == 1)
                        <td>Còn hàng</td>
                        @elseif($item->TinhTrang == 0)
                        <td>Hết hàng</td>
                        @endif
                        <th>{{$item->KhuyenMai}} %</th>
                        <td class="text-center text-gray-400 text-lg">
                            <a href="{{ url('delete-product/'.$item->IDSanPham) }}">
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                        <td class="text-center text-gray-400 text-lg">
                            <a href="{{ url('product/'.$item->IDSanPham) }}">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="w-8/12 flex m-auto my-20 items-center">
                <div class="w-full m-auto">
                    <a href="/add-product">
                    <button class="bg-gray-500 text-xl text-white font-normal py-3 px-10">
                        Thêm</button></a>
            </div>
        </div>