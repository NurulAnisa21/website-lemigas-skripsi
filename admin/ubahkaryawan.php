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
<body><br><br>
<center><h2>Ubah Data Karyawan</h2></center><br><br>
<hr><br><br>

<?php 
	
	$ambil = $koneksi->query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
 ?>

<center>
 <form method="post" enctype="multipart/form-data">
 	<div class="input">
            <label for="fname">Nama Karyawan</label>
          </div>
          <div class="input">
            <input type="text" name="nama" class="form-control" value="<?php echo $pecah['pelanggan']; ?>" >
          </div>
    </div><br>
	<div class="input">
            <label for="fname">Email Karyawan</label>
          </div>
          <div class="input">
            <input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">	
          </div>
    </div><br>
    	<div class="input">
            <label for="fname">Password Karyawan</label>
          </div>
          <div class="input">
            <input type="text" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>">	
          </div>
    </div><br>
    	<div class="input">
            <label for="fname">Telepone Karyawan</label>
          </div>
          <div class="input">
            <input type="text" name="tlp" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">	
          </div>
    </div><br>
   

 	<button name="ubah" class="button">ubah</button>
 	
 </form>
</center>
 <?php 
if(isset($_POST['ubah']))
{
	
		$koneksi->query("UPDATE karyawan SET pelanggan='$_POST[nama]',
			email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]', telepon_pelanggan='$_POST[tlp]'
			WHERE id_karyawan='$_GET[id]'");
	

	echo "<script>alert('data karyawan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelangan';</script>";
}

 ?>
</body>
</html>