<?php session_start(); ?>
<?php include 'config.php';?>
<?php 
	//mendapatkann id produk
	$id_produk = $_GET["id"];

	//ambil data
	$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$detail = $ambil->fetch_assoc();

	// echo "<pre>";
	// print_r($detail);
	// echo "</pre>";
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/topnav.css">
  <link rel="shortcut icon" href="gambar/logoo.ico">

</head>
<body>

<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>
<!---------------------------- DETAIL PRODUK -------------------------->
<div class="kontent">
	<div class="row">
  <div class="column">
  	<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img" height="80%" width="80%">
  </div>
  <div class="column">
  	<h2><?php echo $detail["nama_produk"]; ?></h2>
  	<h4>Rp.<?php echo number_format($detail["harga_produk"]); ?></h4>

    <h5> Stok : <?php  echo $detail['stok_produk']; ?> </h5>


  	<form method="post">
  		<div class="form-group">
  			<div class="input-group">
  				<!-- <input type="number" min="1" class="form-control" name="jumlah" max="<?php  echo $detail['stok_produk'] ?>">
  				<div class="btn">
  					<button class="button-hijau" name="beli">beli</button>
  				</div> -->
  			</div>
  		</div>
  	</form>

  	<?php 
  	if (isset($_POST["beli"]))
  	{
  		//menadapatkan jumlah yang diinputkan
  		$jumlah = $_POST["jumlah"];

  		//masukkan dikeranjang 
  		$_SESSION["keranjang"][$id_produk] = $jumlah;

  		echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
  		echo "<script>location='keranjang.php';</script>";

  	}
  	?>
  	<h4><?php echo $detail["desk_produk"]; ?></h4>
  </div>
	
</div>




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