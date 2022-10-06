@include('admin/head-admin')
@include('admin/cate-admin')
<?php
use Illuminate\Support\Facades\DB;
$cate = DB::select('SELECT * FROM dongsanpham');
?>
    <div class="w-full h-screen overflow-auto">
       
        <div class="w-8/12 mx-auto my-3"  id="myError1">

            <form action="<?=route('uploadFileProduct') ?>" method="post"  enctype="multipart/form-data"
                class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form1">
                
                <p class="w-full text-xl font-bold text-red-600">THÊM SẢN PHẨM</p>
                {{ csrf_field() }}
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Tên sản phẩm</p>
                    <input type="text" value="" class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="TenSanPham">
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Loại sản phẩm</p>
                    <select type="text" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="IDDongSanPham">
                    <option>--Chọn nhóm--</option>
                    @foreach($cate as $item)
                    <option value="<?= $item->IDDongSanPham ?>">{{$item->TenDong}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Giá</p>
                    <input type="text" value="" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="DonGia">
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Khuyến mãi</p>
                    <input type="text" value="" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="KhuyenMai">
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Mô tả</p>
                    <textarea class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="MoTa"></textarea>
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">chi tiết</p>
                    <textarea type="text" value="" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="ChiTiet"></textarea>
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Ảnh</p>
                    <input type="file" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="fileUpload[]" multiple>
                </div>
                <div class="w-full flex ">
                    <button type="submit" class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p class="ml-1 text-lg cursor-pointer">
                            Thêm
                        </p>
                    </button>

            </form>
    </div>
    




</body>
<script>
    CKEDITOR.replace('MoTa')
    CKEDITOR.replace('ChiTiet')
</script>
</html>