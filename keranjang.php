<?php 

	session_start();
	include 'config.php';

	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
	{
		echo "<script>alert('Keranjang kosong, silahkan berbelanja');</script>";
		echo "<script>location='toko.php';</script>";
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang Belanja </title>
 	<link rel="stylesheet" href="css/css.css">
 	<link rel="stylesheet" href="css/topnav.css">
  <link rel="shortcut icon" href="gambar/logoo.ico">
  <style>

    @media only screen and (max-width: 600px) {
      
      .button{
        display: inline-block;
      width: 30%;

      }
      .button-hijau{
        display: inline-block;
        width: 30%;
      }

}
  </style>
 </head>
 <body>


<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

<!--------------------- KERANJANG ---------------------------------->

 	<section class="konten">
 		<div class="container">
 			<h1>Keranjang Belanja</h1>
 			<hr>
 			<table class="tablee"> 
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Nama Produk</th>
 						<th>harga produk</th>
 						<th>Jumlah Produk</th>
 						<th>Sub harga</th> 
 						<th>Aksi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $nomor=1;?>
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
 						<td>
 							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"> Hapus </a>
 						</td>
 					</tr>
 					<?php $nomor++; ?>
 					<?php endforeach ?>
 				</tbody>
 			</table><br><br>
      <center>
 			<a href="toko.php" class="button-hijau">Lanjutkan Belanja</a>
 			<a href="checkout.php" class="button">Checkout</a>
      </center>
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