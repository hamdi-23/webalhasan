<?php
// session untuk login
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
include "../koneksi.php";

$data = query("SELECT * FROM profil WHERE id=1")[0];

// var_dump($data["alamat"]);
if (isset($_POST['submit'])) {

	if (ubah($_POST) > 0) {
		echo
		"
		  <script>
		  alert('data berhasil dirubah');
		  document.location.href = 'profil.php';  
		  </script>
		  ";
	} else {
		echo "
		  <script>
		  alert('data gagal dirubah');  
		  </script>
		  ";
	}
}
$title = "Dunia Kita Resto Admin Panel";

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
	<meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
	<meta name="robots" content="noindex,nofollow" />
	<title> <?= $title ?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../public/assets/images/logodk.png" />
	<link rel="stylesheet" type="text/css" href="../public/assets/extra-libs/multicheck/multicheck.css" />
	<link href="../public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="../public/assets/dist/css/style.min.css" rel="stylesheet" />
	<!-- Custom CSS -->
	<link href="../public/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
	<!-- Custom CSS -->
	<link href="../public/assets/dist/css/style.min.css" rel="stylesheet" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

		<!--  header - style you can find in pages.scss -->
		<?php include '../public/layouts/header.php'; ?>
		<!-- End header -->

		<!-- side bar -->
		<?php include '../public/layouts/sidebar.php'; ?>
		<!-- end sidebar -->
		<div class="page-wrapper">

			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<div class="container-fluid">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="card">
						<div class="card-body">
							<input type="hidden" id="id" name="id" class="form-control" value="<?= $data['id']; ?> " required />
							<input type="hidden" id="bg_lama" name="bg_lama" class="form-control" value="<?= $data['foto_bg']; ?> " />
							<input type="hidden" id="profil_lama" name="profil_lama" class="form-control" value="<?= $data['foto_profil']; ?> " />
							<div class="row">
								<div class="col-md-6">
									<div>
										<label for="nama" class="mt-3">Nama Pesantren</label>
										<input type="text" id="nama" name="nama" class="form-control" value="<?= $data['nama']; ?> " />
									</div>
									<div>
										<label for="foto_profil" class="mt-3 ">Gambar logo</label>
										<input type="file" id="foto_profil" name="foto_profil" class="form-control mb-2 " onchange="loadFile1(event)" />
										<img alt="" width="150px" height="150px" id="output1">
									</div>

									<div>
										<label for="hp" class="mt-3">hp</label>
										<input type="text" id="hp" name="hp" class="form-control" value="<?= $data['hp']; ?> " />
									</div>
									<!-- <div>
										<label for="tagline" class="mt-3">tagline</label>
										<input type="text" id="tagline" name="tagline" class="form-control" value="<?= $data['tagline']; ?> " />
									</div> -->
									<div>
										<label for="link_video" class="mt-3">Link Video</label>
										<input type="text" id="link_video" name="link_video" class="form-control" value="<?= $data['link_video']; ?> " />
									</div>
									<div>
										<label for="alamat" class="mt-3">alamat</label>
										<input type="text" id="alamat" name="alamat" class="form-control" value="<?= $data['alamat']; ?> " />
									</div>
									<div>
										<label for="google_map" class="mt-3">google map</label>
										<input type="text" id="google_map" name="google_map" class="form-control" value="<?= $data['google_map']; ?> " />
									</div>

								</div>

								<div class="col-md-6">
									<div>
										<label for="foto_bg">Foto Background</label>
										<input type="file" id="foto_bg" name="foto_bg" class="form-control mb-1" onchange="loadFile(event)" />
										<img align="right" alt="" width="450" height="220" id="output">
									</div>
									<div>
										<label for="foto_profil" class="mt-3">Sejarah Singkat</label>
										<textarea class="form-control" name="deskripsi" id="deskripsi" class="form-control" style="height: 160px;"><?= $data['deskripsi']; ?></textarea>
									</div>
								</div>
							</div>
							<hr>
						</div>
						<div class="card-footer">
							<div align="right">
								<button type="submit" name="submit" class="btn btn-success text-white">simpan</button>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->

	<!-- footer -->
	<?php include '../public/layouts/footer.php' ?>
	<!-- End footer -->



	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="../public/assets/libs/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="../public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="../public/assets/extra-libs/sparkline/sparkline.js"></script>
	<!--Wave Effects -->
	<script src="../public/assets/dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="../public/assets/dist/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="../public/assets/dist/js/custom.min.js"></script>
	<!--This page JavaScript -->
	<!-- <script src="./public/dist/js/pages/dashboards/dashboard1.js"></script> -->
	<!-- Charts js Files -->
	<script src="../public/assets/libs/flot/excanvas.js"></script>
	<script src="../public/assets/libs/flot/jquery.flot.js"></script>
	<script src="../public/assets/libs/flot/jquery.flot.pie.js"></script>
	<script src="../public/assets/libs/flot/jquery.flot.time.js"></script>
	<script src="../public/assets/libs/flot/jquery.flot.stack.js"></script>
	<script src="../public/assets/libs/flot/jquery.flot.crosshair.js"></script>
	<script src="../public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<script src="../public/assets/dist/js/pages/chart/chart-page-init.js"></script>
	<!-- this page js -->

	<script src="../public/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
	<script src="../public/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
	<script src="../public/assets/extra-libs/DataTables/datatables.min.js"></script>
	<script>
		var loadFile = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output = document.getElementById('output');
				output.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
	<script>
		var loadFile1 = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output1 = document.getElementById('output1');
				output1.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
</body>

</html>