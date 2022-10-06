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
            <p class="text-3xl font-bold mb-3" id="customer">Khách hàng</p>
            <div class="flex w-full p-3">
                
                <div class="w-7/12 flex">
                    <form action="{{ route('find') }}" method="get" class="w-full flex">
                    <input class="p-3 m-2 w-56 w-2/3" placeholder="Nhập tên khách hàng" name="search">
                    <button class="mx-4 p-3 m-2 font-semibold w-1/3" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <?php
                        use Illuminate\Support\Facades\DB; 
                        $user =  DB::table('khachhang')
                            ->get() ?>
            <div class="overflow-y-auto" style="max-height: 400px;">
                <table>
                    <tr>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    @foreach($user as $item)
                    <tr>
                        <td>{{$item->HoTen}} </td>
                        <td>{{$item->DiaChi}} </td>
                        <td>{{$item->NgaySinh}}</td>
                        <td>{{$item->SoDienThoai}} </td>
                        <td>{{$item->Email}} </td>
                        <td class="text-center text-gray-400 text-lg">
                            <a href="{{ url('delete-customer/'.$item->IDKhachHang) }}">
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                        <td class="text-center text-gray-400 text-lg">
                            <a href="{{ url('Customer/'.$item->IDKhachHang) }}">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </body>






    </html>