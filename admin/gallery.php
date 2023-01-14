<?php
// session untuk login
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

include "../koneksi.php";


$dataGalery = query("SELECT * FROM gallery");

if (isset($_POST['submit'])) {


	if (tambah_galery($_POST) > 0) {
		echo "
		  <script>
		  alert('data berhasil ditambah');
		  document.location.href = 'gallery.php';  
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

if (isset($_GET['id'])) {
	if (hapus_gallery($_POST) > 0) {
		echo
		"
		  <script>
		  alert('data berhasil dihapus');
		  document.location.href = 'gallery.php';  
		  </script>
		  ";
	} else {
		echo "
		  <script>
		  alert('data gagal dihapus');  
		  </script>
		  ";
	}
}

if (isset($_POST['update'])) {


	if (edit_gallery($_POST) > 0) {
		echo "<script>
     alert('Data berhasil diupdate');
	 document.location.href = 'gallery.php';  
    </script>";
	} else {
		echo mysqli_error($con);
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
	<title><?= $title ?></title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../public/assets/images/logodk.png" />
	<link rel="stylesheet" type="text/css" href="../public/assets/extra-libs/multicheck/multicheck.css" />
	<link href="../public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="../public/assets/dist/css/style.min.css" rel="stylesheet" />
	<!-- Custom CSS -->
	<link href="../public/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
	<!-- Custom CSS -->
	<link href="../public/assets/dist/css/style.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../public/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="../public/assets/extra-libs/multicheck/multicheck.css" />
	<link href="../public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
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
							<h4 align="center">FORM TAMBAH DATA GALLERY</h4>
							<div class="row">
								<div class="col-lg-6">
									<div></div>
									<label class="col-lg-2">Foto
									</label>
									<input type="file" name="foto" id="foto" class="form-control mb-3" onchange="loadFile(event)" required />
									<img id="output" height="200" width="300">
								</div>

								<div class="col-lg-6">
									<label>
										Deskripsi
									</label>
									<textarea name="deskripsi" id="deskripsi" class="form-control" style="height: 160px;"></textarea>
								</div>
							</div>
						</div>
						<hr>
						<div class="card-footer">
							<div align="right">
								<button type="submit" name="submit" class="btn btn-success text-white">simpan</button>
							</div>
						</div>
					</div>

				</form>

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Data Galery</h5>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered">
								<thead align="center">
									<tr>
										<th width="5%">No</th>
										<th>Foto</th>
										<th>Deskripsi</th>
										<th width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody align="center">
									<?php $no = 1 ?>
									<?php foreach ($dataGalery as $d) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td>
												<img src="../public/assets/img/gallery/<?= $d['foto']; ?>" width='180' height='120' alt="">
											</td>
											<td>
												<?= $d['deskripsi'];  ?>
											</td>
											<td class="btn" align="center">
												<a href='?id=<?= $d['id'] ?>' type="button" class="btn btn-danger btn-sm">
													<i class="fas fa-trash"></i>
												</a>
												<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d['id'] ?>">
													<i class="fas fa-edit"></i>
												</button>
											</td>
										</tr>

										<!-- modal edit -->
										<div class="modal fade" id="exampleModal<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header blueku">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="foto_lama" id="foto_lama" value="<?= $d['foto'] ?>" class="form-control mb-2" />
															<div class="row">
																<div class="col-md-12">
																	<div class="card">
																		<div class="card-body">
																			<div class="mb-1">
																				<label>Foto
																				</label>
																				<input type="file" name="foto" id="foto" class="form-control mb-2" />
																				<img src="../public/assets/img/gallery/<?= $d['foto']; ?>" width='200' height='140' alt="">
																			</div>
																			<div class="mb-1">
																				<label>
																					Deskripsi
																				</label>
																				<textarea name="deskripsi" id="deskripsi" class="form-control" style="height: 160px;"><?= $d['deskripsi']; ?></textarea>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
																		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		<button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
																	</div>
																</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
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
								</tbody>
							</table>

						</div>
					</div>
				</div>

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
	<!-- this page js -->
	<script src="../public/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
	<script src="../public/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
	<script src="../public/assets/extra-libs/DataTables/datatables.min.js"></script>
	<script>
		/****************************************
		 *       Basic Table                   *
		 ****************************************/
		$("#zero_config").DataTable();
	</script>



	<script src="../public/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="../public/assets/libs/quill/dist/quill.min.js"></script>

</body>

</html>