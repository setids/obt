<?php
include "config.php";

$db = new CRUD();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tester</title>
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/modules/dataTables.bootstrap5.min.css">
</head>

<body>

  <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="action.php?action=addUser" method="POST">
                  <div class="modal-body">
                    <input type="text" name="nama" id="" class="form-control mb-4" placeholder="Nama" autocomplete="off">
                    <input type="text" name="username" id="" class="form-control mb-4" placeholder="Username" autocomplete="off">
                    <input type="text" name="password" id="" class="form-control mb-4" placeholder="Password" autocomplete="off">
                    <select name="level" class="form-select mb-4">
                      <option selected value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-3">
          <table class="table table-striped table-hover" id="user">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($db->views() as $vw) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $vw["nama"]; ?></td>
                  <td><?= $vw["username"]; ?></td>
                  <td><?= $vw["password"]; ?></td>
                  <td><?= $vw["level"]; ?></td>
                  <td>
                    <a href="update.php?id=<?= $vw['id']; ?>&action=updUser" data-bs-toggle="modsal" data-bs-target="#upddUser">Edit</a>
                    <a href="action.php?id=<?= $vw['id']; ?>&action=delUser">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <!-- Modal -->
          <div class="modal fade" id="updUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="action.php?action=updUser" method="POST">
                  <div class="modal-body">
                    <?php foreach ($db->editUser($_GET["id"]) as $d) { ?>
                      <input type="text" name="id" value="<?= $d['id']; ?>">
                      <input type="text" name="nama" id="" class="form-control mb-4" placeholder="Nama" autocomplete="off" value="<?= $d['nama']; ?>">
                      <input type="text" name="username" id="" class="form-control mb-4" placeholder="Username" autocomplete="off" value="<?= $d['username']; ?>">
                      <input type="text" name="password" id="" class="form-control mb-4" placeholder="Password" autocomplete="off" value="<?= $d['password']; ?>">
                      <select name="level" class="form-select mb-4">
                        <option selected value="Admin" value="<?= $d['level']; ?>">Admin</option>
                        <option value="User">User</option>
                      </select>
                    <?php } ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="script">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
      new DataTable("#user");
    </script>
  </div>
</body>

</html>