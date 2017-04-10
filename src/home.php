<?php
session_start();

if(isset($_SESSION['usr_id'])=="") {
	header("Location: index.php");
}
include_once 'config.php';
require "getdata.php";
$current_user=$_SESSION['usr_name'];
$current_userid=$_SESSION['usr_id'];

//delete a goods
$idg = $_GET["delete"];
$query = "DELETE FROM goods WHERE id = '$idg'";
$run = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse | Trang chu</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/table.css" type="text/css" />
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/buttonAction.js"></script>
	<img src="images/bg-blur.png" style="display:none">
	<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<?php include "header.php"; ?>
</head>
<body>
	<div class="content">
		<div class="inputTools">
		<input value="Thêm hàng" type="submit" class="btn btn-primary" onclick="cmdthemHang()"/>
		<input value="Nhập hàng" type="submit" class="btn btn-primary" onclick="cmdnhapHang()" />
		<input value="Xuất hàng" type="submit" class="btn btn-primary" onclick="cmdxuatHang()" />
		<input value="Lịch sử xuất / nhập hàng" type="submit" class="btn btn-primary" onclick="cmdHistory()"/>
		<input value="Đổi tên hàng" type="submit" class="btn btn-primary" onclick="cmddoiTen()" />
		<select id="TableSL" style="width: 210px; float:right;" class="form-control" onchange="tableSort()">  
			<option value="">Sắp xếp theo</option> 
			<option value="goodsname">Tên hàng</option> 
			<option value="id">ID</option> 
			<option value="amount">Số lượng</option> 
			<option value="unit">Đơn vị</option> 
		</select> 
		</div>
	<!--Hien thi du lieu-->
	<?php include "showgoods.php"; ?>
	</div>
</body>
<!--Lightbox for inputTools-->
	<div id="boxThem" class="white_content"><?php include "create.php"; ?>
	<a href="javascript:void(0)" class="closePopup" onclick="closethemHang()"></a>
	</div>
	<div id="boxNhap" class="white_content"><?php include "import.php"; ?>
	<a href="javascript:void(0)" class="closePopup" onclick="closenhapHang()"></a>
	</div>
	<div id="boxXuat" class="white_content"><?php include "export.php"; ?>
	<a href="javascript:void(0)" class="closePopup" onclick="closexuatHang()"></a>
	</div>
	<div id="boxdoiTen" class="white_content"><?php include "changename.php"; ?>
	<a href="javascript:void(0)" class="closePopup" onclick="closedoiTen()"></a>
	</div>
	<div id="boxHistory" class="white_content" style="top: 100px;max-height: 750px;min-height: 300px;max-width: 900px;min-width:313px; width:900px;height:auto;"><?php include "history.php"; ?>
	<a href="javascript:void(0)" class="closePopup" onclick="closeHistory()"></a>
	</div>
<!---->
<a onclick="closethemHang();closenhapHang();closexuatHang();closedoiTen();closeHistory()"><div id="fade" class="black_overlay"></div></a>
</html>


