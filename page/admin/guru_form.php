<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $nip = $_POST['nip'];
  $where = "nip = '" .$nip. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM GURU</h1></center><hr>
      <a href="guru.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/guru_act.php" method="post">
        <pre>
NIP       : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['nip']; else echo "AUTO"; ?>" disabled><br>
PASSWORD  : <input type="password" name="password" value="<?php if(isset($_POST['edit'])) echo $d['password'];?>" required><br>
NAMA GURU : <input type="text" name="nama_guru" value="<?php if(isset($_POST['edit'])) echo $d['nama_guru'];?>" required><br>
NUPTK     : <input type="number" name="nuptk" value="<?php if(isset($_POST['edit'])) echo $d['nuptk'];?>" required><br>
ALAMAT    : <input type="text" name="alamat" value="<?php if(isset($_POST['edit'])) echo $d['alamat'];?>" required><br>
<input type="hidden" name="nip" value="<?php if(isset($_POST['edit'])) echo $d['nip']; else echo "0"; ?>">
<input type="hidden" name="table" value="guru">
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
