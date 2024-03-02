<?php
//session_start();
if(isset($_SESSION['username']))
{
	

if($_SESSION['phanquyen']==1)
{
	header("location:../index.php");
}
if($_SESSION['phanquyen']==0)
{
	header("location:admin.php");
}
}
?>
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
    <?php
include("../include/connect.php");

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $stmt = $link->prepare("SELECT * FROM nguoidung WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['phanquyen'] = $user['phanquyen'];
            $_SESSION['idnd'] = $user['idnd'];

            if ($user['phanquyen'] == 0) {
                echo "
                    <script language='javascript'>
                        alert('Đăng nhập quản trị thành công');
                        window.open('admin.php','_self', 1);
                    </script>
                ";
                exit();
            } else {
                header('location:../index.php');
                exit();
            }
        } else {
            echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
        }
    }
}
?>

<!-- Your HTML form goes here -->
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body">
    
    <div class="admin_login">
        <form action="" method="post">
            <label>Tên tài khoản:</label><input type="text" name="user" placeholder=" Username"><br>
            <label>Mật khẩu:</label><input type="password" name="pass" placeholder=" Password"><br>
            <button name="login" class="dangnhap">Đăng nhập</button>
            <button class="thoat"><a href="../index.php">Thoát</a></button>
        </form>
    </div>
</div>
