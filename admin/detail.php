<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	 <link rel="stylesheet" href="../css/index-admin.css">

</head>
<body><br>
<center><h1>DETAIL PEMBELIAN</h1></center><br>
<hr><br>


<?php 
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN karyawan
		ON pembelian.id_karyawan=karyawan.id_karyawan
		WHERE pembelian.id_pembelian='$_GET[id]'");

	$detail = $ambil->fetch_assoc();
 ?>

<!--  <pre><?php print_r($detail); ?></pre>
 -->



 <br><br>

<!----------------------------- DETAIL --------------------------------> 

<div class="row3">
	<div class="column3">

 
  </div>
  <div class="column3">
  	<h2> Pembelian</h2>
	 	Status Pembelian : <?php echo $detail['status_pembelian']; ?><br>
	 	Tanggal Pembelian : <?php echo $detail['tanggal_pembelian'];  ?><br>
 	Total Pembelian : <?php echo $detail['total_pembelian']; ?>
	<br>
  </div>
  <div class="column3">
  	<h2>Pelanggan</h2>
 <p>
 	     Nama Pelangan : <strong><?php echo $detail['pelanggan']; ?></strong><br>
	 	Nomor telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
	 	Email : <?php echo $detail['email_pelanggan']; ?><br>

 	
 </p>
  </div>
  
</div>



<center>
 <table class="tablee">
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
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk 
   ON pembelian_produk.id_produk=produk.id_produk 
   WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>

   <?php while ($pecah=$ambil->fetch_assoc()) { ?>

 		<tr>
 			<td></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td><?php echo $pecah['harga_produk']; ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>
 				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table></center><br>
 <br>
 
</body>
</html>