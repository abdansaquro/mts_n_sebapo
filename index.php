<?php
error_reporting(0);
include "konek.php";

$hal = $_GET['hal'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Perpus</title>
		<link rel="shortcut icon" type="image/x-icon" href="">
		<link rel="stylesheet" type="text/css" href="admin/index.css">
		<link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="admin/js/jquery-ui/jquery-ui.css">
		<script type="text/javascript" src="admin/js/jquery.js"></script>
		<script type="text/javascript" src="admin/js/jquery-ui/jquery-ui.js"></script>	
		<script type="text/javascript">
			function onlyNumbers(evt,e) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
				return true;
			}
			var loadFile = function(event,img) {
			    img.setAttribute("style","background-image:url('"+URL.createObjectURL(event.target.files[0])+"')");
			};
		</script>
	</head>
	<body onLoad="document.getElementById('').setAttribute('class','submenu active')">
		<div class="bg" style="background-image: url('admin/gambar/a.jpg');">
			<div class="logo">
				<div class="contanerlogo">
					<div left></div>
					<div right></div>
					<!-- ganti gambar admin/gambar/library-icon.png -->
					<div class="school" style="background-image:url('admin/gambar/library-icon.png')">
						<!-- ganti tulisan -->
						<h3>PERPUSTAKAAN</h3>
						<h2>MTs N Sebapo</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="containerbox">
			<section class="nav">
				<div class="menu">
						
					<div class="submenu" id="user" onClick="location.href='index.php?hal=home'">
						<h3> <font><?php if($hal == "home"){ echo "#";} ?>Home</font></h3>
				    </div>
					
					<div class="submenu" id="user" onClick="location.href='index.php?hal=buku'">
						<h3> <font><?php if($hal == "buku"){ echo "#";} ?>Buku</font></h3>
				    </div>
			
					
			</section>
			<div style="width:90%;margin-left:5%;display:flex;display:-webkit-flex;">
				<div class="content" style="padding:10px"> 
					
					<!-- utk ckeditor -->
		<script src="admin/ckeditor/ckeditor.js"></script>
		  <!-- utk ckeditor -->


<!-- table -->	
<link rel="stylesheet" href="admin/plugin_table/bootstrap.min.css">
<script src="admin/plugin_table/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="admin/plugin_table/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="admin/plugin_table/jquery.dataTables.css">
<script type="text/javascript" src="admin/plugin_table/jquery.min.js"></script>
<script type="text/javascript" src="admin/plugin_table/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );
</script>
<!-- table sampe sni -->	

<?php

if($_GET['pesan']){
	echo "
	<div class='alert alert-info'>
		<strong>$_GET[pesan]</strong>
	</div>
";
}
?>


<?php

if($hal == "buku"){
	include "buku.php";	
		}else{
			echo "<br><br><br><h1><center>Welcome to Website <br> Perpustakaan MTs N Sebapo</center></h1>";
		}

?>


					
					
					
					
				</div>
				<div class="right">
					<div style="padding:20px">
						<h4>Perpustakaan <small>MTs N Sebapo</small></h4><hr>
						<img src="admin/gambar/buku.png" align="right" style="width:70px">
						Membangun bersama mencerdaskan bangsa, mari terus tuntut ilmu gapai semua mimpi dan cita-citamu
					</div> 
					<div style="padding:20px">
						<h4>MENU <small>Pilih Menu</small></h4><hr>
						<ul class="navright">
							<li><a href="index.php?hal=home">&raquo; Home</a></li>
							<li><a href="index.php?hal=buku">&raquo; Buku</a></li>
						</ul>
					</div> 
				</div>
			</div>
			<div class="nospace"></div>
		</div>
		<div class="footer">Copyright &copy; 2018 - Perpustakaan MTs N Sebapo</div>
	</body>
</html>