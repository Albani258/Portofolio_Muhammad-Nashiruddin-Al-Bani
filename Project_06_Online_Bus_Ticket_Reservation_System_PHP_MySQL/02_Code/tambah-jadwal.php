<?php include("config.php"); ?><?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Pemesanan Tiket Bus Online| PT GOING</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Groovin - v4.10.0
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">PT GOING</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="list-jadwal.php">Jadwal</a></li>
          <li class="dropdown"><a href="#"><span>Maintanace</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="list-jadwal.php">Daftar Jadwal</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>  -->
              <li><a href="list-kota.php">Daftar Kota</a></li>
              <li><a href="list-penumpang.php">Daftar Penumpang</a></li>
              <li><a href="list-admin.php">Daftar Admin</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="list-transaksi.php">Book Now</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!DOCTYPE html>
<html>
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Tambah Jadwal</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="list-Jadwal.php">Daftar Jadwal</a></li>
            <li>Tambah Jadwal</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        <?php include("config.php"); ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Pemesanan Tiket Bus Online| PT GOING</title>
                <link rel="stylesheet" href="css/bootstrap.min.css" />
            </head>



<?php
    // membuat id jadwal secara otomatis

    $getId = mysqli_query($db, "SELECT max(id_jadwal) as idTerbesar FROM tabel_jadwal");
    $data = mysqli_fetch_array($getId);
    $idjadwal = $data['idTerbesar'];
    // mengambil angka dari id jadwal terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($idjadwal, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk id jadwal baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan id huruf yang kita inginkan, misalnya BRG 
	$huruf = "SC";
	$idjadwal = $huruf . sprintf("%03s", $urutan);
?>
<?php
  // $Id = mysqli_fetch_array(mysqli_query($db, "SELECT b.id_bus FROM  tabel_jadwal AS j, tabel_bus AS b WHERE j.id_bus="id_bus"); -->
  // $idbus = $Id[0];
  // $namabus = mysqli_fetch_array(mysqli_query($db, "SELECT b.nama_bus FROM  tabel_jadwal AS j, tabel_bus AS b WHERE b.id_bus='$idbus'")); | <required="required" value="<?php echo $namabus[0]
?>

<body>
    <header>
        <h3>Tambah Daftar Jadwal</h3>
    </header>

    <form action="proses-tambah-jadwal.php" method="POST">

        <fieldset>

        <p>
            <label for="nama">ID Jadwal</label>
            <input type="text" name="idjadwal" required="required" value="<?php echo $idjadwal ?>" readonly>
        </p>
        <p>
            <label for="nama">ID Bus</label>
            <select name="idbus" id="idbus"> <br />
            <?php 
                $id= mysqli_query ($db, "SELECT id_bus FROM tabel_bus");
            ?>
			<option value="">--Pilih Bus--</option>
            <?php while($idbus = mysqli_fetch_array($id)) { ?>
            <option value="<?php echo $idbus[0] ?>"> <?php echo $idbus[0] ?> </option>
            <?php } ?>
			</select>
		</p>
        <p>
            <label for="nama">Kota Keberangkatan</label>
            <input type="text" name="kotakeberangkatan" placeholder="Kota Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Tanggal Keberangkatan</label>
            <input type="date" name="tglkeberangkatan" placeholder="Tanggal Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Waktu Keberangkatan</label>
            <input type="text" name="waktukeberangkatan" placeholder="Waktu Keberangkatan"/>
        </p>
        <p>
            <label for="nama">Kota Tujuan</label>
            <input type="text" name="kotatujuan" placeholder="Kota Tujuan"/>
        </p>
        <p>
            <label for="nama">Tanggal Tiba</label>
            <input type="date" name="tgltiba" placeholder="Tanggal Tiba"/>
        </p>
        <p>
            <label for="nama">Waktu Tiba</label>
            <input type="text" name="waktutiba" placeholder="Waktu Tiba"/>
        </p>
        <p>
            <label for="nama">Harga Tiket</label>
            <input type="text" name="hargatiket" placeholder="Harga Tiket"/>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>

    </body>
</html><!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Groovin</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Groovin</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="vendor/select2/dist/js/select2.min.js"></script>

</body>

</html>