<?php require_once("koneksi.php");


$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$kataSantri = mysqli_query($con, "SELECT * FROM katasantri");
$dataSejarah = mysqli_query($con, "SELECT * FROM sejarah");
$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan ORDER BY id DESC LIMIT 6");
$dataGallery = mysqli_query($con, "SELECT * FROM gallery");

$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");

$title = "Pondok pesantren Al-Hasan";



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title><?= $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
  <!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
</head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>Pondok Pesantren Al-Hasan Cipatujah Tasikmalaya</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <?php foreach ($dataSosialMedia as $medsos) : ?>
                <li><a href="<?= $medsos['link'] ?>"><i class="fa fa-<?= $medsos['nama'] ?>"></i></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              AL-HASAN
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#sejarah">Sejarah Al-Hasan</a></li>
              <li class="scroll-to-section"><a href="#kegiatan">Kegiatan Al-Hasan</a></li>
              <li class="scroll-to-section"><a href="#galeri">Galeri Al-Hasan</a></li>
              <li class="scroll-to-section"><a href="#contact">Pendaftaran</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <?php foreach ($dataProfil as $dp) : ?>
    <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
        <source src="assets/images/ponpes.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="caption">
                <h6>Selamat Datang</h6>
                <h2>Di <?= $dp['nama']; ?></h2>
                <p><?= $dp['deskripsi']; ?></p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Daftar</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
  <!-- ***** Main Banner Area End ***** -->

  <!-- <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div>
              <div class="down-content">
                <h4>Best Education</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Best Teachers</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Best Students</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Online Meeting</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>

            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Best Networking</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section> -->


  <?php foreach ($dataSejarah as $ds) : ?>
    <section class="apply-now" id="sejarah">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2>Upcoming Meetings</h2>
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <div class="row">
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-12">
                    <div class="count-area-content percentage">
                      <div class="icon">
                        <img src="./public/assets/images/sejarah/<?= $ds['foto1'] ?>" alt="" type="video/mp4" width="350px" height="250px">
                      </div>
                      <div class="count-title"><?= $ds['deskripsi1'] ?></div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="count-area-content">
                      <video autoplay muted loop width="200px" height="200px">
                        <source src="assets/images/ponpes.mp4" type="video/mp4" />
                      </video>
                      <div class="count-title"><?= $ds['deskripsi2'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-12">
                    <div class="count-area-content new-students">
                      <div class="icon">
                        <img src="./public/assets/images/sejarah/<?= $ds['foto2'] ?>" alt="" type="video/mp4">
                      </div>
                      <div class="count-title"><?= $ds['deskripsi3'] ?></div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="count-area-content">
                      <div class="icon">
                        <img src="./public/assets/images/sejarah/<?= $ds['foto3'] ?>" alt="" type="video/mp4">
                      </div>
                      <div class="count-title"><?= $ds['deskripsi4'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="accordions is-first-expanded">
              <article class="accordion">
                <div class="accordion-head">
                  <span>Sejarah Pondok Pesantren AL-Hasan</span>
                  <span class="icon">
                    <i class="icon fa fa-chevron-right"></i>
                  </span>
                </div>
                <div class="accordion-body">
                  <div class="content">
                    <p><?= $ds['deskripsi'] ?> <a rel="nofollow" href="https://www.toocss.com/" target="_blank">Too CSS website</a>. If you need a working contact form script, please visit <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more info.</p>
                  </div>
                </div>
              </article>
              <article class="accordion">
                <div class="accordion-head">
                  <span>Visi & Misi</span>
                  <span class="icon">
                    <i class="icon fa fa-chevron-right"></i>
                  </span>
                </div>
                <div class="accordion-body">
                  <div class="content">
                    <p><?= $ds['visi'] ?> .</p>
                  </div>
                </div>
              </article>
              <!-- <article class="accordion">
                <div class="accordion-head">
                  <span>Please tell your friends</span>
                  <span class="icon">
                    <i class="icon fa fa-chevron-right"></i>
                  </span>
                </div>
                <div class="accordion-body">
                  <div class="content">
                    <p>Ut vehicula mauris est, sed sodales justo rhoncus eu. Morbi porttitor quam velit, at ullamcorper justo suscipit sit amet. Quisque at suscipit mi, non efficitur velit.<br><br>
                      Cras et tortor semper, placerat eros sit amet, porta est. Mauris porttitor sapien et quam volutpat luctus. Nullam sodales ipsum ac neque ultricies varius.</p>
                  </div>
                </div>
              </article>
              <article class="accordion last-accordion">
                <div class="accordion-head">
                  <span>Share this to your colleagues</span>
                  <span class="icon">
                    <i class="icon fa fa-chevron-right"></i>
                  </span>
                </div>
                <div class="accordion-body">
                  <div class="content">
                    <p>Maecenas suscipit enim libero, vel lobortis justo condimentum id. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>
                      Sed eleifend metus sit amet magna tristique, posuere laoreet arcu semper. Nulla pellentesque ut tortor sit amet maximus. In eu libero ullamcorper, semper nisi quis, convallis nisi.</p>
                  </div>
                </div>
              </article> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>

  <section class="upcoming-meetings" id="kegiatan">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>KEGIATAN PONDOK PESANTREN AL-HASAN</h2>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <?php foreach ($dataKegiatan as $dg) : ?>
              <div class="col-lg-4">
                <div class="meeting-item">
                  <div class="thumb">
                    <div class="price">
                      <span><?= $dg['lokasi']; ?></span>
                    </div>
                    <a href="detailKegiatan.php?id=<?= $dg['id']; ?>"><img src="./public/assets/img/kegiatan/<?= $dg['foto']; ?>" alt="New Lecturer Meeting"></a>
                  </div>
                  <div class="down-content">
                    <div class="">
                      <h6><?= date('d F Y', strtotime($dg['tanggal'])); ?></span></h6>
                    </div>
                    <hr>
                    <a href="detailKegiatan.php?id=<?= $dg['id']; ?>">
                      <h4><?= $dg['nama']; ?></h4>
                    </a>
                    <p><?= substr($dg['deskripsi'], 0, 25); ?><br> Baca Selengkapnya.........</p><br>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="our-courses" id="galeri">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Galeri Pondok Pesantren AL-Hasan</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
            <?php foreach ($dataGallery as $daga) : ?>
              <div class="item">
                <img src="./public/assets/img/gallery/<?= $daga['foto']; ?>" alt="al-hasan">
                <div class="down-content">
                  <h4><?= $daga['deskripsi']; ?></h4>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Nomor telepon</h6>
                <span>0<?= $dp['hp']; ?></span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span><?= $dp['alamat']; ?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © Pondok Pesantren Al-Hasan., Ltd. All Rights Reserved.
        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">PONPES AL-HASAN</a>
      </p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function() {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
      e.preventDefault();
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>

</body>

</html>