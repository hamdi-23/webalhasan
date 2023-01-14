<?php require_once("koneksi.php");

$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$kataSantri = mysqli_query($con, "SELECT * FROM katasantri");
$dataSejarah = mysqli_query($con, "SELECT * FROM sejarah");
$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan");
$dataGallery = mysqli_query($con, "SELECT * FROM gallery");





?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Education Meeting HTML5 Template</title>

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
          <!-- <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div> -->
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
            <a href="index.html" class="logo">
              AL- HASAN
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#sejarah">Sejarah</a></li>
              <li class="scroll-to-section"><a href="#kegiatan">Kegiatan</a></li>
              <li class="scroll-to-section"><a href="#galeri">Galeri</a></li>
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
                <!-- <h6>Hello Students</h6> -->
                <h2>PONDOK PESANTREN AL-HASAN</h2>
                <p><?= $dp['deskripsi'] ?> <a rel="nofollow" href="https://templatemo.com/page/1" target="_blank">TemplateMo website</a>. This is a Bootstra a group of young people by <a rel="nofollow" href="https://www.pexels.com/@pressmaster" target="_blank">Pressmaster</a>.</p>
                <div class="main-button-red">
                  <!-- <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div> -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
  <!-- ***** Main Banner Area End ***** -->
  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <?php foreach ($kataSantri as $ks) : ?>

              <div class="item">
                <div class="">
                  <img src="assets/images/<?= $ks['foto'];  ?>" alt="">
                </div>
                <hr>
                <div class="down-content">
                  <h6><?= $ks['nama'];  ?></h6>
                  <p style="font-style: italic;">``<?= $ks['testimoni'];  ?>``</p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php foreach ($dataSejarah as $ds) : ?>
    <section class="upcoming-meetings" id="sejarah">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2>SEJARAH SINGKAT PONDOK PESANTREN AL-HASAN</h2>
            </div>
          </div>
          <div class="col-lg-6">
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
                    <div class="count-area-content">
                      <div class="icon">
                        <img src="./public/assets/images/sejarah/<?= $ds['foto4'] ?>" alt="" type="video/mp4">
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
                  <span>Pondok Pesantren Al-Hasan</span>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>


  <section class="apply-now" id="kegiatan">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="count-area-content percentage">
            <!-- <div style="width: 30px; height: 30px; ">
              <img src="assets/images/service-icon-01.png" alt="">
            </div> -->
            <div class="count-title">Kegiatan Pondok Pesantren Al-Hasan</div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <?php foreach ($dataKegiatan as $dg) : ?>
              <div class="col-lg-4">
                <div class="meeting-item ">
                  <div class=" thumb">
                    <div class="price">
                      <span><?= $dg['lokasi']; ?></span>
                    </div>
                    <a href="meeting-details.html"><img src="./public/assets/img/kegiatan/<?= $dg['foto']; ?>" width="300px" height="200px" alt="al-hasan"></a>
                  </div>
                  <div class="down-content">
                    <a href="meeting-details.html">
                      <h6><?= date('d F Y', strtotime($dg['tanggal'])); ?></span></h6>
                      <h4><?= $dg['nama']; ?></h4>
                    </a>
                    <hr>
                    <p><?= $dg['deskripsi']; ?></p>
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
            <h2>Galeri Pondok Pesantren Al-Hasan</h2>
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
                    <h2>Form Untuk Pendaftaran</h2>
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
                <h6>Nomor Telepon</h6>
                <span><?= $dp['hp']; ?></span>
              </li>
              <li>
                <h6>Alamat</h6>
                <span><?= $dp['alamat']; ?></span>
              </li>
              <!-- <li>
                <h6>Email Address</h6>
                <span>info@meeting.edu</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.meeting.edu</span>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © Pondok Pesantren AL-Hasan., Ltd. All Rights Reserved.
        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">Pondok Pesantren AL-Hasan </a>
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