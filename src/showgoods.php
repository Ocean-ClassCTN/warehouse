<?php 
	if (isset($_SESSION['usr_id'])) {
	$sql = mysqli_query($con, "SELECT id,goodsname,last_staff,last_update,unit, SUM(`amount`) `amount`
													FROM goods
													GROUP BY goodsname 
													ORDER BY amount ASC"); 

	if ($sql->num_rows > 0) {
		 echo "<table class='table-fill' id='myTable'><tr><th></th><th>ID</th><th>Tên hàng</th><th>Số lượng</th><th>Đơn vị</th><th>Thành viên cập nhật cuối</th><th>Cập nhật lần cuối</th></tr>";
		 // output data of each row
		//$query = "DELETE FROM goods WHERE id=$hang['id']";

		while($hang = mysqli_fetch_array($sql)) {
			$time = strtotime($hang["last_update"]);
			$last_update = date("d/m/Y | g:i A", $time);
			echo "<tr><td><a href='home.php?delete=". $hang["id"]."' class='btn btn-primary' onclick='return ConfirmDelete()'>XÓA</a></td><td>" . $hang["id"]. "</td><td>" . $hang["goodsname"]. "</td><td>" . $hang["amount"]. "</td><td>" . $hang["unit"]. "</td><td>" . $hang["last_staff"]. "</td><td>" . $last_update. "</td></tr>";
		}
		 echo "</table>";
	} else {
		 echo "<center><img src='http://icons.iconarchive.com/icons/tpdkdesign.net/refresh-cl/256/System-Box-Empty-icon.png'></center>";
	}
}
?>