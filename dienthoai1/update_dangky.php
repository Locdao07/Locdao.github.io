<?php
include 'include/connect.php';
include 'admin/function/function.php';

if (isset($_POST['submit'])) {
    $tennd = $_POST['tennd'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']); // Use md5() or a more secure hashing algorithm
    $email = $_POST['email'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];

    // Check if the username already exists
    $check_username_query = "SELECT * FROM nguoidung WHERE username = '$user'";
    $check_username_result = mysqli_query($link, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        // Username already exists, display an error message
        echo "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
        echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Adjust the URL accordingly
    } else {
        // Username is unique, proceed with the registration
        $dmyhis = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s");
        $ngay = date("Y") . ":" . date("m") . ":" . date("d") . ":" . date("H") . ":" . date("i") . ":" . date("s");

        $insert = "INSERT INTO nguoidung VALUES('', '$tennd', '$user', '$pass', '$ngaysinh', '$gioitinh', '$email', '$dienthoai', '$diachi', '$ngay', '1')";
        $query = mysqli_query($link, $insert);

        if ($query) {
            redirect("index.php", "Bạn đã đăng ký thành công.", 2);
        } else {
            echo "Thất bại";
        }
    }
}
?>
