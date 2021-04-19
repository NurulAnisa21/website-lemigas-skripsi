<style>
	  	
input[type=text], select, textarea{
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

	  </style>
<br>
	  <center><h2>Tambah Produk</h2></center><br><br>
<center>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="text" class="form-control" name="nama" placeholder="Nama Produk">
	</div><br>
	<div class="form-group">
		<input type="text" class="form-control" name="harga" placeholder="Harga (RP)">
	</div><br><br>
	<div class="form-group">
		<textarea class="form-control" name="deskripsi" rows="10" placeholder="Deskripsi Produk"></textarea> 
	</div><br><br>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto">
	</div><br><br>
	<button class="button-hijau" name="save">simpan</button>
</form></center>
<?php 
if (isset($_POST['save']))
 {
 	$nama = $_FILES['foto']['name'];
 	$lokasi =$_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../foto_produk/".$nama); 

 	$koneksi->query("INSERT INTO produk
 		(nama_produk,harga_produk,foto_produk,desk_produk)
 		VALUES ('$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]')");

 		echo "<div class='alert alert-info'>Data tesimpan</div>";
 		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
 }
 ?>

