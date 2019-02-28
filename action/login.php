<?php session_start();
include "../db/config.php";
$db = new database();

if (isset($_POST['login_admin'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);

  $q = mysql_query("SELECT * FROM admin where username='$username' and password='$password' ");
  $cek = mysql_num_rows($q);
  $d = mysql_fetch_assoc($q);

  if ($cek) {
    $_SESSION['id_admin'] = $d['id_admin'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['password'] = $d['password'];
    $_SESSION['firstname'] = $d['firstname'];
    $_SESSION['lastname'] = $d['lastname'];
    $_SESSION['telepon'] = $d['telepon'];
    $_SESSION['email'] = $d['email'];

    $_SESSION['login'] = "admin";
    header("location: ../page/admin/index.php");
  }else{ ?>
    <script type="text/javascript">
      alert('Username / Password Salah !!');
      window.location="../index.php";
    </script>
  <?php }
}else if (isset($_POST['login_guru'])) {
  $nip = mysql_real_escape_string($_POST['nip']);
  $password = mysql_real_escape_string($_POST['password']);

  $q = mysql_query("SELECT * FROM guru where nip='$nip' and password='$password' ");
  $cek = mysql_num_rows($q);
  $d = mysql_fetch_assoc($q);

  if ($cek) {
    $_SESSION['nip'] = $d['nip'];
    $_SESSION['password'] = $d['password'];
    $_SESSION['nama_guru'] = $d['nama_guru'];
    $_SESSION['nuptk'] = $d['nuptk'];
    $_SESSION['alamat'] = $d['alamat'];

    $_SESSION['login'] = "guru";
    header("location: ../page/guru/index.php");
  }else{ ?>
    <script type="text/javascript">
      alert('Username / Password Salah !!');
      window.location="../index.php";
    </script>
  <?php }
}
 ?>
