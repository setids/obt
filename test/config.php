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
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
  }
}
