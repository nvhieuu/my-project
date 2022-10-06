@include('admin/head-admin')
@include('admin/cate-admin')

    <div class="w-full">
       
        <div class="w-8/12 mx-auto my-3"  id="myError1">

            <form action="{{ route('UpdateCustomer') }}"
                class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form1">
                
                <p class="w-full text-xl font-bold text-red-600">SỬA THÔNG TIN KHÁCH HÀNG</p>
                {{ csrf_field() }}
                
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Tên khách hàng</p>
                    <input type="text" value="{{$cus->HoTen}}" class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="Name">
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Ngày sinh</p>
                    <input type="date" value="{{$cus->NgaySinh}}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="BirthDay">    
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Địa chỉ</p>
                    <input type="text" value="{{$cus->DiaChi}}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="Address">
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Email</p>
                    <input type="text" value="{{$cus->Email}}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="Email" readonly>
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Số điện thoại</p>
                    <input type="text" value="{{$cus->SoDienThoai}}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="NumberPhone">
                </div>
                    <input type="hidden" value="{{$cus->IDKhachHang}}" name="id">
                <div class="w-full flex ">
                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p onclick="UpdateInfo(event)" class="ml-1 text-lg cursor-pointer" type="submit">
                            Sửa
                        </p>
                    </button>

            </form>
            <a href="">
                <div class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p class="ml-1 text-lg cursor-pointer">
                        Đổi mật khẩu
                    </p>
                </div>
            </a>
            <div class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p class="ml-1 text-lg cursor-pointer">
                        Xem đơn hàng
                    </p>
                </div>
        </div>
    </div>
    




</body>

</html>