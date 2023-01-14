<?php

// session untuk login
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
// end Session

// koneksi database
include "../koneksi.php";
$data = query("SELECT profil.`nama` as r_nama , login.`nama` as l_nama FROM login JOIN profil WHERE profil.`id` = login.`id_profil`; 
");
// end koneksi
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
  <!-- Main wrapper - style you can find in pages.scss -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


    <!-- header page -->
    <?php include '../public/layouts/header.php'; ?>
    <!-- end header page -->

    <!-- sidebar page -->
    <?php include '../public/layouts/sidebar.php'; ?>
    <!-- end sidebar page -->
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">

            <!-- <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off me-1 ms-1"></i><b></b> Logout</a>
              </nav>
            </div> -->
          </div>
        </div>
      </div>
      <!-- Container fluid  -->
      <div class="container-fluid mt-5">
        <div class="" style="font-size: 50px; font-style: normal; font: 200; text-align: center; margin-block-start: 100px">
          <?php foreach ($data as $row) : ?>
            <b> Selamat datang, <?= $row['l_nama']; ?><br> di <?= $row['r_nama']; ?></b>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!-- End Container fluid  -->

    <!-- footer -->
    <?php include '../public/layouts/footer.php' ?>
    <!-- End footer -->


  </div>
  <!-- End Page wrapper  -->
  </div>
  <!-- End Wrapper -->

  <!-- All Jquery -->
  <script src="../public/assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="../public/assets/extra-libs/sparkline/sparkline.js"></script>
  <!--Wave Effe..cts -->
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


</body>

</html>