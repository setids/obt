<?php
session_start();

include "../../config/config.php";

$db = new CRUD();

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
  <title>Admin Panel | Profile</title>
</head>

<body>

  <div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar" class="js-sidebar">
      <!-- Sidebar Content -->
      <div class="h-100">
        <div class="sidebar-logo">
          <a href="/obt/dashboard/admin">Development</a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Menu
          </li>
          <li class="sidebar-item">
            <a href="/obt/dashboard/admin" class="sidebar-link">
              <i class='bx bxs-dashboard'></i>
              Dashboard
            </a>
          </li>
          <li class="sidebar-item">
            <a href="stock.php" class="sidebar-link">
              <i class='bx bxs-data'></i>
              Data Obat
            </a>
          </li>
          <li class="sidebar-item">
            <a href="transaksi.php" class="sidebar-link">
              <i class='bx bxs-wallet-alt'></i>
              Transaksi
            </a>
          </li>
          <li class="sidebar-item">
            <a href="keluar.php" class="sidebar-link">
              <i class='bx bxs-cart-download'></i>
              Obat Keluar
            </a>
          </li>

          <li class="sidebar-header">Setting</li>
          <li class="sidebar-item">
            <a href="user.php" class="sidebar-link">
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
            <a href="profile.php" class="sidebar-link active">
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
              <h5 class="fw-bold">Profile</h5>
              <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Home</a></li>
                  <li class="breadcrumb-item"><a href="">Setting</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav>
            </div>
            <!-- Content -->
            <div class="row">
              <div class="col mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <?= $_SESSION["nama"]; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Username</h6>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <?= $_SESSION["username"]; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Password</h6>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <?= $_SESSION["password"]; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Level</h6>
                      </div>
                      <div class="col sm-9 text-secondary">
                        <?= $_SESSION["level"]; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">Ubah</a>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Tambah User" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 fw-bold" id="editProfile">Edit Profile</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control mb-2" placeholder="<?= $_SESSION['nama']; ?>" autocomplete="off" required>
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control mb-2" placeholder="<?= $_SESSION['username']; ?>" autocomplete="off" required>
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" id="password" class="form-control mb-2" placeholder="<?= $_SESSION['password']; ?>" autocomplete="off" required>
                                <label for="level" class="form-label">Hak Akses</label>
                                <select name="level" id="level" class="form-select mb-4">
                                  <option selected value="1">Admin</option>
                                  <option value="2">User</option>
                                </select>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                              <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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