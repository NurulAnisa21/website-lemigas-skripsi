<!DOCTYPE html>
<html>
<head>
	<title>Data Admin</title>
</head>
<body><br>
<center><h2>Data Admin</h2></center><br>
<center>
<table class="tablee">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Nama Lengkap</th>
			<th>Password</th>
			<th>Jenis Kelamin</th>
			<!-- <th>Aksi</th> -->
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?> 
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $_SESSION['admin']['username']; ?></td>
			<td><?php echo $_SESSION['admin']['namalengkap']; ?></td>
			<td><?php echo $_SESSION['admin']['password']; ?></td>
			<td><?php echo $_SESSION['admin']['jenkel']; ?></td>
		
	<!-- 		<td>
				<a href="">Hapus</a> //
				<a href="index.php?halaman=ubahkaryawan&id=<?php echo $pecah['id_karyawan']; ?>">Ubah</a>
			</td> -->
		</tr>
		<?php $nomor++; ?>
		
	</tbody>
</table><br><br></center>
<center>
<!-- <a href="index.php?halaman=tambahkaryawan" class="button-hijau">tambah data</a></center> --><br><br>

</body>
</html>
