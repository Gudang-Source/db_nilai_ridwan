<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_kelas = $_POST['id_kelas'];
  $where = "id_kelas = '" .$id_kelas. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->
<?php
$q = mysql_query("SELECT * FROM jurusan")
 ?>

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM KELAS</h1></center><hr>
      <a href="kelas.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/kelas_act.php" method="post">
        <pre>
ID KELAS        : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['id_kelas']; else echo "AUTO"; ?>" disabled><br>
NAMA KELAS      : <input type="text" name="nama_kelas" value="<?php if(isset($_POST['edit'])) echo $d['nama_kelas'];?>" required><br>
JURUSAN         : <select class="" name="id_jurusan">
                  <?php while ($d_jurusan = mysql_fetch_assoc($q)) { ?>
                    <option value="<?php echo $d_jurusan['id_jurusan'] ?>" <?php if(isset($_POST['edit'])  && $d_jurusan['id_jurusan'] == $d['id_jurusan'] ) echo "selected"; ?>><?php echo $d_jurusan['nama_jurusan'] ?></option>
                  <?php } ?>
                  </select>
<input type="hidden" name="id_kelas" value="<?php if(isset($_POST['edit'])) echo $d['id_kelas']; else echo "0"; ?>">
<input type="hidden" name="table" value="kelas">
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
