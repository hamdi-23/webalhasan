<?php require_once("koneksi.php");

$id = $_GET['id'];
$dataProfil = mysqli_query($con, "SELECT * FROM profil");
$dataSosialMedia = mysqli_query($con, "SELECT social_media.`nama`, social_media.`id` as idSosmed, link_social_media.`id_social_media`, link_social_media.`link` as link FROM link_social_media
INNER JOIN social_media ON link_social_media.`id_social_media`=social_media.`id`");

$dataKegiatan = mysqli_query($con, "SELECT * FROM kegiatan WHERE id= $id");
$row = $dataKegiatan->fetch_assoc();

$title = "Pondok Pesantren Al-Hasan";

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<!-- CSS FILES -->
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/bootstrap-icons.css" rel="stylesheet">

	<link href="css/templatemo-leadership-event.css" rel="stylesheet">

	<!--

TemplateMo 575 Leadership Event

https://templatemo.com/tm-575-leadership-event

-->
</head>

<body>

	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a href="index.php" class="navbar-brand mx-auto mx-lg-0">
				<?php foreach ($dataProfil as $dp) : ?>
					<img src="./public/assets/images/profil/<?= $dp['foto_profil'] ?>" alt="Pondok pesantren Al-Hasan" class="img-fluid" style="width: 40px; height: 40px; ">
					<span class="brand-text" style="color: greenyellow;">PONDOK PESANTREN <br> <?= $dp['nama'] ?></span>
				<?php endforeach; ?>
			</a>
	</nav>

	<main>


		<section class="contact section-padding" id="kegiatan" style="background-image: url('./public/assets/img/kegiatan/<?= $row['foto']; ?>');">
			<div class="container">
				<div class="row">

					<div class="col-lg-8 col-12 mx-auto">
						<form class="custom-form contact-form bg-white shadow-lg" action="#" method="post" role="form">
							<h2><?= $row['nama']; ?></h2>
							<div class="row">
								<div style=" margin-bottom: 5px;">
									<span class="">
										<i class="bi-clock me-2"></i>
										<?= date('d F Y', strtotime($row['tanggal'])); ?>
									</span>

									<span class="mx-1 mx-lg-5">
										<i class="bi-layout-sidebar me-2"></i>
										<?= $row['lokasi']; ?>
									</span>
								</div>

								<div class="col-12">
									<p style="text-align: justify;"><?= $row['deskripsi']; ?></p>
								</div>

								<div>
									<a href="index.php#kegiatan" type="button" class="form-control" style="text-align: center; font-weight: 800;">Kembali</a>
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
							<img src="./public/assets/images/profil/<?= $dp['foto_profil'] ?>" alt="Pondok pesantren Al-Hasan" class="img-fluid" style="width: 40px; height: 40px; ">
							<span class="brand-text" style="color: green; font-size: 12PX;">PONDOK PESANTREN <br> <?= $dp['nama'] ?></span>
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

</body>

</html>