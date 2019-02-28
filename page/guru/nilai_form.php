<?php session_start();
if($_SESSION && $_SESSION['login'] == "guru"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_nilai = $_POST['id_nilai'];
  $where = "id_nilai = '" .$id_nilai. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM NILAI</h1></center><hr>
      <a href="nilai.php"><button>-- Tampil Data --</button></a><br><br>
      <?php if(isset($_POST['tambah']) or isset($_POST['edit'])){ ?>
        <form class="" action="action/nilai_act.php" method="post">
          <pre>
ID NILAI        : <?php if(isset($_POST['edit'])) echo $d['id_nilai']; else echo "AUTO"; ?><br>
NAMA SISWA      : <?php echo $_POST['nama_siswa'] ?><br>
KELAS - JURUSAN : <?php echo $_POST['kelas_jurusan'] ?><br>
MAPEL           : <?php echo $_POST['nama_mapel'] ?><br>
NILAI HARIAN    : <input type="number" name="harian" value="<?php if(isset($_POST['edit'])) echo $d['harian'];?>" required><br>
NILAI UTS       : <input type="number" name="uts" value="<?php if(isset($_POST['edit'])) echo $d['uts'];?>" required><br>
NILAI UAS       : <input type="number" name="uas" value="<?php if(isset($_POST['edit'])) echo $d['uas'];?>" required><br>
<input type="hidden" name="nis" value="<?php echo $_POST['nis']; ?>"> <input type="hidden" name="id_mengajar" value="<?php echo $_POST['id_mengajar']; ?>"> <input type="hidden" name="id_nilai" value="<?php if(isset($_POST['edit'])) echo $d['id_nilai']; else echo "0"; ?>"> <input type="hidden" name="table" value="nilai">
<input type="submit" name="<?php if(isset($_POST['edit'])) echo"edit"; else echo "tambah"; ?>" value="<?php if(isset($_POST['edit'])) echo"Edit"; else echo "Tambah"; ?>"> <input type="reset" value="Reset">
          </pre>
        </form>
      <?php }else echo "-- 404 PAGE NOT FOUND --" ?>
  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
<?php }else{
  header("location: ../../index.php");
} ?>
