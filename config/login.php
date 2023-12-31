<?php

include "config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $user = new Validation();

  $result = $user->checkLogin($username, $password);

  if ($result) {
    $_SESSION["id"] = $result["id"];
    $_SESSION["nama"] = $result["nama"];
    $_SESSION["username"] = $result["username"];
    $_SESSION["password"] = $result["password"];
    $_SESSION["level"] = $result["level"];

    if ($result["level"] == "Admin") {
      header("Location:../admin/");
    } else {
      header("Location: ../user/");
    }
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
    echo "<script>window.location.href = '../'</script>";
  }
}
