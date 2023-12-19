<?php
include 'config.php';

$usr = new User();
$obt = new Obat();

$action = $_GET['action'];

if ($action == "addUser") {
  $usr->insert($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['level']);
  echo "<script>window.location.href = '../admin/user/';</script>";
} elseif ($action == "delUser") {
  $usr->delete($_GET['id']);
  header("Location: ../admin/user/");
} elseif ($action == "updUser") {
  $usr->update($_POST['id'], $_POST['nama'], $_POST['username'], $_POST['password'], $_POST['level']);
  echo "<script>window.location.href = '../admin/user'</script>";
}
