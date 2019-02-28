<?php session_start();
?>
<?php
require_once('db/config.php');
require_once('assets/header.php');
$db = new database();
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->
<?php
$q_mengajar = mysql_query("SELECT * FROM mengajar LEFT JOIN kelas ON mengajar.id_kelas=kelas.id_kelas LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel LEFT JOIN guru ON mengajar.nip=guru.nip");
if(isset($_POST['go'])) {
  $id_mengajar = $_POST['id_mengajar'];
  $q_kelas = mysql_query("SELECT * FROM mengajar WHERE id_mengajar=$id_mengajar ");
  $d_kelas = mysql_fetch_assoc($q_kelas);
  $id_kelas = $d_kelas['id_kelas'];

  $q_temp = mysql_query("SELECT * FROM mengajar LEFT JOIN kelas ON mengajar.id_kelas=kelas.id_kelas LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel LEFT JOIN guru ON mengajar.nip=guru.nip WHERE mengajar.id_mengajar=$id_mengajar");
  $d_temp = mysql_fetch_assoc($q_temp);
}
?>

<div class="content">
  <div class="content-font">
    <center>
      <h2>DATA NILAI</h2></center>
      <form class="" action="nilai.php" method="post">
        PILIH KELAS - JURUSAN - MAPEL : <select class="" name="id_mengajar">
          <?php while ($d_mengajar = mysql_fetch_assoc($q_mengajar)) { ?>
            <option value="<?php echo $d_mengajar['id_mengajar'] ?>" <?php if(isset($_POST['go']) && $d_mengajar['id_mengajar'] == $id_mengajar) echo "selected"; ?>><?php echo $d_mengajar['nama_kelas'] ?> - <?php echo $d_mengajar['nama_jurusan'] ?> - <?php echo $d_mengajar['nama_mapel'] ?></option>
          <?php } ?>
        </select>
        <input type="submit" name="go" value="PILIH">
      </form>
      <hr>
      <?php
      if (isset($_POST['go'])) { ?>
        Menampilkan Data Nilai Kelas <font style="color: blue;"><?php echo $d_temp['nama_kelas'] ?> - <?php echo $d_temp['nama_jurusan'] ?></font> Mata Pelajaran <font style="color: red;"><?php echo $d_temp['nama_mapel'] ?></font> <br><br>
        <table border="1" width="100%">
          <tr>
            <th>ID NILAI</th>
            <th>NAMA SISWA</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>MAPEL</th>
            <th>HARIAN</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>RATA-RATA</th>
            <!-- <th colspan="2">ACTION</th> -->
          </tr>
            <?php foreach ($db->tampil_join2_where('siswa','kelas','siswa.id_kelas=kelas.id_kelas','jurusan','kelas.id_jurusan=jurusan.id_jurusan',"siswa.id_kelas=$id_kelas") as $d) {
              $nis = $d['nis'];
              $q_nilai = mysql_query("SELECT * FROM nilai LEFT JOIN mengajar ON nilai.id_mengajar=mengajar.id_mengajar LEFT JOIN mapel ON mengajar.id_mapel=mapel.id_mapel WHERE nilai.id_mengajar=$id_mengajar and nilai.nis=$nis");
              $d_nilai = mysql_fetch_assoc($q_nilai); ?>

              <tr style="text-align: center;">
                <td><?php if($d_nilai) echo $d_nilai['id_nilai']; else echo "-"; ?></td>
                <td><?php echo $d['nama_siswa'] ?></td>
                <td><?php echo $d['nama_kelas'] ?></td>
                <td><?php echo $d['nama_jurusan'] ?></td>
                <td><?php echo $d_temp['nama_mapel'] ?></td>
                <td><?php if($d_nilai) echo $d_nilai['harian']; else echo "-"; ?></td>
                <td><?php if($d_nilai) echo $d_nilai['uts']; else echo "-"; ?></td>
                <td><?php if($d_nilai) echo $d_nilai['uas']; else echo "-"; ?></td>
                <td><?php if($d_nilai) echo ($d_nilai['harian']+$d_nilai['uts']+$d_nilai['uas'])/3; else echo "-"; ?></td>
                <!-- <td>
                  <form class="" action="nilai_form.php" method="post">
                    <input type="hidden" name="id_nilai" value="<?php echo $d['id_nilai'] ?>">
                    <input type="hidden" name="table" value="nilai">
                    <input type="submit" name="edit" value="EDIT">
                  </form>
                </td>
                <td>
                  <form class="" action="action/nilai_act.php" method="post">
                    <input type="hidden" name="id_nilai" value="<?php echo $d['id_nilai'] ?>">
                    <input type="hidden" name="table" value="admin">
                    <input type="submit" name="hapus" value="HAPUS">
                  </form>
                </td> -->
              </tr>
            <?php } ?>
        </table>
      <?php } else echo ""?>


  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
