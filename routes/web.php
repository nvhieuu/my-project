<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Psy\Command\WhereamiCommand;
use SebastianBergmann\Environment\Console;


Route::get('san-pham/chi-tiet-san-pham/{id}', function ($id) {
    $product = DB::table('sanpham')
        ->where('sanpham.IDSanPham', '=', $id)
        ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    $products = DB::table('sanpham')
        ->take(4)->skip(0)
        ->where('nhomsanpham.IDNhomSanPham', '=', $product[0]->IDNhomSanPham)
        ->where('sanpham.IDSanPham', '!=', $id)
        ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    return view('detail-product')
        ->with('product', $product[0])
        ->with('products',$products);
});

Route::get('/index', function () {
    $balo = DB::table('sanpham')
        ->take(4)->skip(0)
        ->where('nhomsanpham.IDNhomSanPham', '=', 'BALO')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    $vali = DB::table('sanpham')
        ->where('nhomsanpham.IDNhomSanPham', '=', 'VALI')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    $tuixach = DB::table('sanpham')
        ->where('nhomsanpham.IDNhomSanPham', '=', 'TUIXACH')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    $capcl = DB::table('sanpham')
        ->where('nhomsanpham.IDNhomSanPham', '=', 'CAPCL')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    $phukien = DB::table('sanpham')
        ->where('nhomsanpham.IDNhomSanPham', '=', 'PHUKIEN')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    return view('index')
        ->with('capcl', $capcl)
        ->with('tuixach', $tuixach)
        ->with('phukien', $phukien)
        ->with('balo', $balo)
        ->with('vali', $vali);
});

