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
  header("location: ../jurusan.php");

}else if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_jurusan = $_POST['id_jurusan'];
  $where = "id_jurusan = '" .$id_jurusan. "'";

  $q = mysql_query("DESCRIBE $table");
  while ($d = mysql_fetch_assoc($q)) {
    $value[] = $d['Field']. "= '".$_POST[$d['Field']]."'";
  }

  $value = implode($value, ',');

  $db->edit($table,$value,$where);
  header("location: ../jurusan.php");

}else if (isset($_POST['hapus'])) {
  $table = $_POST['table'];
  $id_jurusan = $_POST['id_jurusan'];
  $where = "id_jurusan = '" .$id_jurusan. "'";

  $db->hapus($table,$where);
  header("location: ../jurusan.php");
}
 ?>
<!-- WARNING END ACTION ------------------------------------------------- -->
<?php }else{
  header("location: ../../../index.php");
} ?>
