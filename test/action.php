<?php
include 'config.php';

$db = new CRUD();

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
}
