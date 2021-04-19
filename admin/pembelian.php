 <!DOCTYPE html>
<html>
<head>
	<title>Halaman Pembelian</title>
	 <link rel="stylesheet" href="../css/index-admin.css">
</head>
<body><br>
<center><h2>DATA PEMBELIAN</h2></center>
<br>
<center>
<table class="tablee">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN karyawan ON pembelian.id_karyawan=karyawan.id_karyawan"); ?>
	<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>">Detail //</a>

				<?php if ($pecah['status_pembelian']!=="pending"):?> 
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table></center>
</body>
</html>