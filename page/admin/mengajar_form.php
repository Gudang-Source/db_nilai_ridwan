<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_mengajar = $_POST['id_mengajar'];
  $where = "id_mengajar = '" .$id_mengajar. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->
<?php
$q_kelas = mysql_query("SELECT * FROM kelas LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
$q_mapel = mysql_query("SELECT * FROM mapel");
$q_guru = mysql_query("SELECT * FROM guru");
 ?>

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM MENGAJAR</h1></center><hr>
      <a href="mengajar.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/mengajar_act.php" method="post">
        <pre>
ID MENGAJAR     : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['id_mengajar']; else echo "AUTO"; ?>" disabled><br>
KELAS - JURUSAN : <select class="" name="id_kelas">
                  <?php while ($d_kelas = mysql_fetch_assoc($q_kelas)) { ?>
                    <option value="<?php echo $d_kelas['id_kelas'] ?>" <?php if(isset($_POST['edit'])  && $d_kelas['id_kelas'] == $d['id_kelas'] ) echo "selected"; ?>><?php echo $d_kelas['nama_kelas'] ?> - <?php echo $d_kelas['nama_jurusan'] ?></option>
                  <?php } ?>
                  </select><br>
MAPEL           : <select class="" name="id_mapel">
                  <?php while ($d_mapel = mysql_fetch_assoc($q_mapel)) { ?>
                    <option value="<?php echo $d_mapel['id_mapel'] ?>" <?php if(isset($_POST['edit'])  && $d_mapel['id_mapel'] == $d['id_mapel'] ) echo "selected"; ?>><?php echo $d_mapel['nama_mapel'] ?></option>
                  <?php } ?>
                  </select><br>
GURU            : <select class="" name="nip">
                  <?php while ($d_guru = mysql_fetch_assoc($q_guru)) { ?>
                    <option value="<?php echo $d_guru['nip'] ?>" <?php if(isset($_POST['edit'])  && $d_guru['nip'] == $d['nip'] ) echo "selected"; ?>><?php echo $d_guru['nama_guru'] ?></option>
                  <?php } ?>
                  </select>
<input type="hidden" name="id_mengajar" value="<?php if(isset($_POST['edit'])) echo $d['id_mengajar']; else echo "0"; ?>">
<input type="hidden" name="table" value="mengajar">
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
