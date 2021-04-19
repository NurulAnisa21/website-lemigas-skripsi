<?php include 'config.php'; ?>

<?php 

	$keyword = $_GET["keyword"];
	$semuadata=array();
	$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' 
		OR desk_produk LIKE '%$keyword%'");
	while ($pecah = $ambil->fetch_assoc()) 
	{
		$semuadata[]=$pecah;
	}

	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/topnav.css">
  <link rel="shortcut icon" href="gambar/logoo.ico">

	<style>
	  .navbar-form{
    width: 15%;
    float: right;
    margin-right:60px ;
    padding-right:80px;
    padding-left: 10px;  
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
      width: 10%;
    }
   }
	</style>
</head>
<body>

<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>


<form action="pencarian.php" method="get" class="navbar-form">
  <input type="text" class="form-control" name="keyword" placeholder="Cari">
  <button class="button-hijau">Cari</button>
</form>

	<div class="container">
		<H2>Hasil Pencarian : <?php echo $keyword ?></H2>
		<?php if (empty($semuadata)): ?>
			<div class="alert">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
		<?php endif ?>

		 <div class="roww">

			<?php foreach ($semuadata as $key => $value): ?>

				 <div class="columnn" style="background-image:url(x.jpg)">
            <div class="thumbnail">
              <img src="foto_produk/<?php echo $value['foto_produk']; ?>" style="width:150px">
              <div class="caption">
                <h3><?php echo $value['nama_produk']; ?></h3>
                <h5>Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="button">Beli</a>
                <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="button-hijau">detail</a>
              </div><br><br>
            </div><br><br>

          </div>
			<?php endforeach ?>
		</div>
	</div> 
</body>
</html>