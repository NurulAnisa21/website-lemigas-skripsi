<?php 
	session_start();
	include 'config.php';

	//jika belom login, maka tidak bisa checkout
	if (!isset($_SESSION["pelanggan"])) 
	{
		echo "<script>alert('Silahkan login terlebih dahulu');</script>";
		echo "<script>location='login.php';</script>";
	}
	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
	{
		echo "<script>alert('Tidak ada pembayaran, silahkan berbelanja');</script>";
		echo "<script>location='toko.php';</script>";
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	  <link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/topnav.css">
<link rel="shortcut icon" href="gambar/logoo.ico">  
</head>
<body>

<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>


<!--------------------- Checkout ---------------------------------->
		<section class="konten">
 		<div class="container">
 			<h1>Keranjang Belajaan <?php echo $_SESSION["pelanggan"]["pelanggan"] ?></h1>
 			<hr>
 			<table class="tablee"> 
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Nama Produk</th>
 						<th>harga produk</th>
 						<th>Jumlah Produk</th>
 						<th>Sub harga</th> 
 					</tr>
 				</thead>
 				<tbody>
 					<?php $nomor=1;?>
 					<?php $totalbelanja=0; ?>
 					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
 						
 					<!-- menampilkan data produk berdasarkan id produk -->
 					<?php 
 					$ambil = $koneksi->query("SELECT * FROM produk
 						WHERE id_produk='$id_produk'");
 						$pecah = $ambil->fetch_assoc(); 

 						//perkalian subharga
 						$subharga = $pecah["harga_produk"]*$jumlah;

 					?>
 					<tr>
 						<td><?php echo $nomor; ?></td>
 						<td><?php echo $pecah["nama_produk"]; ?></td>
 						<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
 						<td><?php echo $jumlah; ?></td>
 						<td>Rp. <?php echo number_format($subharga); ?></td>
 					</tr>
 					<?php $nomor++; ?>
 					<?php $totalbelanja+=$subharga; ?>
 					<?php endforeach ?>
 				</tbody>
 				<tfoot>
 					<tr>
 						<th colspan="4">Total Belanja</th>
 						<th>Rp. <?php echo number_format($totalbelanja); ?></th>
 					</tr>
 				</tfoot>
 			</table>

 			<!--Form--><br><br>

 			<form method="POST">
 				<div class="form">
 					Nama Pembeli : <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['pelanggan'] ?>" class="form-control">
 				</div>
 				<div class="form">
 					Nomor Telepone Pembeli : <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
 				</div>

 				<button class="button-hijau" name="checkout">Checkout</button>
 			</form>

 			<?php 
 				if (isset($_POST["checkout"])) 
 				{
 					$id_karyawan = $_SESSION["pelanggan"]["id_karyawan"];
 					$tanggal_pembelian = date("Y-m-d");
 					$total_pembelian = $totalbelanja;

 					//menyimpan data ke tabel pembelian
 					$koneksi->query("INSERT INTO pembelian (
 						id_karyawan,tanggal_pembelian,total_pembelian)
 						VALUES ('$id_karyawan','$tanggal_pembelian','$total_pembelian')");

 					//mendapatkan id pembelian
 					$id_pembelian_barusan = $koneksi->insert_id;

 					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
     					{

                // mendapatkan data produk berdasarkan id produk
                $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

               $nama = $perproduk['nama_produk'];
               $harga= $perproduk['harga_produk'];
               $subharga = $perproduk['harga_produk']*$jumlah;
     					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah)
     							VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah')");

                // skript untuk update stok 
              $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
                WHERE id_produk='$id_produk'");
     					}

 					//men kosongkan keranjang
 					unset($_SESSION["keranjang"]);

 					//tampilan dialihkan ke halaman nota
 					echo "<scrip>alert('pembelian sukses')</script>";
 					echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
 				}

 			 ?>
 		</div>
 	</section>



 <!----------------------- Footer -------------------------------->
<div class="footer-main-div">
  <div class="footer-social-icons">
    <ul>
      <li><a href="#" target="blank"><i class="fa fa-facebook"><img src="gambar/facebook.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-twitter"><img src="gambar/twitter.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-instagram"><img src="gambar/instagram.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-youtube"><img src="gambar/youtube.png"></i></a></li>
    </ul>
  </div>
  <div class="footer-menu-satu">
    <ul>
      <li><a href="">Tentang Kami</a></li>
      <li><a href="">Service</a></li>
      <li><a href="">Products</a></li>
      <li><a href="">Contact Us</a></li>  
    </ul>
  </div>
  <div class="footer-alamat">
    Jl. Ciledug Raya No.Kavling 109, RT.7/RW.5, Cipulir, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230
  </div>
</div>


</body>
</html>