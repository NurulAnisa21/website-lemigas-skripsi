<?php 
  session_start();
  include 'config.php';

  //jika belom login
  if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
  {
  	echo "<script>alert('silahkan login terlebih dahulu');</script>";
  	echo "<script>location='login.php';</script>";
  	exit();
  }
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Riwayar Belanja</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/topnav.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<link rel="stylesheet" href="css/css.css">
<style>
  @media only screen and (max-width: 600px) {
   .button{
   	display: inline-block;
   	width: 60%;
   }
    .button-hijau{
    	display: inline-block;
    	width: 60%;
    }
    }
</style>

</head>
<body>





<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

<!--------------------- Riwayat --------------------------------->
	
<section class="riwayat">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["pelanggan"]; ?></h3>

		<center><table class="tablee">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$nomor=1;
					//mendapatkan id pembeli
					$id_karyawan = $_SESSION["pelanggan"]["id_karyawan"];

					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_karyawan='$id_karyawan'");
					while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td></font><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
					<td>
						<?php echo $pecah["status_pembelian"]; ?>
						<br>
						<?php if (!empty($pecah['pengiriman'])): ?>
							<?php echo $pecah['pengiriman']; ?>
						<?php endif ?>
					</td>
					<td><?php echo $pecah["total_pembelian"]; ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="button">nota</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="button-hijau">pembayaran</a>
						<?php else: ?>
						<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="button">Lihat Pembayaran</a>
						<?php endif ?>
					</td>
				</tr>
					<?php $nomor++; ?>
					<?php } ?>
			</tbody>
		</table></center>
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