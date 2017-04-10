<?php
//require "getdata.php"; //mở lên khi test

if (isset($_POST['themHang'])) {
	$checkGoods = mysqli_query($con,"SELECT * FROM goods WHERE goodsname='$goodsname'");
	//Kiểm tra nếu tên hàng đó đã tồn tại trong database
	if(mysqli_num_rows($checkGoods)){
		echo '<script language="javascript">';
		echo 'alert("Lỗi! tên hàng này đã tồn tại.")';
		echo '</script>';
	}
	else {
		//Chỉ cho nhập hàng với số lượng lớn hơn 0 nhỏ hơn 10000
		if($amount > 0 && $amount < 10000){
			//Thực hiện chèn dữ liệu nhập từ input vào database
			$sql = mysqli_query($con, "INSERT INTO goods (goodsname, amount, unit, last_staff, last_update) VALUES ('$goodsname', $amount, '$unit', '$current_user', NOW())");
			//Kiểm tra nếu dữ liệu vào thành công
			if ($sql) {
				//1 = create
				//2 = import
				//3 = export
				//Lưu lại lịch sử thao tác ra vào kho
				mysqli_query($con, "INSERT INTO history (userid, activity, goodsname, amount) VALUES ('$current_userid', '1', '$goodsname', '$amount')");
				echo '<script language="javascript">';
				echo 'alert("Thêm hàng thành công")';
				echo '</script>';
			} else {
				echo '<script language="javascript">';
				echo 'alert("Lỗi! không thể thêm hàng.")';
				echo '</script>';
			}
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Số lượng phải lớn hơn 0, bé hơn 10000 .")';
			echo '</script>';
		}
	}
echo "<meta http-equiv='refresh' content='0'>";
}
?>
<form name="formNhap" role="form" class="formInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			<label for="tenhang">Tên hàng:</label><p/>
			<input type="text" name="goodsname" required id="tenhang" class="form-control"/><p/>
		</div>
		<div class="form-group" style="width:49%; float:left;">
			<label for="soluong">Số lượng muốn nhập:</label><p/>
			<input type="number" name="amount" required id="soluong" class="form-control"/><p/>
		</div>
		<div class="form-group" style="width:50%;float:right;">
			<label for="soluong">Đơn vị:</label><p/>
			<input type="text" name="unit" required id="donvi" class="form-control"/><p/>
		</div>
		<input type="submit" name="themHang" class="btn btn-primary" value="Thêm" action="">
</form> 
