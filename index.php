<?php require_once("koneksi.php");


$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$kataSantri = mysqli_query($con, "SELECT * FROM katasantri");
$dataSejarah = mysqli_query($con, "SELECT * FROM sejarah");
$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan ORDER BY id DESC LIMIT 6");
$dataGallery = mysqli_query($con, "SELECT * FROM gallery");

$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");

$title = "Pondok pesantren Al-Hasan";

$dataPendaftaran = query("SELECT sekolah.`tingkat` AS sekolah, pendaftaran.`foto`,pendaftaran.`nama`,pendaftaran.`alamat`,pendaftaran.`id_sekolah`
,pendaftaran.`tgl_masuk`,pendaftaran.`jenis_kelamin`,pendaftaran.`id` FROM pendaftaran INNER JOIN `sekolah` ON
 sekolah.`id`=pendaftaran.`id_sekolah`");

$sekolah = query("SELECT * FROM sekolah ");

// var_dump($data["alamat"]);
if (isset($_POST['submit'])) {



    if (pendaftar_baru($_POST) > 0) {
        echo
        "
		  <script>
		  alert('data berhasil ditambah');
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

    <title>Leadership Event HTML5 Bootstrap v5 Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-leadership-event.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

            <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                <i class="bi-bullseye brand-logo"></i>
                <span class="brand-text">Leadership <br> Event</span>
            </a>

            <a class="nav-link custom-btn btn d-lg-none" href="#">Buy Tickets</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">Speakers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Schedules</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Pricing</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6">Venue</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_7">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link custom-btn btn d-none d-lg-block" href="#">Buy Tickets</a>
                    </li>
                </ul>
                <div>

                </div>
    </nav>
    <main>
        <?php foreach ($dataProfil as $dp) : ?>
            <section class="hero" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 m-auto">
                            <div class="hero-text">

                                <h1 class="text-white mb-4"> <?= $dp['nama']; ?></h1>
                                <p style="color: white;"><?= $dp['deskripsi']; ?></p>
                                <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="videos/pexels-pavel-danilyuk-8716790.mp4" type="video/mp4">

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
                            <img src="images/highlight/alexandre-pellaes-6vAjp0pscX0-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2019 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="images/highlight/alexandre-pellaes-6vAjp0pscX0-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2019 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="images/highlight/alexandre-pellaes-6vAjp0pscX0-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2019 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="images/highlight/alexandre-pellaes-6vAjp0pscX0-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2019 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="images/highlight/miguel-henriques--8atMWER8bI-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2020 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="images/highlight/jakob-dalbjorn-cuKJre3nyYc-unsplash.jpg" class="highlight-image img-fluid" alt="">

                            <div class="highlight-info">
                                <h3 class="highlight-title">2021 Highlights</h3>

                                <a href="https://www.youtube.com/templatemo" class="bi-youtube highlight-icon"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <!-- <section class="about section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class=malasngoding-slider>
                        <?php foreach ($dataGallery as $daga) : ?>
                            <div class=isi-slider>
                                <img src="./public/assets/img/gallery/<?= $daga['foto']; ?>" alt="Gambar 1">
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </section> -->

        <?php foreach ($dataSejarah as $ds) : ?>
            <section class="speakers section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center">
                            <div class="speakers-text-info" style="padding: 2px;">
                                <h2 class="mb-2">Pondok Pesantren <br> Al-Hasan</h2>

                                <p style=" color: black; text-align: justify;"><?= $ds['deskripsi'] ?> </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="speakers-thumb">
                                <img src="./public/assets/images/sejarah/<?= $ds['foto1'] ?>" class="img-fluid speakers-image" alt="">
                                <!-- 
                                <small class="speakers-featured-text">Featured</small> -->

                                <div class="speakers-info">

                                    <h5 class="speakers-title mb-0"><?= $ds['deskripsi1'] ?></h5>

                                    <p class="speakers-text mb-0">PIMPINAN PONDOK PESANTREN AL-HASAN</p>

                                    <ul class="social-icon">
                                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li><a href="#" class="social-icon-link bi-google"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="speakers-thumb speakers-thumb-small">
                                        <img src="./public/assets/images/sejarah/<?= $ds['foto2'] ?>" class="img-fluid speakers-image" alt="">

                                        <div class="speakers-info">
                                            <!-- <h5 class="speakers-title mb-0">Natalie</h5> -->

                                            <p class="speakers-text mb-0"><?= $ds['deskripsi2'] ?></p>

                                            <ul class="social-icon">
                                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="speakers-thumb speakers-thumb-small">
                                        <img src="./public/assets/images/sejarah/<?= $ds['foto3'] ?>" class="img-fluid speakers-image" alt="">

                                        <div class="speakers-info">

                                            <p class="speakers-text mb-0">Startup Coach</p>

                                            <ul class="social-icon">
                                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                                <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="speakers-thumb speakers-thumb-small">
                                        <img src="./public/assets/images/sejarah/<?= $ds['foto4'] ?>" class="img-fluid speakers-image" alt="">

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

                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="speakers-thumb speakers-thumb-small">
                                        <img src="images/avatar/indoor-shot-beautiful-happy-african-american-woman-smiling-cheerfully-keeping-her-arms-folded-relaxing-indoors-after-morning-lectures-university.jpg" class="img-fluid speakers-image" alt="">

                                        <div class="speakers-info">
                                            <h5 class="speakers-title mb-0">Samantha</h5>

                                            <p class="speakers-text mb-0">Top Level Speaker</p>

                                            <ul class="social-icon">
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

        <section class="schedule section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-5 text-center">Next <u class="text-info">Schedules</u></h2>


                        <div class="tab-content mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-DayOne" role="tabpanel" aria-labelledby="nav-DayOne-tab">
                                <?php foreach ($dataKegiatan as $dg) : ?>

                                    <div class="row border-bottom pb-5 mb-5">
                                        <div class="col-lg-4 col-12">
                                            <img src="./public/assets/img/kegiatan/<?= $dg['foto']; ?>" class="schedule-image img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-8 col-12 mt-3 mt-lg-0">

                                            <h4 class="mb-2"><?= $dg['nama']; ?></h4>

                                            <p><?= $dg['deskripsi']; ?></p>

                                            <div class="d-flex align-items-center mt-4">
                                                <div class="avatar-group d-flex">
                                                    <img src="images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg" class="img-fluid avatar-image" alt="">

                                                    <div class="ms-3">
                                                        Logan Wilson
                                                        <p class="speakers-text mb-0">CEO / Founder</p>
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
        </section>

        <section class="call-to-action section-padding" style="position: absolte; height: 1200px;">
            <div class="container">
                <h1 style="font-weight: 900; color:white; align-content: center; ">GALERI PONPES</h1>
                <div class="row align-items-center">
                    <?php foreach ($dataGallery as $daga) : ?>
                        <div class="w3-display-container mySlides">
                            <img src="./public/assets/img/gallery/<?= $daga['foto']; ?>" style="width:100%; height: auto;">
                            <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
                                <?= $daga['deskripsi']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>

        <!-- <section class="pricing section-padding" id="section_5" style="position: absolte; height: 900px;">
            <h1 class="" align="center" style="font-weight: 900;">Galeri Pondok Pesantren <br> Al-Hasan</h1>

            <div class="col-lg-8 col-md-6 col-12  mb-lg-0" style="padding: 50px; ">
                <div class="pricing-thumb bg-white shadow-lg">
                    <div class="pricing-title-wrap d-flex align-items-center">
                        <h4 class="pricing-title text-white mb-0"> <?= $daga['deskripsi']; ?></h4>
                    </div>
                    <?php foreach ($dataGallery as $daga) : ?>
                        <div class="w3-display-container mySlides">
                            <img src="./public/assets/img/gallery/<?= $daga['foto']; ?>" style="width:100%; height: auto;">
                            <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
                                <?= $daga['deskripsi']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </section> -->

        <section class="venue section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-5">Here you go <u class="text-info">Venue</u></h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1511.091461689997!2d-73.9866630916883!3d40.758001294831736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855a96da09d%3A0x860bf5a5e1a00a68!2sTimes%20Square%2C%20New%20York%2C%20NY%2010036%2C%20USA!5e0!3m2!1sen!2ssg!4v1643035529098!5m2!1sen!2ssg" width="100%" height="371.59" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="venue-thumb bg-white shadow-lg">

                            <div class="venue-info-title">
                                <h2 class="text-white mb-0">Times Square</h2>
                            </div>

                            <div class="venue-info-body">
                                <h4 class="d-flex">
                                    <i class="bi-geo-alt me-2"></i>
                                    <span>102 South. 7th Street, New York, NY 10036, USA</span>
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
                                        010-020-0340
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="contact section-padding" id="section_7">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form bg-white shadow-lg" action="#" method="post" role="form">
                            <h2>Please Say Hi</h2>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email" required="">
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>

                                    <button type="submit" class="form-control">Submit</button>
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
                        <a href="index.html" class="navbar-brand">
                            <i class="bi-bullseye brand-logo"></i>
                            <span class="brand-text">Leadership <br> Event</span>
                        </a>

                        <ul class="social-icon ms-auto">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    <ul class="footer-menu d-flex flex-wrap">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Code of Conduct</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy and Terms</a></li>

                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                    </ul>
                </div>


                <div class="col-lg-5 col-12 ms-lg-auto">
                    <div class="copyright-text-wrap d-flex align-items-center">
                        <p class="copyright-text ms-lg-auto me-4 mb-0">Copyright © 2022 Leadership Event Co., Ltd.

                            <br>All Rights Reserved.

                            <br><br>Design: <a title="CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
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
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>

</body>

</html>