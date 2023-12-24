<?php
include 'config.php';

$db = new CRUD();
$obt = new Obat();

$action = $_GET['action'];

if ($action == "addUser") {
  $db->addUser($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['level']);
  header("Location: ../test/");
} elseif ($action == "delUser") {
  $db->delUser($_GET['id']);
  header("Location: ../test/");
} elseif ($action == "updUser") {
  $db->updUser($_POST['id'], $_POST['nama'], $_POST['username'], $_POST['password'], $_POST['level']);
  header("Location: ../test/");
} elseif ($action == "addObat") {
  $obt->insert($_POST['nama'], $_POST['satuan'], $_POST['harga_beli'], $_POST['harga_jual'], $_POST['stok'],);
  echo "<script>window.location.href = 'obat.php'</script>";
} elseif ($action == "delObat") {
  $obt->delete($_GET['id']);
  header("Location: obat.php");
}
