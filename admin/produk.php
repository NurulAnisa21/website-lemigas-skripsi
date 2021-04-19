<!DOCTYPE html>
<html>
<head>
    <title>Produk-Admin</title>
    <link rel="stylesheet" href="../css/index-admin.css">
<style>

    @media only screen and (max-width: 600px) {
      
      .button{
        display: inline-block;
      width: 40%;

      }
      .button-hijau{
        display: inline-block;
        width: 40%;
      }

}
  </style>
</head>
<body><br>
<center><h2>PRODUK KOPERASI LEMIGAS</h2></center>
<br />
<center><table class="tablee">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>harga</th>
            <th>Stock</th>
            <th>foto</th>
            <th>Deskripsi Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil =  $koneksi->query ("SELECT * FROM produk");?>
    <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;  ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['stok_produk']; ?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
            </td>
            <td><?php echo $pecah['desk_produk']; ?></td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="button">hapus</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="button-hijau">Ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?> 
        <?php } ?>
    </tbody>
</table><br><br></center>

<center><a href="index.php?halaman=tambahproduk" class="button-hijau">tambah data</a></center>

</body>
</html>
