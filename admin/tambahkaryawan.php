<!DOCTYPE html>
<html>
<head>
	<title>Tambah data karyawan</title>
	  <link rel="stylesheet" href="../css/index-admin.css">
	  <style>
	  	
input{
    width: 40%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
	  </style>
</head>
<body><br><br><br>
<center><h2>Tambah Data Karyawan</h2>
<br>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="text" class="form-control" name="nama" placeholder="Nama Karyawan">
	</div><br>
	<div class="form-group">
		<input type="email" class="form-control" name="email" placeholder="Email Karyawan">
	</div><br>
	<div class="form-group">
		<input type="password" name="password" name="password" placeholder="Password Karyawan">
	</div><br>
	<div class="form-group">
		<input type="number" class="form-control" name="telepon" placeholder="Nomor Telepone">
	</div>
	<button class="button" name="save">simpan</button>
</form></center><br><br>

<?php 
if (isset($_POST['save']))
 {

 	$koneksi->query("INSERT INTO karyawan
 		(pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan)
 		VALUES ('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[telepon]')");

 		echo "<div class='alert alert-info'>Data tesimpan</div>";
 		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelangan'>";
 }
 ?>

</body>
</html>