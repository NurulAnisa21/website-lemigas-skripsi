<?php
	include '../config.php';
?><!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
    <link rel="stylesheet" href="../css/index-admin.css">
</head>
<body>
	
  		<!-- cek apakah sudah login -->
	<?php 
	session_start();

	if (!isset($_SESSION['admin'])) 
	{
		echo "<script>alert('anda harus login terlebih dahulu');</script>";
		echo "<script>location='loginadmin.php';</script>";
	
		exit();
	}

	
	?>



     <input type="checkbox" id="check">
    <label for="check">
    	<img src="../gambar/bar.png" width="28" height="29" id="btn">
        <img src="../gambar/close.png" width="28" height="29" id="cancel">
     </label>
<div class="sidebar">
    <header>Dashboard</header>
    <ul>
            	<li><a href="index.php"><img src="../gambar/buildings.png" width="34" height="34"> Home</a></li>
                <li><a href="index.php?halaman=produk"><img src="../gambar/commerce-and-shopping.png" width="34" height="34"> Produk</a></li>
                <li><a href="index.php?halaman=pembelian"><img src="../gambar/simpan pinjam.png" width="34" height="34"> pembelian</a></li>
                <li><a href="index.php?halaman=pelangan"><img src="../gambar/personal.png" width="34" height="34"> Karyawan</a></li>
                <li><a href="index.php?halaman=laporan_pembelian"><img src="../gambar/book.png" width="34" height="34"> Laporan</a></li>
                <br><br>
                <li><a href="index.php?halaman=logout"><img src="../gambar/logout.png" width="34" height="34"> Logout</a></li>
            </ul>

</div>

        
        <!-- /. NAV SIDE  -->
     
       
           
            	<section>
         			<?php
						if(isset($_GET['halaman']))
						{
							if ($_GET['halaman']=="produk")
							{
								include 'produk.php';					
							}
							elseif ($_GET['halaman']=="pembelian")
							{
								include 'pembelian.php';	
							}
							elseif ($_GET['halaman']=="pelangan")
							{
								include 'pelangan.php';	
							}
							elseif ($_GET['halaman']=="stock")
							{
								include 'stock.php';	
							}
								elseif ($_GET['halaman']=="logout")
							{
								include 'logout.php';	
							}
							elseif ($_GET['halaman']=="detail")
							{
								include 'detail.php';
							}
							elseif ($_GET['halaman']=="tambahproduk") 
							{
								include 'tambahproduk.php';
							}
							elseif ($_GET['halaman']=="ubahproduk") 
							{
								include 'ubahproduk.php';
							}
							elseif ($_GET['halaman']=="hapusproduk") 
							{
								include 'hapusproduk.php';
							}
							elseif ($_GET['halaman']=="tambahkaryawan") 
							{
								include 'tambahkaryawan.php';
							}
							elseif ($_GET['halaman']=="pembayaran") 
							{
								include 'pembayaran.php';
							}
							elseif ($_GET['halaman']=="laporan_pembelian") 
							{
								include 'laporan_pembelian.php';
							}
							elseif ($_GET['halaman']=="ubahkaryawan") 
							{
								include 'ubahkaryawan.php';
							}
						}
						else
						{
							include 'home.php';
						}
					?>
        		</section>
             <!-- /. PAGE INNER  -->
            
         <!-- /. PAGE WRAPPER  -->
       

</body>
</html>