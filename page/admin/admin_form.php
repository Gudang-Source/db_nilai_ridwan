<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
if (isset($_POST['edit'])) {
  $table = $_POST['table'];
  $id_admin = $_POST['id_admin'];
  $where = "id_admin = '" .$id_admin. "'";

  $q = mysql_query("SELECT * FROM $table where $where");
  $d = mysql_fetch_assoc($q);
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>FORM ADMIN</h1></center><hr>
      <a href="admin.php"><button>-- Tampil Data --</button></a><br><br>
      <form class="" action="action/admin_act.php" method="post">
        <pre>
ID ADMIN  : <input type="text" name="" value="<?php if(isset($_POST['edit'])) echo $d['id_admin']; else echo "AUTO"; ?>" disabled><br>
USERNAME  : <input type="text" name="username" value="<?php if(isset($_POST['edit'])) echo $d['username'];?>" required><br>
PASSWORD  : <input type="password" name="password" value="<?php if(isset($_POST['edit'])) echo $d['password'];?>" required><br>
FIRSTNAME : <input type="text" name="firstname" value="<?php if(isset($_POST['edit'])) echo $d['firstname'];?>" required><br>
LASTNAME  : <input type="text" name="lastname" value="<?php if(isset($_POST['edit'])) echo $d['lastname'];?>" required><br>
TELEPON   : <input type="number" name="telepon" value="<?php if(isset($_POST['edit'])) echo $d['telepon'];?>" required><br>
EMAIL     : <input type="email" name="email" value="<?php if(isset($_POST['edit'])) echo $d['email'];?>" required>
<input type="hidden" name="id_admin" value="<?php if(isset($_POST['edit'])) echo $d['id_admin']; else echo "0"; ?>">
<input type="hidden" name="table" value="admin">
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
