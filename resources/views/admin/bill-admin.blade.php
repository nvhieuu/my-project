@include('admin/head-admin')
@include('admin/cate-admin')
<?php
use Illuminate\Support\Facades\DB;

$order1 = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang inner join
chitietdonhang on donhang.IDdonHang = chitietdonhang.IDdonHang inner join 
sanpham on chitietdonhang.IDSanPham = sanpham.IDSanPham where donhang.TinhTrang = 1');

$order2 = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang inner join
chitietdonhang on donhang.IDdonHang = chitietdonhang.IDdonHang inner join 
sanpham on chitietdonhang.IDSanPham = sanpham.IDSanPham where donhang.TinhTrang = 2');

$order3 = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang inner join
chitietdonhang on donhang.IDdonHang = chitietdonhang.IDdonHang inner join 
sanpham on chitietdonhang.IDSanPham = sanpham.IDSanPham where donhang.TinhTrang = 3');

$order4 = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang inner join
chitietdonhang on donhang.IDdonHang = chitietdonhang.IDdonHang inner join 
sanpham on chitietdonhang.IDSanPham = sanpham.IDSanPham where donhang.TinhTrang = 4');
?>
<div class="w-4/5 max-h-full overflow-scroll" onscroll="onScrollMain()" id="main">
    <div class="w-11/12 mx-auto">
        <div class="w-full py-3 mt-3 mb-6 relative">
            <input type="text" class="w-full p-2 pl-9 rounded-lg border-2 border-solid border-gray-300"
                placeholder="Nhập từ khóa tìm kiếm...">
            <i class="bx bx-search absolute top-7 left-3"></i>
        </div>
        
        <p class="text-2xl font-bold mb-3" id="bill">Đơn hàng chờ duyệt</p>
        <div class="overflow-y-auto" style="max-height: 400px;">
            <table>
                <tr>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Số điện thoại</th>
                    <th>Tình trạng</th>
                    <th>Xem</th>
                    <th>Duyệt</th>
                    <th>Hủy</th>
                </tr>
                @foreach($order1 as $item)
                <tr>
                    <td>{{$item->TenNguoiNhan}} </td>
                    <td>{{$item->DiaChi}} </td>
                    <td>{{number_format($item->TongTien)}}</td>
                    <td>{{$item->SoDienThoai}} </td>
                    <td>Chờ duyệt</td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('updatesus/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('updatecan/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <p class="text-2xl font-bold mb-3 mt-20" id="bill">Đơn hàng đang giao</p>
        <div class="overflow-y-auto" style="max-height: 400px;">
            <table>
                <tr>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Số điện thoại</th>
                    <th>Tình trạng</th>
                    <th>Xem</th>
                    <th>Đã giao</th>
                    
                </tr>
                @foreach($order2 as $item)
                <tr>
                    <td>{{$item->TenNguoiNhan}} </td>
                    <td>{{$item->DiaChi}} </td>
                    <td>{{number_format($item->TongTien)}}</td>
                    <td>{{$item->SoDienThoai}} </td>
                    <td>Chờ duyệt</td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('updatesuss/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
        <p class="text-2xl font-bold mb-3  mt-20" id="bill">Đơn hàng giao thành công</p>
        <div class="overflow-y-auto" style="max-height: 400px;">
            <table>
                <tr>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Số điện thoại</th>
                    <th>Tình trạng</th>
                    <th>Xem</th>
                </tr>
                @foreach($order3 as $item)
                <tr>
                    <td>{{$item->TenNguoiNhan}} </td>
                    <td>{{$item->DiaChi}} </td>
                    <td>{{number_format($item->TongTien)}}</td>
                    <td>{{$item->SoDienThoai}} </td>
                    <td>Chờ duyệt</td>
                    <td class="text-center text-gray-400 text-lg">
                        <a href="{{ url('/'.$item->IDDonHang) }}">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <p class="text-2xl font-bold mb-3  mt-20" id="bill">Đơn hàng đã hủy</p>
        <div class="overflow-y-auto" style="max-height: 400px;">
            <table>
                <tr>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Số điện thoại</th>
                    <th>Tình trạng</th>
                    <th>Xem</th>
                </tr>
                @foreach($order4 as $item)
                <tr>
                    <td>{{$item->TenNguoiNhan}} </td>
                    <td>{{$item->DiaChi}} </td>
                    <td>{{number_format($item->TongTien)}}</td>
                    <td>{{$item->SoDienThoai}} </td>
                    <td>Chờ duyệt</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>






</html>