<?php session_start();
if($_SESSION && $_SESSION['login'] == "guru"){
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
  ?>
  <script type="text/javascript">
    alert('Tambah Nilai Berhasil !!');
    window.location="../input_nilai.php";
  </script>
  <?php

}else if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_nilai = $_POST['id_nilai'];
  $where = "id_nilai = '" .$id_nilai. "'";

  $q = mysql_query("DESCRIBE $table");
  while ($d = mysql_fetch_assoc($q)) {
    $value[] = $d['Field']. "= '".$_POST[$d['Field']]."'";
  }

  $value = implode($value, ',');

  $db->edit($table,$value,$where);
  ?>
  <script type="text/javascript">
    alert('Edit Nilai Berhasil !!');
    window.location="../input_nilai.php";
  </script>
  <?php

}else if (isset($_POST['hapus'])) {
  $table = $_POST['table'];
  $id_nilai = $_POST['id_nilai'];
  $where = "id_nilai = '" .$id_nilai. "'";

  $db->hapus($table,$where);
  ?>
  <script type="text/javascript">
    alert('Hapus Nilai Berhasil !!');
    window.location="../input_nilai.php";
  </script>
  <?php
}
 ?>
<!-- WARNING END ACTION ------------------------------------------------- -->
<?php }else{
  header("location: ../../../index.php");
} ?>
