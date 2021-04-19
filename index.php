<?php 
  session_start();
  include 'config.php';
  ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/topnav.css">
<link rel="shortcut icon" href="gambar/logoo.ico">
<link rel="stylesheet" href="css/css.css">
<style>
.font{
  width: 100%;
  height: auto;
  margin: auto;
  margin-top: 20px;
  text-align: center;
  color: #ffffff;
}
@media only screen and (max-width: 600px) {
    .column { 
        display: block;
        width: 100%;

    }

    .row{
      display: block;
      width: 100%;
    }
  }
</style>
</head>
<body>





<!--------------------- Menu --------------------------------->
<?php include 'menu.php'; ?>

<!------------------------------- SLIDER FOTO ------------------------------>
<br>
  <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="gambar/KOPERASI1.JPEG" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="gambar/KOPERASI2.jpeg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="gambar/KOPERASI3.jpeg" style="width:100%">
    
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<br><br><br>



<!------------------------ SEJARAH KOPERASI --------------------->
<div class="row">
  <div class="column" style="background-image:url(gambar/bbbb.jpg);">
    <h2><font face="arial"> Sejarah Koperasi Lemigas</h2>
<!--     <p>Koperasi Pegawai Lemigas (KPL) jakarta merupakan koperasi yang anggotanya adalah pegawai Lemigas di Jakarta. Gagasan untuk mendirikan KPL dimulai sejak organisasi lemigas masih berstatus non pegawai negeri.. --> </p></font><br>

     <a href="sejarah.php" class="btn success">Selanjutnya..</a>

  </div>
  <div class="column" style="background-image:url(gambar/bbbb.jpg);">
    <center><br><br><br><img src="gambar/aaaa.png" width="50%" height="50%"></center>
  </div>
</div><br><br><br><br><br>




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





<!-- slider -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


</body>
</html>
