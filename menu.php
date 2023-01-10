<?php require_once("koneksi.php");
$data = mysqli_query($con, "SELECT * FROM resto");

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

$dataTopLima = mysqli_query($con, "SELECT menu.`nama`, menu.`deskripsi`, menu.`foto`, jenis_menu.`jenis` AS jenis, top_lima.`id` AS top5 
FROM menu, jenis_menu, top_lima
WHERE menu.`id_jenis_menu`=jenis_menu.`id`
AND menu.`id`=top_lima.`id_menu` ORDER BY top5 LIMIT 5;");
$dataOperasional = mysqli_query($con, "SELECT * FROM operasional ;");


$dataJenis = mysqli_query($con, "SELECT * FROM jenis_menu");
$dataMenu = mysqli_query($con, "SELECT menu.`deskripsi` ,menu.`harga`,menu.`foto`, menu.`nama`, jenis_menu.`jenis` AS jm , menu.`id_jenis_menu` AS jenisMenu
FROM menu INNER JOIN jenis_menu ON menu.`id_jenis_menu`= jenis_menu.`id` ORDER BY jm");
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

      <!-- <h1 class="logo mr-auto"><a href="index.html">DUNIA KITA</a></h1> -->
      <a href="index.php" class="logo mr-auto"><img src="./public/assets/img/logo-h-w.png" alt="dunia-kita cafe & resto" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#specials">Specials Menu</a></li>
          <li><a href="#promo">Promo</a></li>
          <li><a href="#menu">Menu</a></li>
          <li class="book-a-table text-center"><a href="#menu">Check Menu</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <section id="specials" class="pt-5">
    <main id="main" class="pt-lg-5 mt-4">
      <!-- ======= Specials Section ======= -->
      <section class="specials section-bg">
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
                  <?= $dp1['tanggal_mulai']; ?> – <?= $dp1['tanggal_selesai']; ?>
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
                        <?= $dp1['tanggal_mulai']; ?> – <?= $dp1['tanggal_selesai']; ?>
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
                  5 Sep 2022 – 30 Sep 2022
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
                        <?= $dp2['tanggal_mulai']; ?> – <?= $dp2['tanggal_selesai']; ?>
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
                  <?= $dp3['tanggal_mulai']; ?> – <?= $dp3['tanggal_selesai']; ?>
                </h6>
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
                    <h5><?= $dp1['tanggal_mulai'] . " - " . $dp1['tanggal_selesai']; ?></h5>
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
                    <h5><?= $dp2['tanggal_mulai'] . " - " . $dp2['tanggal_selesai']; ?></h5>
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
                    <span><?= $dp3['judul']; ?></span>
                    <img src="./public/assets/img/promo/<?= $dp3['foto']; ?>" class="img-fluid" alt="dunia-kita cafe & resto">
                    <h5><?= $dp3['tanggal_mulai']; ?></h5>
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

      <!-- ======= Menu Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                <?php foreach ($dataJenis as $dj) : ?>
                  <li data-filter=".filter-<?= $dj['jenis']; ?>"><?= $dj['jenis']; ?></li>
                <?php endforeach; ?>
                <!-- <li data-filter=".filter-salads">Salads</li>
                <li data-filter=".filter-specialty">Specialty</li>
                <li data-filter=".filter-drink">Drink</li> -->
              </ul>
            </div>
          </div>

          <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($dataMenu as $dm) : ?>
              <div class="col-lg-6 menu-item filter-<?= $dm['jm']; ?>">
                <img src="./public/assets/img/menu/<?= $dm['foto']; ?>" class="menu-img" alt="dunia-kita cafe & resto">
                <div class="menu-content">
                  <a href="#"><?= $dm['nama']; ?></a><span>Rp <?= number_format($dm['harga'], 0, ",", "."); ?>,-</span>
                </div>
                <div class="menu-ingredients">
                  <?= $dm['deskripsi']; ?>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- <div class="col-lg-6 menu-item filter-specialty">
              <img src="./public/assets/img/menu/ARROZ ROJO FRIED RICE.png" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">ARROZ ROJO FRIED RICE</a><span>Rp 35.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-starters">
              <img src="./public/assets/img/menu/BOLOGNAISE.png" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">BOLOGNAISE</a><span>Rp 39.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img src="./public/assets/img/menu/CARBONARA.png" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">CARBONARA</a><span>Rp 37.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-specialty">
              <img src="./public/assets/img/menu/CHICKEN MOZA.png" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">CHICKEN MOZA</a><span>Rp 42.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-starters">
              <img src="./public/assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">CARBONARA</a><span>Rp 37.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img src="./public/assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">CHICKEN MOZA</a><span>Rp 42.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-salads">
              <img src="./public/assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">ANGSIO TOFU SET</a><span>Rp 37.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-specialty">
              <img src="./public/assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">CHICKEN MOZA</a><span>Rp 42.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div>

            <div class="col-lg-6 menu-item filter-drink">
              <img src="./public/assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">ANGSIO TOFU SET</a><span>Rp 37.000,-</span>
              </div>
              <div class="menu-ingredients">
                bahan pokok yang digunakan atau deskkripsi singkat tentang makanan
              </div>
            </div> -->
          </div>
        </div>
      </section><!-- End Menu Section -->


    </main><!-- End #main -->
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <img src="./public/assets/img/logo-h.png" class="img-fluid w-75" alt="dunia-kita cafe & resto">
              <p class="mt-3">
                Jalan Seturan Raya No.168 A <br>
                Daerah Istimewa Yogyakarta 55281 <br>
                Indonesia
                <br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Special Menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#promo">Promo</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Gallery</a></li> -->
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Phone</h4>
            <ul>
              <li><i class="bx bxl-whatsapp mr-1"></i> <a href="#"><?= $row['hp']; ?></a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Jam Buka</h4>
            <ul>
              <?php foreach ($dataOperasional as $do) : ?>
                <li><i class="bx bx-time mr-1"></i> <a href="#"> <a href="#"> <?= $do['hari'] . " : " . date("H:i", strtotime($do['jam_buka'])) . "-" . date("H:i", strtotime($do['jam_tutup']))  ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sosial Media</h4>
            <div class="social-links">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
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