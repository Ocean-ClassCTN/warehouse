<?php
//export
//$amount là lấy giá trị từ nhập từ khung input amount
$amount = mysqli_real_escape_string($con, $_POST['amount']);
//$chonHang là lấy giá trị từ nhập từ select hang
$chonHang = mysqli_real_escape_string($con, $_POST['hang']);
//Xuất dữ liệu từ database để hiển thị ra web
$egetGoods = mysqli_query($con,"SELECT * FROM goods"); 
//Xuất dữ liệu từ database để hiển so sánh
$forCompare = mysqli_query($con,"SELECT * FROM goods WHERE goodsname='$chonHang'");
$row = mysqli_fetch_assoc($forCompare);

//import
//Tương tự như $egetGoods để lấy dữ liệu trong database ra hiển thị
$igetGoods = mysqli_query($con,"SELECT * FROM goods"); 

//Create goods
//Lấy giá trị từ khung input
$goodsname = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['goodsname'])));
$unit = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['unit'])));

//edit Goods name
$ngetGoods = mysqli_query($con,"SELECT * FROM goods"); 

?>