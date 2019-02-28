<?php session_start();
if($_SESSION && $_SESSION['login'] == "guru"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h3>SELAMAT DATANG GURU</h3></center><hr>

      Login Sebagai: <?php echo $_SESSION['nama_guru']?>

  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
<?php }else{
  header("location: ../../index.php");
} ?>
