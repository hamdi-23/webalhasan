<?php require_once("koneksi.php");

$id = $_GET['id'];
$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");

$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan WHERE id= $id");
$row = $dataKegiatan->fetch_assoc();

$title = "Pondok Pesantren Al-Hasan";

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Template Mo">
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
						<a href="index.php" class="logo mx-3" style="width: 35px;">
							<div class="item">
								<div class="">
									<img src="assets/images/logo.png ?>" alt="">
								</div>
							</div>
						</a>
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
	<section class="heading-page header-text" id="top" style="background-image: url('./assets/images/heading-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- <h6>Get all details</h6> -->
					<h2><?= $row['nama']; ?></h2>
				</div>
			</div>
		</div>
	</section>

	<section class="meetings-page" id="meetings" style="background-image: url('./assets/images/meeting-01.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="meeting-single-item">
								<div class="thumb">
									<div class="price">
										<span><?= $row['lokasi']; ?></span>
									</div>
									<a href="meeting-details.html"><img src="./public/assets/img/kegiatan/<?= $row['foto']; ?>" alt=""></a>
								</div>
								<div class="down-content">
									<a href="meeting-details.html">
										<h4><?= $row['nama']; ?></h4>
									</a>
									<p><?= $row['deskripsi']; ?></p>
									<div class="row">
										<div class="col-lg-4">
											<div class="hours">
												<h5>Tanggal</h5>
												<p><?= date('d F Y', strtotime($row['tanggal'])); ?></p>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="location">
												<h5>Lokasi</h5>
												<p><?= $row['lokasi']; ?></p>
											</div>
										</div>

										<div class="col-lg-12">
											<div class="share">
												<h5>Share:</h5>
												<ul>
													<?php foreach ($dataSosialMedia as $medsos) : ?>
														<li><a href="<?= $medsos['link'] ?>"><?= $medsos['nama'] ?></a></li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="main-button-red">
								<a href="index.php">Kembali</a>
							</div>
						</div>
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