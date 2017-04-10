function cmdthemHang() {
   document.getElementById('boxThem').style.display='block';
   document.getElementById('fade').style.display='block';
   document.body.style.backgroundImage = "url('/images/bg-blur.png')";
   document.getElementsByClassName("content")[0].style.filter = "blur(10px)";
}
function closethemHang(){
	document.getElementById('boxThem').style.display='none';
	document.getElementById('fade').style.display='none';
	document.body.style.backgroundImage = "url('/images/bg.png')";
	document.getElementsByClassName("content")[0].style.filter = "none";
}
function cmdnhapHang() {
   document.getElementById('boxNhap').style.display='block';
   document.getElementById('fade').style.display='block';
   document.body.style.backgroundImage = "url('/images/bg-blur.png')";
   document.getElementsByClassName("content")[0].style.filter = "blur(10px)";
}
function closenhapHang(){
	document.getElementById('boxNhap').style.display='none';
	document.getElementById('fade').style.display='none';
	document.body.style.backgroundImage = "url('/images/bg.png')";
	document.getElementsByClassName("content")[0].style.filter = "none";
}
function cmdxuatHang() {
   document.getElementById('boxXuat').style.display='block';
   document.getElementById('fade').style.display='block';
   document.body.style.backgroundImage = "url('/images/bg-blur.png')";
   document.getElementsByClassName("content")[0].style.filter = "blur(10px)";
}
function closexuatHang(){
	document.getElementById('boxXuat').style.display='none';
	document.getElementById('fade').style.display='none';
	document.body.style.backgroundImage = "url('/images/bg.png')";
	document.getElementsByClassName("content")[0].style.filter = "none";
}
function cmddoiTen() {
   document.getElementById('boxdoiTen').style.display='block';
   document.getElementById('fade').style.display='block';
   document.body.style.backgroundImage = "url('/images/bg-blur.png')";
   document.getElementsByClassName("content")[0].style.filter = "blur(10px)";
}
function closedoiTen(){
	document.getElementById('boxdoiTen').style.display='none';
	document.getElementById('fade').style.display='none';
	document.body.style.backgroundImage = "url('/images/bg.png')";
	document.getElementsByClassName("content")[0].style.filter = "none";
}
function cmdHistory() {
   document.getElementById('boxHistory').style.display='block';
   document.getElementById('fade').style.display='block';
   document.body.style.backgroundImage = "url('/images/bg-blur.png')";
   document.getElementsByClassName("content")[0].style.filter = "blur(10px)";
}
function closeHistory(){
	document.getElementById('boxHistory').style.display='none';
	document.getElementById('fade').style.display='none';
	document.body.style.backgroundImage = "url('/images/bg.png')";
	document.getElementsByClassName("content")[0].style.filter = "none";
}
function ConfirmDelete()
{
  var x = confirm("Bạn muốn xóa hàng này chứ?");
  if (x){
	return true;
  }
  else
    return false;
}


  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
  
function tableSort() {
	if(document.getElementById("TableSL").value == "goodsname"){
	  var table, rows, switching, i, x, y, shouldSwitch;
	  table = document.getElementById("myTable");
	  switching = true;
	  while (switching) {
		switching = false;
		rows = table.getElementsByTagName("TR");
		for (i = 1; i < (rows.length - 1); i++) {
		  shouldSwitch = false;
		  x = rows[i].getElementsByTagName("TD")[2];
		  y = rows[i + 1].getElementsByTagName("TD")[2];
		  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
			shouldSwitch= true;
			break;
		  }
		}
		if (shouldSwitch) {

		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		}
	  }
	}
	if(document.getElementById("TableSL").value == "id"){
	  var table, rows, switching, i, x, y, shouldSwitch;
	  table = document.getElementById("myTable");
	  switching = true;
	  while (switching) {
		switching = false;
		rows = table.getElementsByTagName("TR");
		for (i = 1; i < (rows.length - 1); i++) {
		  shouldSwitch = false;
		  x = rows[i].getElementsByTagName("TD")[1];
		  y = rows[i + 1].getElementsByTagName("TD")[1];
		  if (x.innerHTML > y.innerHTML) {
			shouldSwitch= true;
			break;
		  }
		}
		if (shouldSwitch) {

		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		}
	  }
	}
	if(document.getElementById("TableSL").value == "unit"){
	  var table, rows, switching, i, x, y, shouldSwitch;
	  table = document.getElementById("myTable");
	  switching = true;
	  while (switching) {
		switching = false;
		rows = table.getElementsByTagName("TR");
		for (i = 1; i < (rows.length - 1); i++) {
		  shouldSwitch = false;
		  x = rows[i].getElementsByTagName("TD")[4];
		  y = rows[i + 1].getElementsByTagName("TD")[4];
		  if (x.innerHTML > y.innerHTML) {
			shouldSwitch= true;
			break;
		  }
		}
		if (shouldSwitch) {

		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		}
	  }
	}
	if(document.getElementById("TableSL").value == "amount"){
		location.reload();
	}
}
