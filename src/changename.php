<?php
include_once 'config.php';
require "getdata.php"; //mở lên khi test
if (isset($_POST['doiTen'])) {
	if(!ctype_space($goodsname)){
		//Thực hiện chèn dữ liệu nhập từ input vào database
		$sql = mysqli_query($con, "UPDATE goods SET goodsname='$goodsname' WHERE goodsname='$chonHang'");
		//Kiểm tra nếu dữ liệu vào thành công
		if ($sql) {
			echo '<script language="javascript">';
			echo 'alert("Đổi tên thành công.")';
			echo '</script>';
		} else {
			echo '<script language="javascript">';
			echo 'alert("Lỗi! không thể đổi tên.")';
			echo '</script>';
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Tên không được để trống.")';
		echo '</script>';
	}
echo "<meta http-equiv='refresh' content='0'>";
}
?>
<form name="formNhap" role="form" class="formInput" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			<label for="tenhang">Tên hàng hiện tại:</label><p/>
			<select name="hang" class="form-control" required>
				<option value="">Chọn hàng</option> 
					<?php 
						while($edit = mysqli_fetch_assoc($ngetGoods)) {
					?>
							<option value = "<?php echo($edit['goodsname'])?>" ><?php echo($edit['goodsname']) ?></option> 
					<?php 
						}                
					?> 
			</select> 
		</div>
		
		<div class="form-group">
			<label for="tenhangmoi">Tên mới:</label><p/>
			<input type="text" name="goodsname" required id="tenhangmoi" class="form-control"/><p/>
		</div>
		
		<input type="submit" name="doiTen" class="btn btn-primary" value="Đổi" action="">
</form> 