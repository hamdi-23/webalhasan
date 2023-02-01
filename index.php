<?php require_once("koneksi.php");


$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$kataSantri = mysqli_query($con, "SELECT * FROM katasantri");
$dataSejarah = mysqli_query($con, "SELECT * FROM sejarah");
$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan ORDER BY id DESC LIMIT 6");
$dataGallery = mysqli_query($con, "SELECT * FROM gallery ORDER BY id DESC LIMIT 20;");

$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");

$title = "Pondok pesantren Al-Hasan";

$dataPendaftaran = query("SELECT sekolah.`tingkat` AS sekolah, pendaftaran.`foto`,pendaftaran.`nama`,pendaftaran.`alamat`,pendaftaran.`id_sekolah`
,pendaftaran.`tgl_masuk`,pendaftaran.`jenis_kelamin`,pendaftaran.`id` FROM pendaftaran INNER JOIN `sekolah` ON
 sekolah.`id`=pendaftaran.`id_sekolah`");

$sekolah = query("SELECT * FROM sekolah ");

$vidUrl = "https://www.youtube.com/watch?v=LqYIKYEnX7Y&list=RD6j928wBZ_Bo&index";
$coverted = str_replace("watch?v=", "embed/", $vidUrl);

// var_dump($data["alamat"]);
if (isset($_POST['submit'])) {



  if (pendaftar_baru($_POST) > 0) {
    echo
    "
		  <script>
		  alert('Terima Kasih Anda Berhasil Mendaftar');
		  document.location.href = 'index.php';  
		  </script>
		  ";
  } else {
    echo "
		  <script>
		  alert('data gagal ditambah');  
		  </script>
		  ";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pondok Pesantren Al-Hasan</title>

  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/bootstrap-icons.css" rel="stylesheet">

  <link href="css/templatemo-leadership-event.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="./public/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./public/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="./public/assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="./css/style.css" rel="stylesheet">

  <style>
    .mySlides {
      display: none;
    }
  </style>

  <!--

TemplateMo 575 Leadership Event

https://templatemo.com/tm-575-leadership-event

-->
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="index.php" class="navbar-brand mx-auto mx-lg-0">
        <?php foreach ($dataProfil as $dp) : ?>
          <img src="./public/assets/images/profil/<?= $dp['foto_profil'] ?>" alt="Pondok pesantren Al-Hasan" class="img-fluid" style="width: 40px; height: 40px; ">
          <span class="brand-text" style="color: greenyellow;">PONDOK PESANTREN <br><?= $dp['nama'] ?></span>
        <?php endforeach; ?>
      </a>
      <a class="nav-link custom-btn btn d-lg-none" href="#section_6">Daftar</a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_1">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_2"> Tentang Al-Hasan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_3">Kegiatan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_4">Galeri Al-Hasan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_5">Alamat</a>
          </li>

          <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_6">Pendaftaran</a>
          </li>
        </ul>
      </div>
  </nav>
  <main>
    <?php foreach ($dataProfil as $dp) : ?>
      <section class="hero" id="section_1">
        <div class="container">
          <div class="row">
            <div class="alert alert-success" id="myAlert">
              Formulir berhasil dikirim
            </div>
            <div class="col-lg-5 col-12 m-auto">
              <div class="hero-text">

                <h1 class="text-white mb-2">PONDOK PESANTREN <br><?= $dp['nama']; ?></h1>
                <p style="color: white; font-size: 14px; margin-bottom: 0px;"><?= $dp['deskripsi']; ?></p>
                <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
              </div>
            </div>
          </div>
        </div>

        <div class="video-wrap">
          <video autoplay="" loop="" muted="" class="custom-video" poster="">
            <source src="videos/ponpes.mp4" type="video/mp4">

            Your browser does not support the video tag.
          </video>
        </div>
      </section>
    <?php endforeach; ?>


    <section class="highlight">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 col-12">
            <div class="highlight-thumb">
              <img src="images/highlight/santri.jpg" class="highlight-image img-fluid" alt="Pondok pesantren Al-Hasan">
              <div class="highlight-info">
                <h3 class="highlight-title">Kegiatan Santri & santriah</h3>
                <a href=" <?= $dp['link_video1']; ?>" class=" bi-youtube highlight-icon" data-vbtype="video" data-autoplay="true" target="_blank"></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12">
            <div class="highlight-thumb">
              <img src="images/highlight/santriah.jpg" class="highlight-image img-fluid" alt="Pondok pesantren Al-Hasan">
              <div class="highlight-info">
                <h3 class="highlight-title">Kegiatan Santri & santriah</h3>
                <a href=" <?= $dp['link_video2']; ?>" class=" bi-youtube highlight-icon" data-vbtype="video" data-autoplay="true" target="_blank"></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12">
            <div class="highlight-thumb">
              <img src="images/highlight/pidato.jpg" class="highlight-image img-fluid" alt="Pondok pesantren Al-Hasan">
              <div class="highlight-info">
                <h3 class="highlight-title">Kegiatan Santri & santriah</h3>
                <a href=" <?= $dp['link_video3']; ?>" class=" bi-youtube highlight-icon" data-vbtype="video" data-autoplay="true" target="_blank"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php foreach ($dataSejarah as $ds) : ?>
      <section class="speakers section-padding" id="section_2">
        <div class="container">
          <div class="row">

            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center" style="padding: 3px; box-sizing: inherit;">
              <div class="speakers-text-info" style="padding: 0px; ">
                <h2 class="mb-2" style="padding: 0px; font-weight: 900; font-size: 35px; text-align: center; ">Pondok Pesantren <br><?= $dp['nama'] ?></u></h2>
                <hr>
                <p style="padding: 3px; text-align: justify;"><?= $ds['deskripsi'] ?></p>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="speakers-thumb">
                <img src="./public/assets/images/sejarah/<?= $ds['foto1'] ?>" class="img-fluid speakers-image" alt="Pondok pesantren Al-Hasan" style="margin-top: 118px;">
                <!-- <small class="speakers-featured-text">Featured</small> -->

                <div class="speakers-info">

                  <h5 class="speakers-title mb-0"><?= $ds['deskripsi1'] ?></h5>

                  <p class="speakers-text mb-0">Pimpinan Pondok Pesantren <?= $dp['nama'] ?></p>

                  <ul class="social-icon">
                    <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                    <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                    <li><a href="#" class="social-icon-link bi-google"></a></li>
                  </ul>
                </div>
              </div>
              <hr>
            </div>
            <div class="col-lg-12 col-12">
              <hr>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="speakers-thumb speakers-thumb-small">
                    <img src="./public/assets/images/sejarah/<?= $ds['foto2'] ?>" class="img-fluid speakers-image" alt="Pondok pesantren Al-Hasan">

                    <div class="speakers-info">
                      <p class="speakers-text mb-0"><?= $ds['deskripsi2'] ?></p>
                      <ul class="social-icon">
                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                  <div class="speakers-thumb speakers-thumb-small">
                    <img src="./public/assets/images/sejarah/<?= $ds['foto3'] ?>" class="img-fluid speakers-image" alt="Pondok pesantren Al-Hasan">

                    <div class="speakers-info">
                      <p class="speakers-text mb-0"><?= $ds['deskripsi3'] ?></p>

                      <ul class="social-icon">
                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                  <div class="speakers-thumb speakers-thumb-small">
                    <img src="./public/assets/images/sejarah/<?= $ds['foto4'] ?>" class="img-fluid speakers-image" alt="Pondok pesantren Al-Hasan">

                    <div class="speakers-info">

                      <p class="speakers-text mb-0"><?= $ds['deskripsi4'] ?></p>

                      <ul class="social-icon">
                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>


              </div>
            </div>

          </div>
        </div>
      </section>
    <?php endforeach; ?>

    <section class="schedule section-padding" id="section_3" style="padding-bottom: 12px; ">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-12">
            <h2 class=" text-center">KEGIATAN PONDOK PESANTREN <?= $dp['nama'] ?></h2>
            <div class="tab-content mt-5" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-DayOne" role="tabpanel" aria-labelledby="nav-DayOne-tab">
                <?php foreach ($dataKegiatan as $dg) : ?>
                  <div class="row border-bottom pb-5 mb-5">
                    <div class="col-lg-4 col-12">
                      <a href="detailKegiatan.php?id=<?= $dg['id']; ?>"><img src="./public/assets/img/kegiatan/<?= $dg['foto']; ?>" class="schedule-image img-fluid" alt="Pondok pesantren Al-Hasan"></a>
                    </div>

                    <div class="col-lg-8 col-12 mt-3 mt-lg-0">

                      <a href="detailKegiatan.php?id=<?= $dg['id']; ?>">
                        <h4 class="mb-2"><?= $dg['nama']; ?></h4>
                      </a>
                      <a href="detailKegiatan.php?id=<?= $dg['id']; ?>">
                        <p><?= substr($dg['deskripsi'], 0, 100); ?><br> Baca Selengkapnya.........</p><br>
                      </a>

                      <div class="d-flex align-items-center mt-4">
                        <div class="avatar-group d-flex">
                          <img src="./public/assets/images/profil/<?= $dp['foto_profil'] ?>" class="img-fluid avatar-image" alt="Pondok pesantren Al-Hasan">

                          <div class="ms-3">
                            Pondok Pesantren
                            <p class="speakers-text mb-0"><?= $dp['nama']; ?></p>
                          </div>
                        </div>

                        <span class="mx-3 mx-lg-5">
                          <i class="bi-clock me-2"></i>
                          <?= date('d F Y', strtotime($dg['tanggal'])); ?>
                        </span>

                        <span class="mx-1 mx-lg-5">
                          <i class="bi-layout-sidebar me-2"></i>
                          <?= $dg['lokasi']; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="pricing section-padding" id="section_4">
      <h1 class="" style="font-weight: 900; text-align: center;">Galeri Pondok Pesantren <br> <?= $dp['nama'] ?></h1>
      <div class="container-img">
        <hr>
        <div class="box-img">
          <?php foreach ($dataGallery as $daga) : ?>
            <div class="slide" style="background-image: url('./public/assets/img/gallery/<?= $daga['foto']; ?>'); display: flex; background-size: cover;">
              <h3 style="color: greenyellow;"><?= $daga['deskripsi']; ?></h3>
              <hr>
            </div>
          <?php endforeach; ?>
        </div>
      </div>


    </section>

    <section class="venue section-padding" id="section_5">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 col-12">
            <h2 class="mb-5" style="font-weight: 900; text-align: center;">Alamat Ponpes <?= $dp['nama'] ?></h2>
          </div>

          <div class="col-lg-6 col-12">
            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.125850690586!2d108.05904191450759!3d-7.669616778035082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65e1d893518695%3A0x4a5a77e43737e5e8!2sAL%20HASAN!5e0!3m2!1sid!2sid!4v1674722370580!5m2!1sid!2sid" width="100%" height="371.59" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-6 col-12  mt-lg-0">
            <div class="venue-thumb bg-white shadow-lg">

              <div class="venue-info-title">
                <h2 class="text-white">Pondok Pesantren <?= $dp['nama'] ?></h2>
              </div>

              <div class="venue-info-body">
                <h4 class="d-flex">
                  <i class="bi-geo-alt me-2"></i>
                  <span><?= $dp['alamat']; ?></span>
                </h4>

                <h5 class="mt-4 mb-3">
                  <a href="mailto:hello@yourgmail.com">
                    <i class="bi-envelope me-2"></i>
                    hi@company.com
                  </a>
                </h5>

                <h5 class="mb-0">
                  <a href="tel: 305-240-9671">
                    <i class="bi-telephone me-2"></i>
                    0<?= $dp['hp']; ?>
                  </a>
                </h5>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="contact section-padding" id="section_6" style="background-image: url('./public/assets/images/background/<?= $dp['foto_bg'] ?>');" alt="Pondok pesantren Al-Hasan">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 col-12 mx-auto">

            <form class="custom-form contact-form bg-white shadow-lg" action="#" method="post" role="form">
              <h2 style="text-align: center; font-weight: bold;">Silahkan isi formulir Dibawah Untuk mendaftar</h2>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                  <label>Nama
                  </label>
                  <input type="text" name="nama" id="nama" class="form-control" required />
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                  <label>Tingkat Pendidikan
                  </label>
                  <select class="select2 form-select shadow-none" name="id_sekolah" id="id_sekolah" style="width: 100%; height: 36px">
                    <option value="">--Select--</option>
                    <?php foreach ($sekolah as $t) :  ?>
                      <option value="<?= $t['id']; ?>"><?= $t['tingkat']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                  <label>Jenis Kelamin
                  </label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="select2 form-select shadow-none">
                    <option value="Laki-Laki">--pilih--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

                <div class="col-12">
                  <label>Alamat
                  </label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="tulis alamat"></textarea>
                  <button type="submit" id="form-submit" onclick="myFunction()" name="submit" class="form-control">Simpan</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>

  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
          <div class="d-flex">
            <a href="index.php" class="navbar-brand">
              <img src="./public/assets/images/profil/<?= $dp['foto_profil'] ?>" alt="Pondok pesantren Al-Hasan" class="img-fluid" style="width: 40px; height: 40px; ">
              <span class="brand-text" style="color: green; font-size: 12px;">PONDOK PESANTREN <br> <?= $dp['nama'] ?></span>
            </a>

            <ul class="social-icon ms-auto">
              <?php foreach ($dataSosialMedia as $medsos) : ?>
                <li><a href="<?= $medsos['link'] ?>" class="social-icon-link bi-<?= $medsos['nama'] ?>"></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <div class="col-lg-7 col-12">
          <ul class="footer-menu d-flex flex-wrap">
            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Tentang Al-Hasan</a></li>

            <li class="footer-menu-item"><a href="#kegiatan" class="footer-menu-link">Kegiatan Al-Hasan</a></li>

            <li class="footer-menu-item"><a href="#galeri" class="footer-menu-link">Galeri Santri Al-Hasan</a></li>

            <li class="footer-menu-item"><a href="#alamat" class="footer-menu-link">Alamat</a></li>
          </ul>
        </div>


        <div class="col-lg-5 col-12 ms-lg-auto">
          <div class="copyright-text-wrap d-flex align-items-center">
            <p class="copyright-text ms-lg-auto me-4 mb-0">Copyright © Pondok Pesantren Al-Hasan Co., Ltd.

              <br>All Rights Reserved.

              <br><br>Design: <a title="CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">pondok pesantren al-hasan</a>
            </p>

            <a href="#section_1" class="bi-arrow-up arrow-icon custom-link"></a>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- JAVASCRIPT FILES -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/click-scroll.js"></script>
  <script src="js/custom.js"></script>


  <script>
    activeslideimg();

    function activeslideimg(activeSlide = 2) {
      const slides = document.querySelectorAll(".slide");

      slides[activeSlide].classList.add("active");

      for (const slide of slides) {
        slide.addEventListener("click", () => {
          clearActiveClasses();

          slide.classList.add("active");
        });
      }


      function clearActiveClasses() {
        slides.forEach((slide) => {
          slide.classList.remove("active");
        })
      }

      var myAlert = document.getElementById('myAlert');

      myAlert.style.display = 'none';

      function myFuntion() {
        myAlert.style.display
      }

    }
  </script>

</body>

</html>