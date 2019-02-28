<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../../db/config.php');
$db = new database();
?>
<!-- WARNING START ACTION ------------------------------------------------- -->
<?php
if (isset($_POST['tambah'])) {
  $table = $_POST['table'];
  $q = mysql_query("DESCRIBE $table");
  while ($d = mysql_fetch_assoc($q)) {
    $value[] = "'".$_POST[$d['Field']]."'";
  }
  $value = implode($value, ',');

  $db->tambah($table,$value);
  header("location: ../siswa.php");

}else if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $nis = $_POST['nis'];
  $where = "nis = '" .$nis. "'";

  $q = mysql_query("DESCRIBE $table");
  while ($d = mysql_fetch_assoc($q)) {
    $value[] = $d['Field']. "= '".$_POST[$d['Field']]."'";
  }

  $value = implode($value, ',');

  $db->edit($table,$value,$where);
  header("location: ../siswa.php");

}else if (isset($_POST['hapus'])) {
  $table = $_POST['table'];
  $nis = $_POST['nis'];
  $where = "nis = '" .$nis. "'";

  $db->hapus($table,$where);
  header("location: ../siswa.php");
}
 ?>
<!-- WARNING END ACTION ------------------------------------------------- -->
<?php }else{
  header("location: ../../../index.php");
} ?>
