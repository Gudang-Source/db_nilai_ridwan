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
      <h1>DATA KELAS</h1></center><hr>
      <a href="kelas_form.php"><button>-- Tambah Data --</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>ID KELAS</th>
          <th>NAMA KELAS</th>
          <th>JURUSAN</th>
          <th colspan="2">ACTION</th>
        </tr>
          <?php foreach ($db->tampil_join1('kelas','jurusan','kelas.id_jurusan=jurusan.id_jurusan') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['id_kelas'] ?></td>
              <td><?php echo $d['nama_kelas'] ?></td>
              <td><?php echo $d['nama_jurusan'] ?></td>
              <td>
                <form class="" action="kelas_form.php" method="post">
                  <input type="hidden" name="id_kelas" value="<?php echo $d['id_kelas'] ?>">
                  <input type="hidden" name="table" value="kelas">
                  <input type="submit" name="edit" value="EDIT">
                </form>
              </td>
              <td>
                <form class="" action="action/kelas_act.php" method="post">
                  <input type="hidden" name="id_kelas" value="<?php echo $d['id_kelas'] ?>">
                  <input type="hidden" name="table" value="kelas">
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