Route::get("/all-product", function (Request $request) {
    if (empty($request->priceTo) && empty($request->priceFrom)) {
    $allproduct = DB::table('sanpham')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    }
    else
    $allproduct = DB::table('sanpham')
    ->whereRaw("ROUND((((100 - KhuyenMai) / 100)*DonGia))  >= 
    '$request->priceFrom' AND ROUND( (((100 - KhuyenMai) / 100)*DonGia) )
     <= '$request->priceTo'")
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();

    return view('all-product')->with('slug','/all-product')
        ->with('allproduct', $allproduct);
});

Route::post('search-product-post',function(Request $request) {
    redirect()->to('search-product/'.$request->Search)->send();
})->name('search-product-post');

Route::get("/search-product/{search}", function ($search, Request $request) {
    if (empty($request->priceTo) && empty($request->priceFrom)) {
    $allproduct = DB::table('sanpham')
        ->whereRaw('sanpham.TenSanPham LIKE "%'.$search . '%"')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    }
    else
    $allproduct = DB::table('sanpham')
    ->whereRaw("ROUND((((100 - KhuyenMai) / 100)*DonGia))  >= 
    '$request->priceFrom' AND ROUND( (((100 - KhuyenMai) / 100)*DonGia) )
     <= '$request->priceTo'")
        ->whereRaw('sanpham.TenSanPham LIKE "%'.$search . '%"')
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    return view('all-product')->with('slug',"/search-product/$search")
        ->with('allproduct', $allproduct);
    
});

Route::get('saveJson/{id}', function ($id) {
    $array = array();
    $array[0] = (object)[
        "STT" => 1,
        "SRC" => "image/product/BALOLT01-img-1.jpg"
    ];
    $array[1] = (object)[
        "STT" => 2,
        "SRC" => "image/product/BALOLT01-img-2.jpg"
    ];
    $array[2] = (object)[
        "STT" => 3,
        "SRC" => "image/product/BALOLT01-img-3.jpg"
    ];
    $array[3] = (object)[
        "STT" => 4,
        "SRC" => "image/product/BALOLT01-img-4.jpg"
    ];
    DB::update(
        'UPDATE sanpham SET Anh = ? WHERE IDSanPham = ? ',
        [json_encode($array), $id]
    );
});

Route::get("/cart", function () {
    return view('cart');
});

Route::get("/category/{id}", function ($id, Request $request) {
    if (empty($request->priceTo) && empty($request->priceFrom)) { 
        $category = DB::table('sanpham')
        ->where('nhomsanpham.IDNhomSanPham', '=', $id)
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    }
    else 
    $category = DB::table('sanpham')
        ->whereRaw("nhomsanpham.IDNhomSanPham =  '$id' AND ROUND((((100 - KhuyenMai) / 100)*DonGia))  >= 
        '$request->priceFrom' AND ROUND( (((100 - KhuyenMai) / 100)*DonGia) )
         <= '$request->priceTo'")
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();

    return view('product')->with("slug","/category/$id/")
        ->with('category', $category);
});

Route::get("/category/product/{id}", function ($id, Request $request) {
    if (empty($request->priceTo) && empty($request->priceFrom)) { 
    $categoryy = DB::table('sanpham')
        ->where('sanpham.IDDongSanPham', '=', $id)
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    }
    else
    $categoryy = DB::table('sanpham')
    ->whereRaw("sanpham.IDDongSanPham =  '$id' AND ROUND((((100 - KhuyenMai) / 100)*DonGia))  >= 
        '$request->priceFrom' AND ROUND( (((100 - KhuyenMai) / 100)*DonGia) )
         <= '$request->priceTo'")
    ->where('sanpham.IDDongSanPham', '=', $id)
    ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    return view('product-1')->with("slug","/category/product/$id")
        ->with('categoryy', $categoryy);
});

/*Route::get("filter", function ($id, request $requestt) {
    if($requestt->price=1){
    $categoryy = DB::table('sanpham')
        ->where('sanpham.IDDongSanPham', '=', $id and 'sanpham.GiaSanPham', '<', 1000000)
      ->join('dongsanpham', 'sanpham.IDDongSanPham', 'dongsanpham.IDDongSanPham')
        ->join('nhomsanpham', 'dongsanpham.IDNhomSanPham', 'nhomsanpham.IDNhomSanPham')
        ->get();
    return view('product-1')
        ->with('categoryy', $categoryy);
    }
})->name('filter');*/


Route::post('/add-cart', [CartController::class, 'AddCart'])
    ->name('add-cart');

Route::post('process-register-user', function (Request $request) {
    $user = DB::select('SELECT count(*) FROM khachhang');
    $id = "KH10" . (count($user) + 1);
    DB::insert('INSERT INTO khachhang(IDKhachHang, HoTen, DiaChi, NgaySinh, SoDienThoai, Email, MatKhau) 
    VALUES (?,?,?,?,?,?,?)', [
        $id, $request->full__name, $request->address, $request->birthday, $request->number__phone,
        $request->email, md5($request->password__again)
    ]);
    redirect()->to('index')->send();
    Session::put('resgiterSuccess', "rc");
})->name('process-register-user');

Route::get('UpdateInfo', function (Request $request){
    DB::update(
        'UPDATE khachhang SET HoTen = ? , NgaySinh = ? , DiaChi = ? , SoDienThoai = ? WHERE IDKhachHang = ?',[
        $request->NameUpdate, $request->BirthdayUpdate, $request->AddressUpdate, $request->NumberphoneUpdate,
        Session::get('user')[0]->IDKhachHang
        ]);
        Session::put('UpdateSuccess', "us");
        $user = DB::select('SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ? ', [
            Session::get('user')[0]->Email,
            Session::pull('user')[0]->MatKhau
        ]);
        if (count($user) > 0) {
            Session::put('user', $user);
            return redirect()->to('info-customer')->send();
            
        }
})->name('UpdateInfo');

Route::get("/change-password", function(){
    return view('change-password');
});

Route::get('ChangePassword', function (Request $request){
    if( md5($request->OldPassword) == Session::get('user')[0]->MatKhau){
        if($request->NewPassword == $request->ConfirmNewPassword){
            DB::update(
                'UPDATE khachhang SET MatKhau = ? WHERE IDKhachHang = ?',[
                    md5($request->NewPassword),
                Session::get('user')[0]->IDKhachHang
                ]);
                Session::put('ChangePasswordSuccess', "cps");
        }
    };
    Session::forget('user');
    redirect()->to('index')->send();
})->name('ChangePassword');

Route::get("/info-customer", function(){
    return view('info-customer');
});

Route::post('process-valid-register', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'full__name' => array(
            'required',
            'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
        ),
        'address' => array(
            'required',
            
        ),
        'email' => array(
            'required',
            'email',
            'unique:khachhang,Email',
        ),
        'number__phone' => 'required|unique:khachhang,SoDienThoai',
        'password' => 'required|same:password__again',
    ], $messages = [
        'full__name.required' => 'Họ tên không được để trống!',
        'full__name.regex' => 'Họ tên không đúng định dạng!',
        'address.required' => 'Địa chỉ không được để trống!',
        'email.required' => 'Email không được để trống!',
        'email.email' => 'Địa chỉ không đúng định dạng!',
        'email.unique' =>'Địa chỉ đã tồn tại trong hệ thống!',
        'number__phone.required' => 'Số điện thoại không được để trống!',
        'number__phone.unique' => 'Số điện thoại đã tồn tại trong hệ thống!',
        'password.requied' => 'Mật khẩu không được để trống!',
        'password.same' => 'Xác nhận mật khẩu không đúng!',
    ]);

    if ($validator->fails()) {
        return response()->json([
            "mystate" => "error",
            'error' => $validator->errors()->all()
        ]);
    } else {
        return response()->json([
            "mystate" => "success"
        ]);
    }
})->name('process-valid-register');

