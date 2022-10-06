@include('document')
@include('head')
<?php


?>

<body>
    <div class="w-full">
        @include('Header')
        <div class="w-1/3 mx-auto my-3">

            <form action="{{ route('ChangePassword') }}" method="get" 
            class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form">

                <p class="w-full text-xl font-bold text-red-600">ĐỔI MẬT KHẨU:</p>

                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Mật khẩu cũ:</p>
                    <input type="password" class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="OldPassword">
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Mật khẩu mới:</p>
                    <input type="password" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="NewPassword">
                </div>
                <div class="w-full flex">
                    <p class="w-1/3 font-semibold m-auto text-base">Xác nhận:</p>
                    <input type="password" class="px-4 py-2 w-full rounded border 
                    border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="ConfirmNewPassword">
                </div>
                <div class="w-full flex ">
                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3" type="submit">
                        <p class="ml-1 text-lg cursor-pointer">
                            Đổi mật khẩu
                        </p>
                    </button>
                </div>
            </form>


        </div>
        @include('Footer')
    </div>



    @include('login')
    @include('reg')
</body>

</html>