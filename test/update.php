<?php
include 'config.php';

$db = new CRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="action.php?action=updUser" method="post">
    <?php foreach ($db->editUser($_GET['id']) as $d) { ?>
      <table>
        <tr>
          <td>Nama</td>
          <td>
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <input type="text" name="nama" value="<?= $d['nama']; ?>" required>
          </td>
        </tr>

        <tr>
          <td>Username</td>
          <td>
            <input type="text" name="username" value="<?= $d['username']; ?>" required>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>
            <input type="text" name="password" value="<?= $d['password']; ?>" required>
          </td>
        </tr>
        <tr>
          <td>Level</td>
          <td>
            <select name="level" class="form-select mb-4">
              <option selected value="Admin" value="<?= $d['level']; ?>">Admin</option>
              <option value="User">User</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Simpan">
          </td>
        </tr>
      </table>
    <?php } ?>
  </form>

</body>

</html>