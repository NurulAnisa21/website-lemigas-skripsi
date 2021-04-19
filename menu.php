

<!--------------------- MENU ---------------------------------->
<div class="containeer">
  <img src="gambar/www.jpeg" alt="" style="width:100%;">
  <div class="text-blockk">
</div></div>

<div class="topnav" id="myTopnav">
  <a href="index.html">Beranda</a>
  <a href="koperasi.php">Koperasi</a>
  <a href="keranjang.php">Keranjang</a>
  <a href="checkout.php">Pembayaran</a>
  <a href="riwayat.php">Riwayat Pembelian</a>

  <!-- jika sudah login -->
  <?php if (isset($_SESSION["pelanggan"])):?>
  <a href="logout.php">Keluar</a>
  <!-- jika belom login -->
  <?php else : ?>
  <a href="login.php">Masuk</a>
<?php endif ?>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"><img src="gambar/bar.png" height="20%" width="10px"></i>
  </a>
</div>
   


<!-- TOPNAV -->
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
