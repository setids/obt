<?php
session_start();

include "../../config/config.php";

$db = new Obat();

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
  <title>Admin Panel | Stock</title>
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
            <a href="" class="sidebar-link active">
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
            <a href="keluar.php" class="sidebar-link">
              <i class='bx bxs-cart-download'></i>
              Obat Keluar
            </a>
          </li>

          <li class="sidebar-header">Setting</li>
          <li class="sidebar-item">
            <a href="../user/" class="sidebar-link">
              <i class='bx bxs-user-account'></i>
              Manajemen User
            </a>
          </li>
          <li class="sidebar-item">
            <a href="../user/password.php" class="sidebar-link">
              <i class='bx bxs-lock-alt'></i>
              Ubah Password
            </a>
          </li>

          <li class="sidebar-item">
            <a href="../user/profile.php" class="sidebar-link">
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
            <div class="col align-self-center">
              <h5 class="fw-bold">Data Obat</h5>
              <div class="breadcrumb" style="--bs-breadcrumb-divider: '>';">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stock Obat</li>
              </div>
            </div>
            <!-- Content Header -->
            <div class="col-auto">
              <button type="button" class="button-18"><i class='bx bxs-plus-circle'> </i>&nbsp;Tambah</button>
              <!-- <a href="" class="btn button-18"><i class='bx bxs-plus-circle'></i> Tambah</a> -->
            </div>
            <!-- Content Table -->
            <div class="card">
              <div class="card-body table-responsive">
                <table class="table table-striped table-hover" id="userList">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode Obat</th>
                      <th class="text-center">Nama Obat</th>
                      <th class="text-center">Harga Beli</th>
                      <th class="text-center">Harga Jual</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Stok</th>
                      <!-- <th class="text-center">Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($db->views() as $vw) {
                    ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $vw["kode_obat"]; ?></td>
                        <td class="text-center"><?= $vw["nama_obat"]; ?></td>
                        <td class="text-center">Rp . <?= number_format($vw["harga_beli"], 0, ',', '.'); ?></td>
                        <td class="text-center">Rp . <?= number_format($vw["harga_jual"], 0, ',', '.'); ?></td>
                        <td class="text-center"><?= $vw["satuan"]; ?></td>
                        <td class="text-center"><?= $vw["stok"]; ?></td>
                        <!-- <td class="text-center"><?= $vw["kode_obat"]; ?></td> -->
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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