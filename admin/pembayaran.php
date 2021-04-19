<br><br><center><h2>Data Pembayaran</h2></center><br><br>
<style>
      
input[type=text], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
.tablee{font-size: 16px;
}
  .tablee th{
width: 20%;
border-right: 1px solid #000;
border-left: 1px solid #000;
border-top: 1px solid #000;
border-bottom: 1px solid #000;
}
    </style>

<?php 
	
	//mendapatkan id pembelian
$id_pembelian = $_GET['id'];

//mengambil data pembayaran
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<center>
<!------------------------ Bukti Pembayaran --------------------->
<div class="row">
  <div class="column">
  	<table class="tablee">
  		<tr>
  			<th> Nama </th>
  			<th> <?php echo $detail['nama']; ?> </th>
  		</tr><br>
  		<tr>
  			<th>Bank</th>
  			<th><?php echo $detail['bank']; ?></th>
  		</tr>
  		<tr>
  			<th>Jumlah</th>
  			<th><?php echo number_format($detail['jumlah']); ?></th>
  		</tr>
      <tr>
        <th>Tanggal</th>
        <th><?php echo $detail['tanggal']; ?></th>
      </tr>
  	</table>
  </div>
  <div class="column">
    <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" width="70%" height="70%">
  </div>
</div>
</center>

<!----------------------------- STATUS PENGIRIMAN ------------------------------>
<center>
<form method="post">
  <div class="form-group">
    <label>Pengiriman</label><br>
    <input type="text" name="resi" class="form-control">
  </div><br>
  <div class="form-group">
    <label>Status</label><br>
    <select class="form-control" name="status">
      <option value="">Pilih</option>
      <option value="barang sudah diterima">Barang sudah diterima</option>
      <option value="barang sudah diambil">Barang sudah diambil</option>
      <option value="barang sedang dikirim">Barang sudah dikirim</option>
      <option value="barang diambil sendiri">Barang Barang diambil sendiri</option>
      <option value="batal">Batal</option>
    </select>
  </div>
  <button class="button-hijau" name="proses">Proses</button>
</form>
<?php 
  if (isset($_POST["proses"])) 
  {
    $resi = $_POST["resi"];
    $status = $_POST["status"];

    $koneksi->query("UPDATE pembelian SET pengiriman='$resi', status_pembelian='$status'
      WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data pembelian terupdate')</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>" ;

  }
?>
</center>