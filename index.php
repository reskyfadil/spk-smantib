<?php
include 'functions.php';
if (empty($_SESSION['login']))
  header("location:login.php?m=login&act=login");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="icon" href="favicon.ico" />
  <link rel="icon" href="favicon.ico" /> -->

  <title>SPK AHP</title>
  <link rel="icon" href="assets/logo.png" type="image/x-icon">
  <link href="assets/css/readable-bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/general.css" rel="stylesheet" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/highcharts.js"></script>
  <script src="assets/js/highcharts-3d.js"></script>
  <script src="assets/js/exporting.js"></script>
  <style>
    .ant-dropdown-link {
      float: right;
      margin-right: 10px;
    }

    .ant-dropdown-trigger {
      display: inline-block;
      text-align: right;
    }

    .align-grid-self {
      justify-self: end;
    }
    .navbar .dropdown-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1000;
    }

    .navbar .dropdown:hover .dropdown-menu {
      display: block;
    }
    .navbar-center {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .navbar-center > li {
      float: none;
      display: inline-block;
    } 
    .dropdown-toggle:hover {
    text-decoration: none;
    }
    .navbar-brand {
      font-size: 17px; /* Sesuaikan dengan ukuran font link lainnya */
      padding-left: 0px; 
      padding-top:17px;/* Sesuaikan dengan padding link lainnya */
    }
    .footer {
      background-color: transparent;
      padding: 20px 0;
    }

    .copyright-text {
      color: #555; /* Warna abu-abu */
      font-size: 16px; /* Ukuran font 16px */
      font-weight: 600; /* Semi-bold */
    }

  </style>
</head>
<?php
function get_current_username() {
  if (isset($_SESSION['login'])) {
      global $db;
      $user = $db->get_row("SELECT nama_user FROM tb_user WHERE user = '{$_SESSION['login']}'");
      if ($user) {
          return $user->nama_user;
      } else {
          return ""; // Kembalikan string kosong jika tidak ditemukan nama pengguna
      }
  } else {
      return ""; // Kembalikan string kosong jika tidak ada pengguna yang login
  }
}

$current_username = get_current_username();
?>
<body>
<div>
  <div class="container-fluid" style="padding: 0 15px; background-color: #0862bc;">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="d-flex align-items-center" style="display: flex; align-items: center; justify-content: center;">
          <img src="assets/logo.png" height="75" style="margin-right: 20px; padding-left: 45px;padding-top:5px;padding-bottom:5px">
          <h3 style="color:#ffffff; margin: 0; display: inline-block; font-size: 22px;padding-top:0px;">SISTEM PENDUKUNG KEPUTUSAN</h3>
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-end" style="padding-top:25px;padding-right:60px;">
        <div class="align-grid-self" style="justify-self: end;">
          <div class="dropdown" style="display: flex; align-items: center;">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white; display: flex; align-items: center; padding-left: 0px;">
              <span  style="font-size: 15px; vertical-align: middle; padding-left: 410px;justify-self:end;"><?php echo $current_username; ?>
              <i aria-label="icon: down" class="anticon anticon-down" style="vertical-align: middle; padding-bottom: 10px;">
                <svg viewBox="80 80 840 840" focusable="false" class="" data-icon="down" width="0.8em" height="0.8em" fill="currentColor" aria-hidden="true">
                  <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                </svg>
              </i>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu" style="margin-top:10px;">
              <?php if ($_SESSION['level'] == 'admin') : ?>
                <li><a href="?m=user"><span class="glyphicon glyphicon-user"></span> Data User</a></li>
              <?php endif ?>
              <li><a href="?m=password"><span class="glyphicon glyphicon-pencil"></span> Ubah Password</a></li>
              <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-remove-sign"></span> Log Out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default navbar-top" style="width: 100%;">
    <div class="container" style="width: 100%;">
    <div class="navbar-header text-center">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?"style="padding-left:320px;"><span class="glyphicon glyphicon-home"style="width:16px;height:16px;"></span> Beranda</a>
      </div>
      
      <div id="navbar" class="navbar-collapse collapse justify-content-center text-center" style="flex-wrap: wrap;">
      
        <ul class="nav navbar-nav mx-auto">
          <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
          <li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-user"></span> Kelas</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-list"></span> Nilai Bobot<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-th-large"></span> Nilai Bobot Kriteria</a></li>
              <li><a href="?m=rel_sub"><span class="glyphicon glyphicon-th-large"></span> Nilai Bobot Sub Kriteria</a></li>

            </ul>
          </li>
          <li><a href="?m=hitung"><span class="glyphicon glyphicon-tasks"></span> Perhitungan</a></li>
          <!-- <li><a href="?m=hasil"><span class="glyphicon glyphicon-filter"></span> Hasil Penentuan</a></li> -->
        </ul>
        <div class="navbar-text"></div>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>
</div>
  <div class="container">
    <?php
    if (file_exists($mod . '.php'))
      include $mod . '.php';
    else
      include 'home.php';
    ?>
  </div>
  <footer class="footer bg-transparent">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <p class="mb-0 copyright-text">
          &copy; 2024 Envyy. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>
  <script type="text/javascript">
    $('.form-control').attr('autocomplete', 'off');
  </script>
</body>

</html>