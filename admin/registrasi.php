<?php

include "../koneksi.php";

if (isset($_POST["register"])) {

  // var_dump($_POST);
  // die();

  if (registrasi($_POST) > 0) {
    echo "<script>
     alert('user baerhasil dtambakan');
    </script>";
  } else {
    echo mysqli_error($con);
  }
}

$title = "Ponpes Al-Hasan Admin Panel";

?>

<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title><?= $title; ?></title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./public/assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="./public/dist/css/style.min.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="main-wrapper">
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
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        ">
      <div class="auth-box bg-dark border-top border-secondary">
        <div>
          <div class="text-center pt-3 pb-3">
            <span class="db"><img src="./public/assets/images/logodk.png" alt="logo" /></span>
          </div>
          <!-- Form -->
          <form class="form-horizontal mt-3" action="" method="post">
            <div class="row pb-4">
              <div class="col-12">
                <!-- username  -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="username" id="username" aria-describedby="basic-addon1" required />
                </div>
                <!-- username end  -->

                <!-- password -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required id="password" name="password" />
                </div>
                <!-- end password -->

                <!-- conrim password -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" class="form-control form-control-lg" placeholder=" Confirm Password" aria-label="password2" aria-describedby="basic-addon1" required id="password2" name="password2" />
                </div>
                <!-- end confirm password -->

                <!-- status -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-phone fs-4"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="status " aria-label="status" aria-describedby="basic-addon1" required name="status" id="status" />
                </div>
                <!-- end status -->

                <!-- nama -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-cart fs-4"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="nama " aria-label="nama" aria-describedby="basic-addon1" required name="nama" id="nama" />
                </div>
                <!-- end nama -->
                <!-- id resto -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-key fs-4"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="ID resto" aria-label="id_resto" aria-describedby="basic-addon1" required name="id_resto" id="id_resto" />
                </div>
                <!-- end id_resto -->



              </div>
            </div>
            <div class="row border-top border-secondary">
              <div class="col-12">
                <div class="form-group">
                  <div class="pt-3 d-grid">
                    <button class="btn btn-block btn-lg btn-info" type="submit" name="register">
                      Sign Up
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="./public/assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="./public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
  </script>
</body>

</html>