/*Route::post('process-valid-updateInfo', function (Request $request) {

    $validator1 = Validator::make($request->all(), [
        'NameUpdate' => array(
            'required',
            'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
        ),
        'AddressUpdate' => array(
            'required',
            'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
        ),
        'NumberphoneUpdate' => 'required|unique:khachhang,SoDienThoai'.Session::get('user')[0]->SoDienThoai,
    ], $messages1 = [
        'NameUpdate.required' => 'Họ tên không được để trống!',
        'NameUpdate.regex' => 'Họ tên không đúng định dạng!',
        'AddressUpdate.required' => 'Địa chỉ không được để trống!',
        'AddressUpdate.regex' => 'Địa chỉ không đúng định dạng!',
        'NumberphoneUpdate.required' => 'Số điện thoại không được để trống!',
        'NumberphoneUpdate.unique' => 'Số điện thoại đã tồn tại trong hệ thống!',
    ]);

    if ($validator1->fails()) {
        return response()->json([
            "mystate" => "error",
            'error' => $validator1->errors()->all()
        ]);
    } else {
        return response()->json([
            "mystate" => "success"
        ]);
    }
})->name('process-valid-updateInfo');*/

Route::post('process-register-user', function (Request $request) {
    $user = DB::select('SELECT * FROM khachhang');
    $id = "KH10" . (count($user) + 1);
    DB::insert('INSERT INTO khachhang(IDKhachHang, HoTen, DiaChi, NgaySinh, SoDienThoai, Email, MatKhau) 
    VALUES (?,?,?,?,?,?,?)', [
        $id, $request->full__name, $request->address, $request->birthday, $request->number__phone,
        $request->email, md5($request->password__again)
    ]);
    redirect()->to('index')->send();
    Session::put('resgiterSuccess', "rc");
})->name('process-register-user');

Route::post('process-login-user', function (Request $request) {
    $user = DB::select('SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ? ', [
        $request->emailOrPhone,
        md5($request->password)
    ]);
    if (count($user) > 0) {
        Session::put('user', $user);
        
        return redirect()->to('index')->send();
    }
})->name('process-login-user');


Route::post('process-login-ad', function (Request $request) {
    $ad = DB::select('SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ? AND LoaiTaiKhoan = 1', [
        $request->Email,
        md5($request->password)
    ]);
    if (count($ad) > 0) {
        Session::put('ad', $ad);
        return redirect()->to('admin')->send();
    }
})->name('process-login-ad');


Route::post('process-valid-login', function (Request $request) {
    $user = DB::select('SELECT * FROM khachhang WHERE Email = ? AND MatKhau = ? ', [
        $request->emailOrPhone,
        md5($request->password)
    ]);
    if (count($user) == 0) {
        return response()->json([
            'mystate' => 'error'
        ]);
    } else {
        return response()->json([
            'mystate' => 'success'
        ]);
    }
})->name('process-valid-login');

Route::get('logout', function () {
    Session::forget('user');
    redirect()->to('index')->send();
});

Route::get('cart', function () {
    if (session()->has('user')) {
        $cart = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
        ON giohang.IDSanPham = sanpham.IDSanPham 
        INNER JOIN khachhang 
        ON giohang.IDKhachHang = khachhang.IDKhachHang 
        WHERE giohang.IDKhachHang = ? ', [
            Session::get('user')[0]->IDKhachHang
        ]);
        return view('cart')->with('cart', $cart);
    } else {
        return view('cart')->with('cart', []);
    }
});

Route::get('delete-cart/{id}', [CartController::class, 'DeleteItemCart']);

Route::get('update-cart', [CartController::class, 'updateCart']);

Route::get("pay", function () {
    $cart1 = DB::select('SELECT * FROM giohang INNER JOIN sanpham 
        ON giohang.IDSanPham = sanpham.IDSanPham 
        INNER JOIN khachhang 
        ON giohang.IDKhachHang = khachhang.IDKhachHang 
        WHERE giohang.IDKhachHang = ? ', [
            Session::get('user')[0]->IDKhachHang
        ]);
        return view('pay')->with('pay', $cart1);
});

Route::get("/admin", function () {
    if(Session::has('ad'))
    return view('admin/admin');
    else
    return view('admin/loginad');
});

Route::get("/customer-admin", function () {
    return view('admin/customer-admin');
});

Route::get("/update-customer", function () {
    return view('admin/update-customer');
});

Route::get("/login-ad", function () {
    return view('admin/loginad');
});

