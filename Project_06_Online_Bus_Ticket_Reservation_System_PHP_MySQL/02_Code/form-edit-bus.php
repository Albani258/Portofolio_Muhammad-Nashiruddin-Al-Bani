<?php
include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location:list-bus.php');
}

//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM tabel_bus WHERE id_bus='$id'";
$query = mysqli_query($db,$sql);



// jika data yang di-edit tidak ditemukan
if (!$query) {
    die("terjadi kesalahan teknis...");
}

$test = mysqli_num_rows($query);

if(!$test) die("data tidak ditemukan...");

$getData = mysqli_fetch_assoc($query);

?>

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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Groovin</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h4>Edit Bus</h4>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="list-bus.php">Daftar Bus</a></li>
            <li>Edit Bus</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<section class="inner-page">
    <div class="container">
    <!DOCTYPE html>
    <html>
    <head>
        <title>Formulir Edit Bus| PT GOING</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    </head>

    <body>
    <div class="row-center">
        <div class="col-lg-6" style= "display:blok; margin:auto;">
            <div class="card mb-4">
            <div class="card-body"> 
        <form action="proses-edit-bus.php" method="POST">
            <fieldset>
            <p>Form edit data bus</p> 
                <input type="hidden" name="id" value="<?php echo $getData['id'] ?>" />
                <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID Bus </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="idbus" name="idbus" name="idbus" value="<?php echo $getData['id_bus'] ?>" />  
                    </div>
                </div>
            </p>
            <p>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Tipe Kelas</label>
                <div class="col-sm-9">
                    <select type="text"  class="col-sm-9 form-control" name="tipekelas" value="<?php echo $getData['tipe_kelas'] ?>">
                        <option value=""><?php echo $getData['tipe_kelas'] ?></option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="AC Ekonomi">AC Ekonomi</option>
                        <option value="Bisnis Class">Bisnis Class</option>
                        <option value="VIP Class">VIP Class</option>
                        <option value="Executive Class">Executive Class</option>
                        </select>
                </div>
            </div>
            </p>
            <p>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Total Kursi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="totalkursi" placeholder="totalkursi" value="<?php echo $getData['total_kursi'] ?>" />
                </div>
            </div>
            </p>
            <p>
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Nama Bus </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="namabus" placeholder="namabus" value="<?php echo $getData['nama_bus'] ?>" />
                </div>
            </div>
            </p>
            <p>
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" />
            </p>

            </fieldset>       
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
        </body>

    </html>
    </div>
</section>
