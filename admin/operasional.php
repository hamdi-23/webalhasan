<?php
// session untuk login
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

include "../koneksi.php";
//query mengambil id resto
$id = query("SELECT resto.`id` as id FROM resto;");

// query menampilkan data
$data = query("SELECT * FROM `operasional`");


if (isset($_POST['submit'])) {
	if (tambah_operasional($_POST) > 0) {
		echo "<script>
     alert('Data berhasil ditambakan');
	 document.location.href = 'operasional.php';  
    </script>";
	} else {
		echo mysqli_error($con);
	}
}

if (isset($_POST['update'])) {
	// var_dump($_POST);
	// die();
	if (edit_operasional($_POST) > 0) {
		echo "<script>
     alert('Data berhasil diupdate');
	 document.location.href = 'operasional.php';  
    </script>";
	} else {
		echo mysqli_error($con);
	}
}

if (isset($_GET['id'])) {
	if (hapusOperasional($_POST) > 0) {
		echo
		"
		  <script>
		  alert('data berhasil dihapus');
		  document.location.href = 'operasional.php';  
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
				<div class="card">
					<div class="row">
						<form action="" method="POST" enctype="multipart/form-data">
							<?php foreach ($id as $id_resto) : ?>
								<input type="hidden" id="id_resto" name="id_resto" class="form-control" value="<?= $id_resto['id']; ?>" />
							<?php endforeach; ?>
							<div class="card-body">
								<h4 align="center">FORM TAMBAH DATA OPERASIONAL</h4>
								<div class="col-lg-6">
									<label for="hari" style="font-size: 13px;">HARI</label>
									<div class="mb-1">
										<select class="select2 form-select shadow-none" name="hari" id="hari" style="width: 100%; height: 36px" required>
											<option>Select</option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jum'at</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>

										</select>
									</div>
									<div>
										<label>Jam Buka
										</label>
										<input type="time" class="form-control " id="jam_buka" name="jam_buka" placeholder="Enter Date" required />
									</div>
									<div>
										<label>Jam Tutup
										</label>
										<input type="time" class="form-control" id="jam_tutup" name="jam_tutup" placeholder="Enter Date" required />
									</div>
								</div>
							</div>
							<hr>
							<div class="card-footer">
								<div class="mb-1">
									<div align="right">
										<button type="submit" name="submit" class="btn btn-success  text-white">simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Data Operasional</h5>
							<div class="table-responsive">
								<table id="zero_config" class="table table-striped table-bordered">
									<thead align="center">
										<tr>
											<th width="5%">No</th>
											<th>Hari</th>
											<th>Jam Buka</th>
											<th>Jam tutup</th>
											<th width="10%">Aksi</th>
										</tr>
									</thead>
									<tbody align="center">
										<?php $no = 1 ?>
										<?php foreach ($data as $d) : ?>
											<tr>

												<td><?= $no++ ?></td>
												<td><?= $d['hari'] ?></td>
												<td><?= date("H:i", strtotime($d['jam_buka'])) ?></td>
												<td><?= date("H:i", strtotime($d['jam_tutup'])) ?></td>
												<td>
													<a href='?id=<?= $d['id'] ?>' type="button" class="btn btn-danger btn-sm">
														<i class="fas fa-trash"></i>
													</a>
													<a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d['id'] ?>">
														<i class="fas fa-edit"></i>
													</a>
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
																<div class="row">
																	<div class="col-md-12">
																		<div class="card">
																			<div class="card-body">
																				<?php foreach ($id as $id_resto) : ?>
																					<input type="hidden" id="id_resto" name="id_resto" class="form-control" value="<?= $id_resto['id']; ?>" />
																				<?php endforeach; ?>
																				<label for="hari" style="font-size: 13px;">Hari</label>
																				<div class="mb-4">
																					<select class="select2 form-select shadow-none" name="hari" id="hari" style="width: 100%; height: 36px" required>
																						<option selected><?= $d['hari'] ?></option>
																						<option value="Senin">Senin</option>
																						<option value="Selasa">Selasa</option>
																						<option value="Rabu">Rabu</option>
																						<option value="Kamis">Kamis</option>
																						<option value="Jumat">Jum'at</option>
																						<option value="Sabtu">Sabtu</option>
																						<option value="Minggu">Minggu</option>
																					</select>
																				</div>
																				<div class="mb-4">
																					<label>Jam Buka
																					</label>
																					<input type="time" class="form-control " id="jam_buka" name="jam_buka" value="<?= date("H:i", strtotime($d['jam_buka'])) ?>" />
																				</div>
																				<div class="mb-1">
																					<label>Jam Tutup
																					</label>
																					<input type="time" class="form-control " id="jam_tutup" name="jam_tutup" value="<?= date("H:i", strtotime($d['jam_tutup'])) ?>" />
																				</div>
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
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>




				<!-- class cont -->
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
		/****************************************
		 *       Basic Table                   *
		 ****************************************/
		$("#zero_config").DataTable();
	</script>

</body>

</html>