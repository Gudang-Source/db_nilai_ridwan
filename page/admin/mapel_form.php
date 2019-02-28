<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_mapel = $_POST['id_mapel'];
  $where = "id_mapel = '" .$id_mapel. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM MAPEL</h1></center><hr>
      <a href="jurusan.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/jurusan_act.php" method="post">
        <pre>
ID MAPEL     : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['id_mapel']; else echo "AUTO"; ?>" disabled><br>
NAMA MAPEL   : <input type="text" name="nama_jurusan" value="<?php if(isset($_POST['edit'])) echo $d['nama_jurusan'];?>" required><br>

<input type="hidden" name="id_mapel" value="<?php if(isset($_POST['edit'])) echo $d['id_mapel']; else echo "0"; ?>">
<input type="hidden" name="table" value="jurusan">
<input type="submit" name="<?php if(isset($_POST['edit'])) echo"edit"; else echo "tambah"; ?>" value="<?php if(isset($_POST['edit'])) echo"Edit"; else echo "Tambah"; ?>"> <input type="reset" value="Reset">
        </pre>
      </form>
  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
<?php }else{
  header("location: ../../index.php");
} ?>
