<?php 
  session_start();
  include 'config.php';
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Karyawan</title>
  <link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/topnav.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<style>
  @media only screen and (max-width: 600px) {
    .container{
      display: block;
      width: 90%;
    }
    .model-content {
      display: block;
      width: 100%;
    }
  }
</style>
</head>
<body>
 
<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

  <!--------------------- LOGIN  ---------------------------------->
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
    
      <img src="gambar/ava.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="email"  required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required><br><br>
        
      <button class="button-hijau" type="submit" name="login">Login</button>
     
    </div>

    <div class="container" style="background-color:#4CAF50">
    
    </div>
  </form>

  <!-- SCRIPT PHP LOGIN -->
  <?php 
    //jika tombol simpan ditekan

  if (isset($_POST["login"]))
    { 
  $email = $_POST["email"];
  $password = $_POST["password"];
  
    $ambil = $koneksi->query ("SELECT * FROM karyawan 
      WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    $akuncocok = $ambil->num_rows; 

    if ($akuncocok==1) 
    {
     //anda berhasil login
      $akun = $ambil->fetch_assoc();
      $_SESSION["pelanggan"] = $akun;

      echo "<script>alert('Anda berhasil login');</script>";

      //jika sudah belanja 
      if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
      {
        echo "<script>location='checkout.php';</script>";
      }
      else
      {
        echo "<script>location='riwayat.php';</script>";
      }
      
    }
    else
    {
      //anda gagal login
      echo "<script>alert('Anda gagal login');</script>";
      echo "<script>location='index.php';</script>";
    }
    }
   ?>

    <!----------------------- Footer -------------------------------->
<div class="footer-main-div">
  <div class="footer-social-icons">
    <ul>
      <li><a href="#" target="blank"><i class="fa fa-facebook"><img src="gambar/facebook.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-twitter"><img src="gambar/twitter.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-instagram"><img src="gambar/instagram.png"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-youtube"><img src="gambar/youtube.png"></i></a></li>
    </ul>
  </div>
  <div class="footer-menu-satu">
    <ul>
      <li><a href="">Tentang Kami</a></li>
      <li><a href="">Service</a></li>
      <li><a href="">Products</a></li>
      <li><a href="">Contact Us</a></li>  
    </ul>
  </div>
  <div class="footer-alamat">
    Jl. Ciledug Raya No.Kavling 109, RT.7/RW.5, Cipulir, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230
  </div>
</div>

</body>
</html>