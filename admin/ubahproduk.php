<!DOCTYPE html>
<html>
<head>
	<title>Ubah Produk</title>
	  <link rel="stylesheet" href="../css/index-admin.css">
	  <style>
	  	
input[type=text], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
	  </style>
</head>
<body>
<center><h2>Ubah Produk</h2></center><br><br>

<?php 
	
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
 ?>

<center>
 <form method="post" enctype="multipart/form-data">
 	<div class="input">
            <label for="fname">Nama Produk</label>
          </div>
          <div class="input">
            <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>" >
          </div>
    </div><br>
	<div class="input">
            <label for="fname">Harga Produk</label>
          </div>
          <div class="input">
            <input type="text" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">	
          </div>
    </div><br>
    <div class="input">
            <label for="fname">Stock Produk</label>
          </div>
          <div class="input">
            <input type="text" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>"> 
          </div>
    </div><br>
    <div class="input">
            <label for="fname">Foto Produk</label>
          </div>
          <div class="input">
            <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
          </div>
    </div><br>
    <div class="input">
            <label for="fname">Ganti Foto Produk</label>
          </div>
          <div class="input">
            <input type="file" name="foto" class="form-control">
          </div>
    </div><br><br>
     <div class="input">
            <label for="fname">Deskripsi Produk</label>
          </div>
          <div class="input">
            <textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['desk_produk']; ?></textarea>
          </div>
    </div>

 	<button name="ubah" class="button">ubah</button>
 	
 </form>
</center>
 <?php 
if(isset($_POST['ubah']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto))
	 {
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',foto_produk='$namafoto', desk_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]'
			WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]', desk_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]'
			WHERE id_produk='$_GET[id]'");
	}

	echo "<script>alert('data produk telah diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

 ?>
</body>
</html>