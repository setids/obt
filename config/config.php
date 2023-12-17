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
      die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
  }
}

class Validation extends Connection
{

  public function checkLogin($username, $password)
  {
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $this->conn->query($query);

    return $result->fetch_assoc();
  }
}

class CRUD extends Connection
{

  public function views()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM user");
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    return $rows;
  }

  public function viewStock()
  {
    $data = mysqli_query($this->conn, "SELECT * FROM is_obat ORDER BY kode_obat DESC");
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    return $rows;
  }

  public function addUser($nama, $user, $pass, $level)
  {
    mysqli_query($this->conn, "INSERT INTO user VALUES('', '$nama', '$user', '$pass', '$level')");
  }

  public function delUser($id)
  {
    mysqli_query($this->conn, "DELETE FROM user WHERE id = '$id'");
  }

  public function updUser($id)
  {
    $data = mysqli_query($this->conn, "SELECT * FROM user WHERE id = '$id'");

    while ($d = mysqli_fetch_array($data)) {
      $hasil[] = $d;
    }

    return $hasil;
  }
}
