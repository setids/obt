<?php

class Connection
{
  public $host = "localhost";
  public $username = "root";
  public $password = "";
  public $db = "test";
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db,);

    if (mysqli_connect_error()) {
      die("Koneksi ke database gagal!" . mysqli_connect_error());
    }
  }
}

class CRUD extends Connection
{
  public function views()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM test");
    while ($d = mysqli_fetch_array($data)) {
      $hasil[] = $d;
    }

    return $hasil;
  }

  public function addUser($nama, $username, $password, $level)
  {
    mysqli_query($this->conn, "INSERT INTO test VALUES('', '$nama', '$username', '$password', '$level')");
  }

  public function delUser($id)
  {
    mysqli_query($this->conn, "DELETE FROM test WHERE id = '$id'");
  }

  public function editUser($id)
  {
    $data = mysqli_query($this->conn, "SELECT * FROM test WHERE id = '$id' ");
    while ($d = mysqli_fetch_array($data)) {
      $hasil[] = $d;
    }
    return $hasil;
  }

  public function updUser($id, $nama, $username, $password, $level)
  {
    mysqli_query($this->conn, "UPDATE test set nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id = '$id'");
  }
}

class Obat extends Connection
{
  public function views()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM test_obat ORDER BY id DESC");
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    return $rows;
  }

  public function insert($nama, $satuan, $hb, $hj, $stok)
  {
    $cek = mysqli_num_rows(mysqli_query($this->conn, "SELECT * FROM test_obat WHERE nama_obat = '$nama' AND satuan = '$satuan' "));

    if ($cek > 0) {
      echo "<script>alert('Data sudah ada bro!');</script>";
    } else {
      mysqli_query($this->conn, "INSERT INTO test_obat VALUES('', '$nama', '$satuan', '$hb', '$hj', '$stok')");
    }
  }

  public function delete($id)
  {
    mysqli_query($this->conn, "DELETE FROM test_obat WHERE id = '$id'");
  }
}
