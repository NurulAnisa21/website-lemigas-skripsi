<?php 
  session_start();
  include 'config.php';
  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/topnav.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<style>
  @media only screen and (max-width: 600px) {
    .row3
    .column3{
      display: block;
      width: 100%;
      }
.success{
  display: block;
  width: 100%;
}
    }
</style>
</head>
<body>
<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>
<!---------------------------------- NOTA -------------------------->
<h1>detail pembelian <?php echo $_SESSION["pelanggan"]["pelanggan"] ?></h1>

<?php 
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN karyawan
		ON pembelian.id_karyawan=karyawan.id_karyawan
		WHERE pembelian.id_pembelian='$_GET[id]'");

	$detail = $ambil->fetch_assoc();
 ?>
   <!-- jika pelanggan yang beli tidak sama dengan data pelanggan yg login maka akan di alihkan , karena tida bole melihat nota orang lain -->
   <?php 
   	//mendapatkan id pelanggan yg beli
   	$idpelangganyangbeli=$detail["id_karyawan"];

   	//mendapatkan id pelanggan yg login
   	$idpelangganyanglogin=$_SESSION["pelanggan"]["id_karyawan"];

   	if ($idpelangganyangbeli!==$idpelangganyanglogin)
   	{
   		echo "<script>alert('jangan nakal cok');</script>";
   		echo "<script>location='riwayat.php';</script>";
   		exit();
   	}
   ?>
<center>
<div class="row3">
  <div class="column3">
    Nama Pelangan : <strong><?php echo $detail['pelanggan']; ?></strong><br>
 No. Pembelian : <?php echo $detail['id_pembelian']; ?>
  </div>
  <div class="column3">
  Nomor telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
  Email : <?php echo $detail['email_pelanggan']; ?>
  </div>
  <div class="column3">
  Tanggal Pembelian : <?php echo $detail['tanggal_pembelian'];  ?><br>
  Total Pembelian : Rp. <?php echo number_format($detail['total_pembelian']); ?>
  </div>
</div>
</center>


 <br>

 <center><table class="tablee">
 	<thead>
 		<tr>
 			<th>no</th>
 			<th>nama produk</th>
 			<th>harga</th>
 			<th>jumlah</th>
 			<th>subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php 
 		$ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>

   <?php while ($pecah=$ambil->fetch_assoc()) { ?> 

 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
 		
 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table></center>


<center><div class="success">
  <p><strong>Success!</strong>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?></p>
</div></center>

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