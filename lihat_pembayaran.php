<?php 
session_start();
include 'config.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";


//jika belum ada data pembayaran
if (empty($detbay)) 
{
	echo "<script>alert('Belum ada data pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

//jika data pelanggan yang bayar tidak sesuai dengan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($_SESSION["pelanggan"]["id_karyawan"]!==$detbay["id_karyawan"]) 
{
	echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lihat Pembayaran</title>
	<link rel="stylesheet" href="css/topnav.css">
<link rel="stylesheet" href="css/css.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<style>
  @media only screen and (max-width: 600px) {
    .column { 
        display: block;
        width: 100%;

    }

    .row{
      display: block;
      width: 100%;
    }

    .img-responsive{
      width: 100%;
    }
  }
</style>
</head>
<body>
	<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

	<!--------------------- Lihat Pembayaran ---------------------><br><br>
  <h1><center>Lihat Pembayaran</center></h1>

	<div class="container">
		<div class="row">
  <div class="column" >
  	<table class="tablee">
  		<tr>
  			<th>Nama</th>
  			<th><?php echo $detbay["nama"]; ?></th>
  		</tr>
  		<tr>
  			<th>Bank</th>
  			<th><?php echo $detbay["bank"]; ?></th>
  		</tr>
  		<tr>
  			<th>Tanggal</th>
  			<th><?php echo $detbay["tanggal"]; ?></th>
  		</tr>
  		<tr>
  			<th>Jumlah</th>
  			<th>Rp. <?php echo number_format($detbay["jumlah"]); ?></th>
  		</tr>
  	</table>
  </div>
  <div class="column" >
    <center><img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive"></center>
  </div>
</div><br><br><br><br><br>

	</div>

</body>
</html>