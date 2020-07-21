<?php

session_start();
$con = mysqli_connect('localhost', 'root','root');
 mysqli_select_db($con,'csdlbsc');
 $taiKhoan = $_POST['user'];
 $matKhau = $_POST['password'];

 $s = "select * from nguoidung where taiKhoan = '$taiKhoan' && matKhau = '$matKhau' ";
 $result = mysqli_query($con, $s);
 $num = mysqli_num_rows($result);
 if ($num == 1){
 	header('location:home.php');

 }else{
 	header('location:login.php');
 }
?>