@include('admin/head-admin')
@include('admin/cate-admin')

<div class="w-4/5 max-h-full overflow-scroll" onscroll="onScrollMain()" id="main">
    <div class="w-11/12 mx-auto">

        <p class="text-2xl font-bold mb-3" id="bill">Chi tiết đơn hàng</p>
        <div class="overflow-y-auto" style="max-height: 400px;">
            <table>
                <tr>

                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>

                </tr>
                @foreach($order as $item)
                @php
                $src = json_decode($item->Anh);
                @endphp
                <tr>
                    <td>{{$item->TenSanPham}} </td>
                    <td><img src="{{ $src[0]->SRC }}" class="w-20 h-20 object-cover"></td>
                    <td>{{number_format($item->DonGia)}}</td>
                    <td>{{$item->SoLuong}} </td>
                    @endforeach
                    <td>{{$item->TongTien}}</td>
                </tr>
                
            </table>
        </div>
        
    </div>
</div>
</body>






</html>