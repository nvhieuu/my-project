function clickss() {
    if ($("#login-form").hasClass("hidden")) {
        $("body").addClass("overflow-hidden");
        $("#showModal").addClass("fixed h-screen");
        $("#login-form").removeClass("hidden");
    } else {
        $("#login-form").addClass("hidden");
        $("#showModal").removeClass("fixed h-screen");
        $("body").removeClass("overflow-hidden");
    }
}
function clicksss() {
    if ($("#reg-form").hasClass("hidden")) {
        $("body").addClass("overflow-hidden");
        $("#showModall").addClass("fixed h-screen");
        $("#reg-form").removeClass("hidden");
    } else {
        $("#reg-form").addClass("hidden");
        $("#showModall").removeClass("fixed h-screen");
        $("body").removeClass("overflow-hidden");
    }
}
function closeModal() {
    $("#login-form").addClass("hidden");
    $("#reg-form").addClass("hidden");
    $("#showModal").removeClass("fixed h-screen");
    $("#showModall").removeClass("fixed h-screen");
    $("body").removeClass("overflow-hidden");
}
function register(event) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData($("#form")[0]);
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "/process-valid-register",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            switch (response.mystate) {
                case "error":
                    $("#myError").html("");
                    for (
                        let index = 0;
                        index < response.error.length;
                        index++
                    ) {
                        const element = response.error[index];
                        $("#myError").append(
                            '<p class="text-red-500 font-semibold mb-1 text-left">' +
                                element +
                                "</p>"
                        );
                    }
                    break;
                case "success":
                    $("#form").submit();
                    break;
                default:
                    document.getElementsByTagName("body")[0].innerHTML = "";
                    break;
            }
        },
    });
}

/*function UpdateInfo(event) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData($("#form1")[0]);
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "/process-valid-updateInfo",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            switch (response.mystate) {
                case "error":
                    $("#myError1").html("");
                    for (
                        let index = 0;
                        index < response.error.length;
                        index++
                    ) {
                        const element = response.error[index];
                        $("#myError1").append(
                            '<p class="text-red-500 font-semibold mb-1 text-left">' +
                                element +
                                "</p>"
                        );
                    }
                    break;
                case "success":
                    $("#form1").submit();
                    break;
                default:
                    document.getElementsByTagName("body")[0].innerHTML = "";
                    break;
            }
        },
    });
}*/

function login(event) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData($("#formLogin")[0]);
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "/process-valid-login",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            switch (response.mystate) {
                case "error":
                    $("#myErrors").html("");
                    $("#myErrors").append(
                        '<p class="text-red-500 font-semibold mb-1 text-left">' +
                            "Thông tin đăng nhập không đúng" +
                            "</p>"
                    );
                    break;
                case "success":
                    $("#formLogin").submit();
                    break;
                default:
                    document.getElementsByTagName("body")[0].innerHTML = "";
                    break;
            }
        },
    });
}
function onClickChangeImage(element) {
    $("#imageMain").attr("src", element.src);
}
function onChangeNumberCart(ID, Ele) {
    $.ajax({
        method: "GET",
        url: "update-cart",
        data: {
            SoLuong: Ele.value,
            ID: ID,
        },
        success: function (response) {
            console.log(response.sumItem);
            console.log(response.sumCart);
            $("#sumItem" + ID).html(response.sumItem + " VNĐ");
            $("#sumCart").html(response.sumCart + " VNĐ");
        },
    });
}
