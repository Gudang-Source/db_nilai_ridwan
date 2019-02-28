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
  header("location: ../admin.php");

}else if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_admin = $_POST['id_admin'];
  $where = "id_admin = '" .$id_admin. "'";

  $q = mysql_query("DESCRIBE $table");
  while ($d = mysql_fetch_assoc($q)) {
    $value[] = $d['Field']. "= '".$_POST[$d['Field']]."'";
  }

  $value = implode($value, ',');

  $db->edit($table,$value,$where);
  header("location: ../admin.php");

}else if (isset($_POST['hapus'])) {
  $table = $_POST['table'];
  $id_admin = $_POST['id_admin'];
  $where = "id_admin = '" .$id_admin. "'";

  $db->hapus($table,$where);
  header("location: ../admin.php");
}
 ?>
<!-- WARNING END ACTION ------------------------------------------------- -->
<?php }else{
  header("location: ../../../index.php");
} ?>
