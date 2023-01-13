<?php
// session untuk login
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
include "../koneksi.php";

// $id = $_GET["id"];
// var_dump($id);

$data = query("SELECT * FROM sejarah WHERE id=1")[0];

// var_dump($data["alamat"]);
if (isset($_POST['submit'])) {

	var_dump($_POST);
	die();

	if (ubah_sejarah($_POST) > 0) {


		echo
		"
		  <script>
		  alert('data berhasil dirubah');
		  document.location.href = 'sejarah.php';  
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
							<input type="text" id="foto1_lama" name="foto1_lama" class="form-control" value="<?= $data['foto1']; ?> " />
							<input type="text" id="foto2_lama" name="foto2_lama" class="form-control" value="<?= $data['foto2']; ?> " />
							<input type="text" id="foto3_lama" name="foto3_lama" class="form-control" value="<?= $data['foto3']; ?> " />
							<input type="text" id="foto4_lama" name="foto4_lama" class="form-control" value="<?= $data['foto4']; ?> " />

							<div class="row">
								<div class="col-md-6">
									<div>
										<label for="foto1" class="mt-3 ">Gambar logo</label>
										<input type="file" id="foto1" name="foto1" class="form-control mb-2 " onchange="loadFile1(event)" />
										<img alt="" width="150px" height="150px" id="output1">
									</div>
									<div>
										<label for="deskripsi1" class="mt-3">Keterangan</label>
										<input type="text" id="deskripsi1" name="deskripsi1" class="form-control" value="<?= $data['deskripsi1']; ?> " />
									</div>
									<div>
										<label for="sejarah" class="mt-3">Sejarah Singkat</label>
										<textarea class="form-control" name="sejarah" id="sejarah" class="form-control" style="height: 160px;"><?= $data['sejarah']; ?></textarea>
									</div>
									<div>
										<label for="foto2" class="mt-3">Foto Fasilitas 1</label>
										<input type="file" id="foto2" name="foto2" class="form-control mb-1" onchange="loadFile2(event)" />
										<img alt="" width="450" height="220" id="output2">
									</div>
									<div>
										<label for="deskripsi2" class="mt-3">Keterangan</label>
										<input type="text" id="deskripsi2" name="deskripsi2" class="form-control" value="<?= $data['deskripsi2']; ?> " />
									</div>
								</div>

								<div class="col-md-6">
									<div>
										<label for="foto3">Foto Fasilitas 2</label>
										<input type="file" id="foto3" name="foto3" class="form-control mb-1" onchange="loadFile3(event)" />
										<img align="right" alt="" width="450" height="220" id="output3">
									</div>
									<div>
										<label for="deskripsi3" class="mt-3">Keterangan</label>
										<input type="text" id="deskripsi3" name="deskripsi3" class="form-control" value="<?= $data['deskripsi3']; ?> " />
									</div>
									<div>
										<label for="foto4" class="mt-3">Foto Fasilitas 3</label>
										<input type="file" id="foto4" name="foto4" class="form-control mb-1" onchange="loadFile4(event)" />
										<img src="../public/assets/img/profil/<?= $data['foto2']; ?>" width='200' height='140' alt="">
									</div>
									<div>
										<label for="deskripsi4" class="mt-3">Keterangan</label>
										<input type="text" id="deskripsi4" name="deskripsi4" class="form-control" value="<?= $data['deskripsi4']; ?> " />
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
		var loadFile1 = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output1 = document.getElementById('output1');
				output1.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
	<script>
		var loadFile2 = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output2 = document.getElementById('output2');
				output2.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
	<script>
		var loadFile3 = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output3 = document.getElementById('output3');
				output3.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
	<script>
		var loadFile4 = function(event) {
			var reader = new FileReader();
			reader.onload = function() {
				var output4 = document.getElementById('output4');
				output4.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		};
	</script>
</body>

</html>