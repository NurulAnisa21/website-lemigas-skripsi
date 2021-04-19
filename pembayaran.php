<?php 
  session_start();
  include 'config.php';

  //jika belom login
  if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
  {
  	echo "<script>alert('silahkan login terlebih dahulu');</script>";
  	echo "<script>location='login.php';</script>";
  	exit();
  }

  //mendapatkan id_pembelian url
  $idpem = $_GET["id"];
  $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
  $detpem=$ambil->fetch_assoc();

  // mendapatkan id_karyawan yang beli
  $id_pelanggan_beli = $detpem["id_karyawan"];

  //mendapatkan id karyawan yang login
  $id_pelanggan_login = $_SESSION["pelanggan"]["id_karyawan"];

  if ($id_pelanggan_login !==$id_pelanggan_beli) 
  {
    echo "<script>alert('jangan nakal cok');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
  }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Pembayaran</title>
    <link rel="stylesheet" href="css/topnav.css">
<link rel="stylesheet" href="css/css.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<style>
      
input[type=text], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
    </style>
  </head>
  <body>


<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

<!--------------------- Pembayaran --------------------------->
<div class="container">
    <h2> Konfirmasi Pembayaran</h2>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php  echo number_format($detpem["total_pembelian"]); ?></strong></div><br>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group"> 
          <label> Nama Penyetor</label><br>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group"> 
            <label> Bank </label><br>
            <input type="text" name="bank" class="form-control">
        </div>
        <div class="form-group"> 
            <label> Jumlah </label><br>
            <input type="text" name="jumlah" class="form-control" min="1">
        </div><br>
        <div class="form-group"> 
            <label> Foto Bukti </label>
            <input type="file" name="bukti" class="form-control">
        </div><br>
        <button name="kirim" class="button"> Kirim </button>
    </form>
</div>

<?php  

    //jika ada tombol kirim 
    if (isset($_POST["kirim"])) 
    {
      $namabukti = $_FILES["bukti"]["name"];
      $lokasibukti = $_FILES["bukti"]["tmp_name"];
      $namafiks = date(YmdHis).$namabukti;
      move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

      $nama = $_POST["nama"];
      $bank = $_POST["bank"];
      $jumlah = $_POST["jumlah"];
      $tanggal = date("Y-m-d");

      $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

      //update pending menjadi sudah kirim pembayaran
      $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' 
        WHERE id_pembelian='$idpem'");

      echo "<script>alert('terimakasih sudah mengirimkan bukti pembayaran');</script>";
      echo "<script>location='riwayat.php';</script>";
    }

?>
  </body>
  </html>