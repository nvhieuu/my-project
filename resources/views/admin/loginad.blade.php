@include('admin/head-admin')


    <div class="w-full">
       
        <div class="w-8/12 mx-auto my-3"  id="myError1">

            <form action="{{ route('process-login-ad') }}" method="post"
                class="px-3 flex flex-col justify-center items-center w-full gap-3" id="form1">
                
                <p class="w-full text-xl font-bold text-red-600">ĐĂNH NHẬP</p>
                {{ csrf_field() }}
                
             
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Email</p>
                    <input type="text" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="Email" >
                </div>
                <div class="w-full">
                    <p class="font-semibold m-auto text-base">Mật khẩu</p>
                    <input type="password" class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500
                    placeholder-opacity-50 focus:outline-none focus:border-blue-500" name="password">
                </div>
                    
                <div class="w-full flex ">
                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white 
                    focus:outline-none focus:ring rounded px-3 py-1 m-3">
                    <p  class="ml-1 text-lg cursor-pointer" type="submit">
                            Đăng Nhập
                        </p>
                    </button>

            </form>
            
        </div>
    </div>
    




</body>

</html>