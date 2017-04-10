<?php 
//include_once 'config.php';
$history = mysqli_query($con, "SELECT * FROM history"); 
	if ($history->num_rows > 0) {
		echo "<table class='table-fill' id='myTable'><tr><th>Thành viên</th><th>Thao tác</th><th>Tên hàng̣</th><th>Số lượng</th><th>Thời gian</th></tr>";
		while($his = mysqli_fetch_array($history)) {
			$userid = $his["userid"];
			//Lấy tên thành viên có số id lấy từ trong table history
			$getuser = mysqli_query($con, "SELECT name FROM users WHERE id=$userid ");
			$resultuser = mysqli_fetch_array($getuser);
			//$his_user = $resultuser["name"];
			
			//1 = create(Thêm hàng)
			//2 = import(Nhập hàng")
			//3 = export(Xuất hàng)
			if($his["activity"] == 1) $his_activity ="Thêm hàng";
			if($his["activity"] == 2) $his_activity ="Nhập hàng";
			if($his["activity"] == 3) $his_activity ="Xuất hàng";
			
			$time = strtotime($his["time"]);
			$last_update = date("d/m/Y | g:i A", $time);
			echo "<tr><td>" . $resultuser["name"]. "</td><td>" . $his_activity . "</td><td>" . $his["goodsname"]. "</td><td>" . $his["amount"]. "</td><td>" . $last_update. "</td></tr>";
		}
		 echo "</table>";
	} else {
		 echo "<center>Không có lịch sử xuất nhập nào cả!</center>";
	}
?>