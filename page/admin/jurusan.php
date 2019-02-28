<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>DATA JURUSAN</h1></center><hr>
      <a href="jurusan_form.php"><button>-- Tambah Data --</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>ID JURUSAN</th>
          <th>NAMA JURUSAN</th>
          <th colspan="2">ACTION</th>
        </tr>
          <?php foreach ($db->tampil('jurusan') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['id_jurusan'] ?></td>
              <td><?php echo $d['nama_jurusan'] ?></td>
              <td>
                <form class="" action="jurusan_form.php" method="post">
                  <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'] ?>">
                  <input type="hidden" name="table" value="jurusan">
                  <input type="submit" name="edit" value="EDIT">
                </form>
              </td>
              <td>
                <form class="" action="action/jurusan_act.php" method="post">
                  <input type="hidden" name="id_jurusan" value="<?php echo $d['id_jurusan'] ?>">
                  <input type="hidden" name="table" value="jurusan">
                  <input type="submit" name="hapus" value="HAPUS">
                </form>
              </td>
            </tr>
          <?php } ?>
      </table>

  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
<?php }else{
  header("location: ../../index.php");
} ?>
