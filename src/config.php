<?php
//Ket noi den csdl
$con = mysqli_connect("localhost", "root", "123456", "warehouse") or die("Không thể kết nối đến CSDL " . mysqli_error($con));
//mysqli_query($con, "SET character_set_results=utf8");
mysqli_set_charset($con,'utf8');
?>