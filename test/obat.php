<?php
include 'config.php';

$obt = new Obat();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Obat</title>
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/modules/dataTables.bootstrap5.min.css">
</head>

<body>

  <div class="container-fluid mt-4">
    <div class="d-flex justify-content-end">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
            <form action="action.php?action=addObat" method="POST">
              <div class="modal-body">
                <input type="text" name="nama" id="" class="form-control mb-4" placeholder="Nama Obat" autocomplete="off">
                <select name="satuan" class="form-select mb-4">
                  <option selected value="Strip">Strip</option>
                  <option value="Box">Box</option>
                  <option value="Pcs">Pcs</option>
                </select>
                <input type="text" name="harga_beli" id="" class="form-control mb-4" placeholder="Harga Beli" autocomplete="off">
                <input type="text" name="harga_jual" id="" class="form-control mb-4" placeholder="Harga Jual" autocomplete="off">
                <input type="text" name="stok" id="" class="form-control mb-4" placeholder="Stok" autocomplete="off">
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
    <div class="card">
      <div class="card-body table-responsive">
        <table class="table table-striped" id="obat">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Obat</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Harga Beli</th>
              <th class="text-center">Harga Jual</th>
              <th class="text-center">Stok</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($obt->views() as $vw) { ?>
              <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $vw['nama_obat']; ?></td>
                <td><?= $vw['satuan']; ?></td>
                <td>Rp . <?= number_format($vw["harga_beli"], 0, ',', '.'); ?></td>
                <td>Rp . <?= number_format($vw["harga_jual"], 0, ',', '.'); ?></td>
                <td><?= $vw['stok']; ?></td>
                <td>
                  <a href="update.php?id=<?= $vw['id']; ?>&action=updUser" data-bs-toggle="modsal" data-bs-target="#upddUser">Edit</a>
                  <a href="action.php?id=<?= $vw['id']; ?>&action=delObat" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
    <div class="container mt-3">
      <form action="proses.php" method="post">
        <select name="nama" class="form-select mb-4">
          <?php
          foreach ($obt->views() as $sc) {
            echo "<option value='$sc[nama_obat]'>$sc[nama_obat]</option>";
          }
          ?>
        </select>
        <input type="text" name="harga_jual" id="" class="form-control mb-4" placeholder="Stok" autocomplete="off" value="<?= $sc['harga_jual'] + 5 ?>">
      </form>
    </div>
  </div>

  <div class="script">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
      new DataTable("#obat");
    </script>
  </div>
</body>

</html>