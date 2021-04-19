<!DOCTYPE html>
<html>
<head>
	<title>Data Karyawan</title>
</head>
<body><br>
<center><h2>Data Karyawan</h2></center><br>
<center>
<table class="tablee">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email	</th>
			<th>Telepone</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM karyawan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href="">Hapus</a> //
				<a href="index.php?halaman=ubahkaryawan&id=<?php echo $pecah['id_karyawan']; ?>">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table><br><br></center>
<center>
<a href="index.php?halaman=tambahkaryawan" class="button-hijau">tambah data</a></center><br><br>

</body>
</html>