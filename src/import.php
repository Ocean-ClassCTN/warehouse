<?php
//require "getdata.php"; //mở lên khi test
if (isset($_POST['nhapHang'])) {
	//Chỉ cho nhập hàng với số lượng lớn hơn 0 nhỏ hơn 10000
	if($amount > 0 && $amount < 10000){
		//Thực hiện chèn dữ liệu nhập từ input vào database, nháy đơn ' ' đối với kí tự chữ, kí tự số không cần ngoặc kép
		$sql = mysqli_query($con, "UPDATE goods SET amount=amount+$amount,last_staff='$current_user',last_update=NOW() WHERE goodsname='$chonHang'");
		//Kiểm tra nếu dữ liệu vào database thành công
		if ($sql) {
			//1 = create
			//2 = import
			//3 = export
			//Lưu lại lịch sử thao tác ra vào kho
			mysqli_query($con, "INSERT INTO history (userid, activity, goodsname, amount) VALUES ('$current_userid', '2', '$chonHang', '$amount')");
			echo '<script language="javascript">';
			echo 'alert("Nhập hàng thành công")';
			echo '</script>';
		} else {
			echo '<script language="javascript">';
			echo 'alert("Lỗi! không thể nhập hàng. '.$amount.' '.$chonHang.'")';
			echo '</script>';
		}
	}
	else if($amount > 9999){
		echo '<script language="javascript">';
		echo 'alert("Không được nhập số lượng lớn hơn 9999")';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Không được nhập số lượng nhỏ hơn 1")';
		echo '</script>';
	}
echo "<meta http-equiv='refresh' content='0'>";
}
?>
<form name="formNhap" role="form" class="formInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			<label for="tenhang">Tên hàng:</label><p/>
			<select name="hang" class="form-control" required>  
				<option value="">Chọn hàng...</option> 
					<?php 
						while($rowNhap = mysqli_fetch_assoc($igetGoods)) 
						{
						?>
						<option value = "<?php echo($rowNhap['goodsname'])?>" ><?php echo($rowNhap['goodsname']) ?> 
						</option> 
						<?php 
						}
					?> 
			</select> 
		</div>
		
		<div class="form-group">
			<label for="soluong">Số lượng muốn nhập:</label><p/>
			<input type="number" name="amount" required id="soluong" class="form-control"/><p/>
		</div>
		
		<input type="submit" name="nhapHang" class="btn btn-primary" value="Nhập" action="">
</form> 