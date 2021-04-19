<?php 

	$semuadata=array();
	$tgl_mulai="-";
	$tgl_selesai="-";
		if (isset($_POST["kirim"])) 
		{
			$tgl_mulai = $_POST["tglm"];
			$tgl_selesai = $_POST['tgls'];
			$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN karyawan ON 
				pembelian.id_karyawan=karyawan.id_karyawan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
			while($pecah = $ambil->fetch_assoc()) 
			{
				$semuadata[]=$pecah;
			}

			// echo "<pre>";
			// print_r ($semuadata);
			// echo "</pre>";
		}
?>


<br><br>
<h2><center>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></center></h2> <br>
<hr><br>
<style>
	.column {
  float: left;
  width: 26%;
  padding: 40px;
  height: 150px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
input[type=date] {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
.tablee {
  border-collapse: collapse;
  border-spacing: 0;
  width: 90%;
  border: 1px solid #000;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #000;
}
</style>

<form method="post">
<div class="row">
  <div class="column" style="background-color:#transparent;">
  	<div class="form-group">
  		<label>Tanggal Mulai</label><br><br>
  		<input type="date" class=form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
  	</div>

  </div>
  <div class="column" style="background-color:#transparent;">
    <label>Tanggal Selesai</label><br><br>
  		<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
  </div>
  <div class="column"style="background-color:#transparent;">
  	<label>&nbsp;</label><br><br>
<button class="button" name="kirim">Lihat</button>
  </div>
</div>
</form>
<center>
<table class="tablee">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian'] ?>	
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["pelanggan"]; ?></td>
			<td><?php echo $value["tanggal_pembelian"]; ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]); ?></td>
			<td><?php echo $value["status_pembelian"]; ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table></center><br><br>