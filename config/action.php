<?php
include 'config.php';

$db = new CRUD();

$action = $_GET['action'];

if ($action == "addUser") {
  $db->addUser($_POST['nama'], $_POST['username'], $_POST['password'], $_POST['level']);
  header("Location: ../dashboard/admin/user.php");
} elseif ($action == "delUser") {
  $db->delUser($_GET['id']);
  header("Location: ../dashboard/admin/user.php");
}
