<?php 
	session_start();
	include 'config.php';
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Koperasi Lemigas</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/topnav.css">
  <link rel="shortcut icon" href="gambar/logoo.ico">
	<style>
.img {
  border: 1px solid #ddd;
  border-radius: 9px;
  padding: 5px;
  width: 150px;
}
  .navbar-form{
    width: 15%;
    float: right;
    margin-right:60px ;
    padding-right:80px;
    padding-left: 10px;  
  }

.thumbnail .img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
@media only screen and (max-width: 600px) {
    .img { 
        display: block;
        width: 100%;
    }
    .navbar-form { 
        display: block;
        width: 90%;
         float: left;
    margin-right:10px ;
    padding-right:10px;

    }
    .thumbnail .img:hover { 
        display: block;
        width: 100%;
    }
    .columnn{
      display: block;
      width: 100%;
    }
    .button{
      display: inline-block;
      width: 40%;
    }
   }
</style>
</head>
<body>

<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

<!--------------------- BARANG  ---------------------------------->
<form action="pencarian.php" class="navbar-form">
   <input type="text" class="form-control" name="keyword" placeholder="Cari">
  <button class="button">Cari</button>
</form><br><br> <br>

	<section class="konten">
		<div class="container">
			<h1>Produk Terbaru</h1>


      
          <section> 
      <div class="roww">

        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while($perproduk = $ambil->fetch_assoc()){ ?>

          <div class="columnn" style="background-image:url(x.jpg)">
            <div class="thumbnail">
              <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" style="width:110px">
              <div class="caption">
                <h3><?php echo $perproduk['nama_produk']; ?></h3>
                <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="button">Beli</a>
                <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="button-hijau">detail</a>
              </div><br>
            </div>

          </div>
          <?php } ?>


      </div>
    </div><br>
  </section><br><br>
       
       

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