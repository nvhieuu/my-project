<div id="showModall" class="w-full bg-gray-500 top-0 left-0 bg-opacity-50">
    <div id="reg-form" class="w-1/3 absolute z-50 top-0 top-1/2 left-1/2 transform -translate-y-1/2
    -translate-x-1/2 border-solid border-2 border-gray-600 hidden">

        <div class="w-full flex justify-center items-center bg-gray-300 relative">
            <span onclick="closeModal()" class="font-bold text-2xl cursor-pointer absolute top-3 right-3">&times;</span>
            <div class="w-full flex flex-col items-center bg-white py-5 md:py-8 px-4">
                <h3 class="mb-4 font-bold text-3xl flex items-center text-blue-500">
                    ĐĂNG KÝ
                </h3>
                <div class="W-full" id="myError">
                </div>
                <form action="{{ route('process-register-user') }}" method="POST" 
                class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form">
                {{ csrf_field() }}
                    <input type="text" placeholder="Họ tên.." class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="full__name">
                    <input type="date" placeholder="Ngày sinh.." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="birthday">
                    <input type="text" placeholder="Địa chỉ.." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="address">
                    <input type="email" placeholder="Email..." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="email">
                    <input type="text" placeholder="Số diện thoại.." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="number__phone">
                    <input type="password" placeholder="Mật khẩu.." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="password">
                    <input type="password" placeholder="Nhập lại mật khẩu.." class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="password__again">
                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1">
                        <p onclick="register(event)" class="ml-1 text-lg cursor-pointer">
                            Đăng ký
                        </p>
                    </button>
                </form>
                <p class="text-gray-700 text-sm mt-2">
                    Đã có tài khoản?
                    <a href="#" class="text-green-500 hover:text-green-600 mt-3 focus:outline-none font-bold underline">
                        Đăng nhập
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>