Route::get("/product-admin", function () {
    return view('admin/product-admin');
});

Route::get("/bill-admin", function () {
    return view('admin/bill-admin');
});

Route::get("/order", function () {
    return view('order');
});

Route::get("/add-product", function () {
    return view('admin/add-product');
});

Route::post('info-pay', function (Request $request) {
    
    $id = time();
    $cartt = DB::select('SELECT * FROM giohang WHERE IDKhachHang = ?',[Session::get('user')[0]->IDKhachHang]);
    $cart = DB::select('SELECT * FROM giohang INNER JOIN sanpham ON giohang.IDSanPham = sanpham.IDSanPham INNER JOIN 
    khachhang ON giohang.IDKhachHang = khachhang.IDKhachHang WHERE giohang.IDKhachHang = ? ', [
    Session::get('user')[0]->IDKhachHang]);
    $sum = 0;
    foreach ($cart as $key => $value) {
    $sum += ($value->DonGia * ((100 - $value->KhuyenMai) / 100)) * $value->SoLuong;
    }
    $address = $request->sonha." ".$request->phuong." ".$request->huyen." ".$request->tinh;
    DB::insert('INSERT INTO donhang(IDDonHang, IDKhachHang, TenNguoiNhan, DiaChi, TongTien, SoDienThoai, TinhTrang) 
    VALUES (?,?,?,?,?,?,?)', [
        $id, Session::get('user')[0]->IDKhachHang, $request->full_name, $address, $sum,$request->number_phone, '1'
    ]);
    $idd = time();
    foreach ($cartt as $key => $value)
    {
    DB::insert('INSERT INTO chitietdonhang(IDChiTietDonHang, IDDonHang, IDSanPham, SoLuong) 
    VALUES (?,?,?,?)', [
        $idd, $id, $value->IDSanPham, $value->SoLuong
    ]);
    $idd++;
    }
    DB::delete('DELETE FROM giohang WHERE IDKhachHang = ?',[Session::get('user')[0]->IDKhachHang]);
    redirect()->to('order')->send();
})->name('info-pay');

Route::get('order', function(){
    /*$info = DB::table('donhang')
    ->Where('donhang.IDKhachHang', '=', Session::get('user')[0]->IDKhachHang )
    ->get();*/
    $info = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang 
    where donhang.IDKhachHang = ? ',
    [Session::get('user')[0]->IDKhachHang]);
    $order = DB::select('select * , donhang.TinhTrang as TinhTrangDonHang from donhang inner join
     chitietdonhang on donhang.IDdonHang = chitietdonhang.IDdonHang inner join 
     sanpham on chitietdonhang.IDSanPham = sanpham.IDSanPham where donhang.IDKhachHang = ? ',
     [Session::get('user')[0]->IDKhachHang]);
    /*$order = DB::table('donhang','donhang.TinhTrang as "TinhtrangDonHang"')
    ->Where('donhang.IDKhachHang', '=', Session::get('user')[0]->IDKhachHang )
    ->join('chitietdonhang','donhang.IDdonHang','chitietdonhang.IDdonHang')
    ->join('sanpham','chitietdonhang.IDSanPham','sanpham.IDSanPham')
    ->get();*/
    return view('order')
        ->with('info',$info)
        ->with('order',$order);
});

Route::get("/add-product", function () {
    return view('admin/add-product');
});

Route::get('cancel', function() {
    DB::update('UPDATE donhang SET TinhTrang = 4');
    redirect()->to('order')->send();
})->name('cancel');

Route::get('delete-product/{id}', [ProductAdController::class, 'DeleteProduct']);

Route::get('product/{id}', [ProductAdController::class, 'product']);

Route::post('update-pr', [ProductAdController::class, 'UpdateProduct'])->name('Update-pr');

Route::get('Filter', [ProductAdController::class, 'Filter'])->name('filter');


Route::get('delete-customer/{id}', [CustomerAdController::class, 'DeleteCustomer']);

Route::get('Customer/{id}', [CustomerAdController::class, 'Customer']);

Route::post('UpdateCustomer', [CustomerAdController::class, 'UpdateCustomer'])->name('UpdateCustomer');

Route::get('Find', [CustomerAdController::class, 'Find'])->name('find');


Route::post('uploadFileProduct',[UploadFileController::class,'uploadFile'])->name('uploadFileProduct');

Route::get('{id}', [OrderController::class, 'order']);

Route::get('updatesus/{id}', [OrderController::class, 'UpdateSus']);

Route::get('updatecan/{id}', [OrderController::class, 'UpdateCan']);

Route::get('updatesuss/{id}', [OrderController::class, 'UpdateSuss']);
