<?php
session_start();

include "../../config/config.php";

$usr = new User();

if (!isset($_SESSION['id'])) {
  echo "<script>alert('Silahkan login dulu!');</script>";
  echo "<script>window.location.href = '../../';</script>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/img/favicon.png">
  <!-- Data Tables -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../assets/modules/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <!-- Icon -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Admin Panel | Manajemen User</title>
</head>

<body>

  <div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar" class="js-sidebar">
      <!-- Sidebar Content -->
      <div class="h-100">
        <div class="sidebar-logo">
          <a href="/obt/admin">Development</a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Menu
          </li>
          <li class="sidebar-item">
            <a href="/obt/admin" class="sidebar-link">
              <i class='bx bxs-dashboard'></i>
              Dashboard
            </a>
          </li>
          <li class="sidebar-item">
            <a href="../obat/" class="sidebar-link">
              <i class='bx bxs-data'></i>
              Data Obat
            </a>
          </li>
          <li class="sidebar-item">
            <a href="../transaksi/" class="sidebar-link">
              <i class='bx bxs-wallet-alt'></i>
              Transaksi
            </a>
          </li>
          <li class="sidebar-item">
            <a href="../obat/keluar.php" class="sidebar-link">
              <i class='bx bxs-cart-download'></i>
              Obat Keluar
            </a>
          </li>

          <li class="sidebar-header">Setting</li>
          <li class="sidebar-item">
            <a href="index.php" class="sidebar-link active">
              <i class='bx bxs-user-account'></i>
              Manajemen User
            </a>
          </li>
          <li class="sidebar-item">
            <a href="password.php" class="sidebar-link">
              <i class='bx bxs-lock-alt'></i>
              Ubah Password
            </a>
          </li>

          <li class="sidebar-item">
            <a href="profile.php" class="sidebar-link">
              <i class='bx bxs-user'></i>
              Profile
            </a>
          </li>
          <li class="sidebar-item">
            <a href="../../config/logout.php" class="sidebar-link">
              <i class='bx bxs-log-out'></i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- Content -->
    <div class="main">
      <!-- Top Navbar -->
      <nav class="navbar navbar-expand px-3 border-bottom">
        <button class="btn" id="sidebar-toggle" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="../../assets/img/avatar.svg" alt="" class="avatar img-fluid">
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="" class="dropdown-item">Profile</a>
                <a href="" class="dropdown-item">Setting</a>
                <a href="../../config/logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Main Content -->
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <div class="row mt-2">
            <!-- Breadcrumb -->
            <div class="col self-align-center">
              <h5 class="fw-bold">Ubah Data User</h5>
              <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Home</a></li>
                  <li class="breadcrumb-item"><a href="">Setting</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Ubah Data User</li>
                </ol>
              </nav>
            </div>
            <!-- Content Header -->
            <div class="row">
              <div class="col-mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3 mt-2">
                        <label for="lama">Nama</label>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <input type="text" name="lama" id="lama" class="form-control" autocomplete="off" required value="">
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-sm-3 mt-2">
                        <label for="baru">Username</label>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <input type="text" name="baru" id="baru" class="form-control" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-sm-3 mt-2">
                        <label for="confirm">Pasword</label>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <input type="text" name="confirm" id="confirm" class="form-control" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-sm-3 mt-2">
                        <label for="level">Level</label>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <select name="level" id="level" class="form-select mb-4">
                          <option selected value="Admin">Admin</option>
                          <option value="User">User</option>
                        </select>
                      </div>
                    </div>
                    <hr class="mt-4">
                    <button type="button" class="row btn btn-primary m-lg-1">Simpan</button>
                    <a href="user.php" class="btn btn-secondary">Batal</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->
          </div>
        </div>
      </main>
    </div>
  </div>

  <div class="script">
    <script src="../../assets/modules/jquery-3.7.0.js"></script>
    <script src="../../assets/modules/jquery.dataTables.min.js"></script>
    <script src="../../assets/modules/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script>
      new DataTable("#userList");
    </script>
  </div>
</body>

</html>