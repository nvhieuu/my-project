@include('admin/head-admin')
@include('admin/cate-admin')
<?php
 use Illuminate\Support\Facades\DB;
 $qq = DB::select('SELECT COUNT(TinhTrang) FROM donhang WHERE TinhTrang = 1')

?>

<div class="w-4/5 max-h-full overflow-scroll" onscroll="onScrollMain()" id="main">
    <div class="w-11/12 mx-auto">

        <div class="w-full py-3 mt-3 mb-6 relative">
            <input type="text" class="w-full p-2 pl-9 rounded-lg border-2 border-solid border-gray-300"
                placeholder="Nhập từ khóa tìm kiếm...">
            <i class="bx bx-search absolute top-7 left-3"></i>
        </div>
        <div class="w-full">
            <p class="text-3xl font-bold mb-3" id="dashboard">Tổng quan</p>
            <div class="w-full mb-4 flex">
                <div class="w-1/3 flex mr-1 bg-white p-2">
                    <div class="w-1/5 flex justify-center">
                        <span class=" flex items-center">
                            <i class='bx bxs-cart text-4xl'></i>
                        </span>
                    </div>
                    <div class="w-4/5 pl-2">
                        <div class="flex justify-start items-center flex-wrap">
                            <span class="w-full mb-2">Đơn hàng trong ngày</span>
                            <span class="text-xl">0</span>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 flex mr-1 bg-white p-2">
                    <div class="w-1/5 flex justify-center">
                        <span class=" flex items-center">
                            <i class='bx bxs-cart text-4xl'></i>
                        </span>
                    </div>
                    <div class="w-4/5 pl-2">
                        <div class="flex justify-start items-center flex-wrap">
                            <span class="w-full mb-2">Đơn hàng trong tuần</span>
                            <span class="text-xl">0</span>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 flex mr-1 bg-white p-2">
                    <div class="w-1/5 flex justify-center">
                        <span class=" flex items-center">
                            <i class='bx bxs-cart text-4xl'></i>
                        </span>
                    </div>
                    <div class="w-4/5 pl-2">
                        <div class="flex justify-start items-center flex-wrap">
                            <span class="w-full mb-2">Đơn hàng trong tháng</span>
                            <span class="text-xl">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mb-4 flex flex-wrap">
                <div class="flex w-full relative p-5 text-xl bg-white cursor-pointer">
                    <div class="flex items-center">
                        <i class='bx bxs-truck text-4xl mr-5'></i>
                        <span class="mx-2 text-blue-500 font-bold">0</span>
                        <span>Đơn hàng chờ duyệt</span>
                    </div>
                    <i class='bx bx-chevron-right text-2xl absolute top-1/3 right-5'></i>
                </div>
                <div class="flex w-full relative p-5 text-xl bg-white cursor-pointer">
                    <div class="flex items-center">
                        <i class='bx bxs-truck text-4xl mr-5'></i>
                        <span class="mx-2 text-blue-500 font-bold">0</span>
                        <span>Đơn hàng đang giao</span>
                    </div>
                    <i class='bx bx-chevron-right text-2xl absolute top-1/3 right-5'></i>
                </div>
                <div class="flex w-full relative p-5 text-xl bg-white cursor-pointer">
                    <div class="flex items-center">
                        <i class='bx bxs-truck text-4xl mr-5'></i>
                        <span class="mx-2 text-blue-500 font-bold">0</span>
                        <span>Đơn hàng đã giao</span>
                    </div>
                    <i class='bx bx-chevron-right text-2xl absolute top-1/3 right-5'></i>
                </div>
                <div class="flex w-full relative p-5 text-xl bg-white cursor-pointer">
                    <div class="flex items-center">
                        <i class='bx bxs-truck text-4xl mr-5'></i>
                        <span class="mx-2 text-blue-500 font-bold">0</span>
                        <span>Đơn hàng bị hủy</span>
                    </div>
                    <i class='bx bx-chevron-right text-2xl absolute top-1/3 right-5'></i>
                </div>
            </div>
        </div>



    </div>
</div>

</body>

</html>