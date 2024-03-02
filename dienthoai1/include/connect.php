<?php
$tenmaychu="localhost";
$tentaikhoan='root';
$pass='';
$csdl='dienthoai';

	$link=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die("Cannot connect to the localhost");
	mysqli_select_db($link,$csdl) ;
	mysqli_query($link,"SET NAMES 'UTF8'");
?>
