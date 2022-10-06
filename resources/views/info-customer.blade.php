@include('document')
@include('head')

@if (session()->has('UpdateSuccess'))
<script>
    alert('Cập nhật thành công');
</script>
@php
Session::forget('UpdateSuccess')
@endphp
@endif

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-1/3 mx-auto my-3"  >

            <form action="{{ route('UpdateInfo') }}" method="get"
                class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form1">
                
                <p class="w-full text-xl font-bold text-red-600">THÔNG TIN KHÁCH HÀNG:</p>
                {{ csrf_field() }}
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Họ tên:</p>
                    <input type="text" value="{{ Session::get('user')[0]->HoTen }}" class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="NameUpdate">
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Ngày sinh:</p>
                    <input type="date" value="{{ Session::get('user')[0]->NgaySinh }}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="BirthdayUpdate">
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Địa chỉ:</p>
                    <input type="text" value="{{ Session::get('user')[0]->DiaChi }}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="AddressUpdate">
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Email:</p>
                    <input type="email" value="{{ Session::get('user')[0]->Email }}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="email" readonly>
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Số điện thoại:</p>
                    <input type="text" value="{{ Session::get('user')[0]->SoDienThoai }}" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="NumberphoneUpdate">
                </div>
                <div class="w-full flex ">
                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p onclick="UpdateInfo(event)" class="ml-1 text-lg cursor-pointer">
                            Sửa
                        </p>
                    </button>

            </form>
            <a href="/change-password">
                <div class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p class="ml-1 text-lg cursor-pointer">
                        Đổi mật khẩu
                    </p>
                </div>
            </a>
            <a href="/order">
            <div class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p class="ml-1 text-lg cursor-pointer">
                        Xem đơn hàng
                    </p>
                </div>
            </a>
        </div>
    </div>
    @include('Footer')
    </div>



    @include('login')
    @include('reg')
</body>

</html>