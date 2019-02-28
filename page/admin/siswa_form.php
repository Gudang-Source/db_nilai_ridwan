<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $nis = $_POST['nis'];
  $where = "nis = '" .$nis. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->
<?php
$q = mysql_query("SELECT * FROM kelas LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan")
 ?>

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM SISWA</h1></center><hr>
      <a href="siswa.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/siswa_act.php" method="post">
        <pre>
NIS             : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['nis']; else echo "AUTO"; ?>" disabled><br>
NAMA SISWA      : <input type="text" name="nama_siswa" value="<?php if(isset($_POST['edit'])) echo $d['nama_siswa'];?>" required><br>
ALAMAT          : <input type="text" name="alamat" value="<?php if(isset($_POST['edit'])) echo $d['alamat'];?>" required><br>
KELAS - JURUSAN : <select class="" name="id_kelas">
                  <?php while ($d_kelas = mysql_fetch_assoc($q)) { ?>
                    <option value="<?php echo $d_kelas['id_kelas'] ?>" <?php if(isset($_POST['edit'])  && $d_kelas['id_kelas'] == $d['id_kelas'] ) echo "selected"; ?>><?php echo $d_kelas['nama_kelas'] ?> - <?php echo $d_kelas['nama_jurusan'] ?></option>
                  <?php } ?>
                  </select>
<input type="hidden" name="nis" value="<?php if(isset($_POST['edit'])) echo $d['nis']; else echo "0"; ?>">
<input type="hidden" name="table" value="siswa">
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
