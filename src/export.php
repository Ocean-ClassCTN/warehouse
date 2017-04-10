<?php
//include_once 'config.php';
//require "getdata.php"; //mở lên khi test
if (isset($_POST['xuatHang'])) {
	if($amount <= $row['amount'] && $amount > 0){
		//Thực hiện chèn dữ liệu nhập từ input vào database
		$sql = mysqli_query($con, "UPDATE goods SET amount=amount-$amount,last_staff='$current_user',last_update=NOW() WHERE goodsname='$chonHang'");
		$amountconlai = $row['amount']-$amount;
		//Kiểm tra nếu dữ liệu vào thành công
		if ($sql) {
			//1 = create
			//2 = import
			//3 = export
			//Lưu lại lịch sử thao tác ra vào kho
			mysqli_query($con, "INSERT INTO history (userid, activity, goodsname, amount) VALUES ('$current_userid', '3', '$chonHang', '$amount')");
			echo '<script language="javascript">';
			echo 'alert("Xuất hàng thành công. [Hàng: '.$chonHang.', đã xuất: '.$amount.', còn lại: '. $amountconlai .']")';
			echo '</script>';
		} else {
			echo '<script language="javascript">';
			echo 'alert("Lỗi! không thể xuất hàng.")';
			echo '</script>';
		}
	}
	else{
		if($amount == 0){
			echo '<script language="javascript">';
			echo 'alert("Vui lòng xuất hàng có giá trị lớn hơn 0")';
			echo '</script>';
		}
		else if($amount > $row['amount']){
			echo '<script language="javascript">';
			echo 'alert("Không được xuất số lượng lớn hơn '.$row['amount'].'")';
			echo '</script>';
		}
		else if($amount < 0){
			echo '<script language="javascript">';
			echo 'alert("Không được xuất giá trị bé hơn 1")';
			echo '</script>';
		}

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
						while($row = mysqli_fetch_assoc($egetGoods)) {
							if($row['amount']>0){
					?>
							<option value = "<?php echo($row['goodsname'])?>" ><?php echo($row['goodsname']) ?></option> 
					<?php 
							}
						}                
					?> 
			</select> 
		</div>
		
		<div class="form-group">
			<label for="soluong">Số lượng muốn xuất:</label><p/>
			<input type="number" name="amount" required id="soluong" class="form-control"/><p/>
		</div>
		
		<input type="submit" name="xuatHang" class="btn btn-primary" value="Xuất" action="">
</form> 