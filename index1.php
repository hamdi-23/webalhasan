<?php require_once("koneksi.php");
$data = mysqli_query($con, "SELECT * FROM resto");
$dataTopLima = mysqli_query($con, "SELECT menu.`nama`, menu.`deskripsi`, menu.`foto`, jenis_menu.`jenis` AS jenis, top_lima.`id` AS top5 
FROM menu, jenis_menu, top_lima
WHERE menu.`id_jenis_menu`=jenis_menu.`id`
AND menu.`id`=top_lima.`id_menu` ORDER BY top5 LIMIT 5;");


$dataPromo1 = mysqli_query($con, "SELECT tipe.`tipe` AS tp, promo_pengumuman.`foto`, promo_pengumuman.`id`,
promo_pengumuman.`deskripsi`, promo_pengumuman.`judul`,
promo_pengumuman.`tanggal_mulai`,promo_pengumuman.`tanggal_selesai`
FROM tipe, promo_pengumuman WHERE promo_pengumuman.`id_tipe`=tipe.`id` 
ORDER BY promo_pengumuman.`id` DESC LIMIT 1");

$dataPromo2 = mysqli_query($con, "SELECT tipe.`tipe` AS tp, promo_pengumuman.`foto`, promo_pengumuman.`id`,
promo_pengumuman.`deskripsi`, promo_pengumuman.`judul`, 
promo_pengumuman.`tanggal_mulai`,promo_pengumuman.`tanggal_selesai`
FROM tipe, promo_pengumuman WHERE promo_pengumuman.`id_tipe`=tipe.`id` 
ORDER BY promo_pengumuman.`id` DESC LIMIT 1,1");

$dataPromo3 = mysqli_query($con, "SELECT tipe.`tipe` AS tp, promo_pengumuman.`foto`, promo_pengumuman.`id`,
promo_pengumuman.`deskripsi`, promo_pengumuman.`judul`, 
promo_pengumuman.`tanggal_mulai`,promo_pengumuman.`tanggal_selesai`
FROM tipe, promo_pengumuman WHERE promo_pengumuman.`id_tipe`=tipe.`id` 
ORDER BY promo_pengumuman.`id` DESC LIMIT 2,1");

$dataGallery = mysqli_query($con, "SELECT * FROM gallery ORDER BY id DESC LIMIT 8;");
$dataOperasional = mysqli_query($con, "SELECT * FROM operasional ;");
$dataTestimoni = mysqli_query($con, "SELECT * FROM testimoni ORDER BY id DESC LIMIT 6;");

$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");
$active = true;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dunia Kita Cafe & Resto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./public/assets/img/logo-icon.png" rel="icon" alt="dunia-kita cafe & resto">
  <link href="./public/assets/img/logo-icon.png" rel="apple-touch-icon" alt="dunia-kita cafe & resto">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="./public/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./public/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./public/assets/css/custom.css">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <?php foreach ($data as $row) : ?>
          <i class="icofont-phone"></i> <?= $row['hp']; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.php"><?= $row['nama']; ?></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="./public/assets/img/logo-h-w.png" alt="dunia-kita cafe & resto" class="img-fluid"></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#promo">Promo</a></li>
          <li><a href="#specials">Specials Menu</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Location</a></li>
          <li class="book-a-table text-center"><a href="menu.php#menu">Check Menu</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php foreach ($data as $row) : ?>
    <section id="hero" class="d-flex align-items-center" style="background: url('./public/assets/images/background/<?= $row['foto_bg']; ?>') top center;">
      <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-8">
            <h1>Welcome to <span><?= $row['nama']; ?> <br> Cafe & Resto</span></h1>
            <h2> <?= $row['tagline']; ?></h2>
            <div class="btn">
              <a href="#specials" class="btn-menu animated fadeInUp scrollto">Special Menu Kami</a>
              <!-- <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a> -->
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
            <a href=" <?= $row['link_video']; ?>" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </section><!-- End Hero -->

    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about" style="background: url('./public/assets/img/about.jpg') center center;">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
              <div class="about-img">
                <img src="./public/assets/images/profil/<?= $row['foto_profil']; ?>" alt="dunia-kita cafe & resto">
              </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>Deskripsi resto.</h3>
              <p class="font-italic">
                <?= $row['deskripsi']; ?>
              </p>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <!-- Modal For Promo -->

      <?php foreach ($dataPromo1 as $dp1) :  ?>
        <div class="modal fade bd-example-modal-lg" id="promo-1" tabindex="-1" role="dialog" aria-labelledby="promo-1">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-bg">
              <div class="modal-header">
                <h6 class="modal-title text-dark">
                  <?= $dp1['judul']; ?>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="w-100 text-center text-dark">
                  <?= $dp1['tp']; ?>
                </h4>
                <h6 class="w-100 text-center text-dark">
                  <?= date('d F Y', strtotime($dp1['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp1['tanggal_selesai'])); ?>
                </h6>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-modal">
                      <img src="./public/assets/img/promo/<?= $dp1['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-modal">
                      <h5 class="tgl-promo">
                        <?= date('d F Y', strtotime($dp1['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp1['tanggal_selesai'])); ?>
                      </h5>
                      <p class="text-dark detail-promo">
                        <?= $dp1['deskripsi']; ?>dataTopLima
                        @duniakitacaferesto
                        <?php foreach ($data as $row) : ?>
                          📍 <?= $row['alamat']; ?>
                          ☎️ <?= $row['hp']; ?>
                        <?php endforeach; ?>
                        <br>
                        "Lets be happy together"
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php foreach ($dataPromo2 as $dp2) :  ?>
        <div class="modal fade bd-example-modal-lg" id="promo-2" tabindex="-1" role="dialog" aria-labelledby="promo-2">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-bg">
              <div class="modal-header">
                <h6 class="modal-title text-dark">
                  <?= $dp2['judul']; ?>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="w-100 text-center text-dark">
                  <?= $dp2['tp']; ?>
                </h4>
                <h6 class="w-100 text-center text-dark">
                  <?= date('d F Y', strtotime($dp2['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp2['tanggal_selesai'])); ?>

                </h6>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-modal">
                      <img src="./public/assets/img/promo/<?= $dp2['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-modal">
                      <h5 class="tgl-promo">
                        <?= date('d F Y', strtotime($dp2['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp2['tanggal_selesai'])); ?>
                      </h5>
                      <p class="text-dark detail-promo">
                        <?= $dp2['deskripsi']; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php foreach ($dataPromo3 as $dp3) :  ?>
        <div class="modal fade bd-example-modal-lg" id="promo-3" tabindex="-1" role="dialog" aria-labelledby="promo-3">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-bg">
              <div class="modal-header">
                <h6 class="modal-title text-dark">
                  <?= $dp3['judul']; ?>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="w-100 text-center text-dark">
                  <?= $dp3['tp']; ?>
                </h4>
                <h6 class="w-100 text-center text-dark">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="box-modal">
                        <img src="./public/assets/img/promo/<?= $dp3['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box-modal">
                        <!-- <h5 class="tgl-promo">
                      Valid 5 Sep 2022 – 30 Sep 2022
                    </h5>            -->
                        <p class="text-dark detail-promo">
                          <?= $dp3['deskripsi']; ?>
                          Jam operasional<?= $row['nama']; ?> Cafe & Restaurant:
                          16.00-23.00
                          <br>
                          Terima kasih
                        </p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- End Modal For Promo -->

      <!-- ======= Promo & Pengumuman Section ======= -->
      <section id="promo" class="promo">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Info Terbaru</h2>
            <p>Selalu Ada Promonya</p>
          </div>
          <?php foreach ($dataPromo1 as $dp1) :  ?>
            <div class="row">
              <div class="col-lg-4">
                <a type="button" data-toggle="modal" data-target="#promo-1">
                  <div class="box" data-aos="zoom-in" data-aos-delay="100">
                    <span><?= $dp1['judul']; ?></span>
                    <img src="./public/assets/img/promo/<?= $dp1['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    <h5><?= date('d F Y', strtotime($dp1['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp1['tanggal_selesai'])); ?></h5>
                    <p><?= substr($dp1['deskripsi'], 0, 20); ?></p>
                    <br>
                    <p>Baca Selengkapnya . . . . .</p>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>

            <?php foreach ($dataPromo2 as $dp2) :  ?>
              <div class="col-lg-4 mt-4 mt-lg-0">
                <a type="button" data-toggle="modal" data-target="#promo-2">
                  <div class="box" data-aos="zoom-in" data-aos-delay="200">
                    <span><?= $dp2['judul']; ?></span>
                    <img src="./public/assets/img/promo/<?= $dp2['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    <h5><?= date('d F Y', strtotime($dp2['tanggal_mulai'])) . " - " . date('d F Y', strtotime($dp2['tanggal_selesai'])); ?></h5>
                    <p><?= substr($dp2['deskripsi'], 0, 20); ?></p>
                    <br>
                    <p>Baca Selengkapnya . . . . .</p>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>

            <?php foreach ($dataPromo3 as $dp3) :  ?>
              <div class="col-lg-4 mt-4 mt-lg-0">
                <a type="button" data-toggle="modal" data-target="#promo-3">
                  <div class="box" data-aos="zoom-in" data-aos-delay="300">
                    <span><?= $dp3['judul'] ?></span>
                    <img src="./public/assets/img/promo/<?= $dp3['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    <h5><?= date('d F Y', strtotime($dp3['tanggal_mulai'])); ?></h5>
                    <p><?= substr($dp3['deskripsi'], 0, 20); ?></p>
                    <br>
                    <p>Baca Selengkapnya . . . . .</p>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
            </div>

        </div>
      </section><!-- End Promo & Pengumuman Section -->

      <!-- ======= Specials Section ======= -->
      <section id="specials" class="specials section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Special Menu</h2>
            <p>Check Special Menu Kami</p>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">

              <ul class="nav nav-tabs flex-column">
                <?php foreach ($dataTopLima as $i => $dt) :  ?>
                  <li class="nav-item">
                    <a class="nav-link  <?php echo $i == 0 ? "active" : ""; ?>" data-toggle="tab" href="#tab-<?= $i + 1; ?>"><?= $dt['jenis']; ?></a>
                  </li>
                <?php $active = false;
                endforeach; ?>
              </ul>

            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">
                <?php foreach ($dataTopLima as $i => $dt) :  ?>
                  <div class="tab-pane <?php echo $i == 0 ? "active" : ""; ?>" id="tab-<?= $i + 1; ?>">
                    <div class="row">
                      <div class="col-lg-8 details order-2 order-lg-1">
                        <h3><?= $dt['nama']; ?></h3>
                        <p class="font-italic"><?= $dt['deskripsi']; ?></p>
                      </div>
                      <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="./public/assets/img/menu/<?= $dt['foto']; ?>" alt="dunia-kita cafe & resto" class="img-special-menu">
                      </div>
                    </div>
                  </div>
                <?php $active = false;
                endforeach; ?>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Specials Section -->

      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery">

        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Gallery</h2>
            <p>Some photos from Our Restaurant</p>
          </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

          <div class="row no-gutters">
            <?php foreach ($dataGallery as $dg) :  ?>

              <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                  <a href="./public/assets/img/gallery/<?= $dg['foto']; ?>" class="venobox" data-gall="gallery-item">
                    <img src="./public/assets/img/gallery/<?= $dg['foto']; ?>" alt="dunia-kita cafe & resto" class="img-fluid">
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="./public/assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                  <img src="./public/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div> -->

          </div>

        </div>
      </section><!-- End Gallery Section -->

      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Testimonials</h2>
            <p>What they're saying about us</p>
          </div>

          <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
            <?php foreach ($dataTestimoni as $dtes) :  ?>
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $dtes['testimoni']; ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="./public/assets/img/logo-icon.png" class="testimonial-img" alt="dunia-kita cafe & resto">
                <h3><?= $dtes['nama']; ?></h3>
              </div>
            <?php endforeach; ?>
            <!-- <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="./public/assets/img/logo-icon.png" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logo-icon.png" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="./public/assets/img/logo-icon.png" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
            </div> -->

            <!-- <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
          
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>

              </p>
              <img src="./public/assets/img/logo-icon.png" class="testimonial-img" alt="">
              <h3>John Larson</h3>
            </div> -->

          </div>

        </div>
      </section><!-- End Testimonials Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Location</h2>
            <p>Location</p>
          </div>
        </div>

        <div data-aos="fade-up">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.181283297336!2d110.40756271500551!3d-7.770592479235267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b0aefaf207%3A0x48d158a2aeb178af!2sDunia%20Kita%20Cafe%20%26%20Restaurant!5e0!3m2!1sid!2sid!4v1669279564410!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <?php foreach ($data as $row) : ?>
                    <p>
                      <?= $row['alamat']; ?>
                    </p>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="icofont-clock-time icofont-rotate-90"></i>
                  <h4>Open Hours:</h4>
                  <?php foreach ($dataOperasional as $do) : ?>
                    <p>
                      <?= $do['hari'] . " : " . date("H:i", strtotime($do['jam_buka'])) . " - " . date("H:i", strtotime($do['jam_tutup']))  ?>
                    </p>
                  <?php endforeach; ?>
                </div>

              </div>

            </div>

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <?php foreach ($data as $d) : ?>
                    <p><?= $d['hp'] ?></p>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>

          </div>

        </div>
      </section>
      <!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6">
              <div class="footer-info">
                <img src="./public/assets/img/logo-h.png" class="img-fluid w-75" alt="dunia-kita cafe & resto">
                <p class="mt-3">
                  <?php foreach ($data as $row) : ?>
                    <?= $row['alamat']; ?>
                  <?php endforeach; ?>
                  <br>
                </p>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#specials">Specials</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
              </ul>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Phone</h4>
              <ul>
                <?php foreach ($data as $d) : ?>
                  <li><i class="bx bxl-whatsapp mr-1"></i><a href="#">0<?= number_format($d['hp'], 0, ",", "-"); ?></a></li>
                <?php endforeach; ?>

              </ul>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Jam Buka</h4>
              <ul>
                <?php foreach ($dataOperasional as $do) : ?>
                  <li><i class="bx bx-time mr-1"></i> <a href="#"><?= $do['hari'] . " : " . date("H:i", strtotime($do['jam_buka'])) . "-" . date("H:i", strtotime($do['jam_tutup'])) ?> </a></li>
                <?php endforeach; ?>

              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Sosial Media</h4>
              <div class="social-links">
                <?php foreach ($dataSosialMedia as $medsos) : ?>
                  <a href="<?= $medsos['link'] ?>" class="<?= $medsos['nama'] ?>"><i class="bx bxl-<?= $medsos['nama'] ?>"></i></a>
                <?php endforeach; ?>
                <!-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a> -->
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Dunia Kita</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://horus.co.id">PT Horus Technology</a>
        </div>
      </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="./public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="./public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./public/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="./public/assets/vendor/php-email-form/validate.js"></script>
    <script src="./public/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="./public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="./public/assets/vendor/venobox/venobox.min.js"></script>
    <script src="./public/assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="./public/assets/js/main.js"></script>

</body>

</html>