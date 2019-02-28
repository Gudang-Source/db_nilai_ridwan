<?php session_start();
require_once('db/config.php');
require_once('assets/header.php');
?>
<?php
if($_SESSION && $_SESSION['hak_akses'] == 0){
  header('location: page/admin');
}elseif($_SESSION && $_SESSION['hak_akses'] == 1){
  header('location: page/member');
}
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <button class="btn-group" onclick="show_login_admin()">LOGIN ADMIN</button>
      <button class="btn-group" onclick="show_login_guru()">LOGIN GURU</button>
      <br>
      <h2 id="title_admin" style="display: block;">Login Admin</h2>
      <h2 id="title_guru" style="display: none;">Login Guru</h2>
      <div id="login_admin" style="display: block;">
        <form action="action/login.php" method="post">
              <table>
                <tr>
                  <td>Username</td>
                  <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input type="password" name="password" required></td>
                </tr>
                <tr>
				<td></td>
                  <td><button class="btn-group" type="submit" name="login_admin">LOGIN</button>
				  <button class="btn-group"  type="reset" name="submit">RESET</button></td>
                </tr>
              </table>
          </form>
      </div>

      <div id="login_guru" style="display: none;">
        <form action="action/login.php" method="post">
            <table>
              <tr>
                <td>NIP</td>
                <td><input type="number" name="nip" required></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
              </tr>
              <tr>
				<td></td>
                <td><button class="btn-group" type="submit" name="login_guru">LOGIN</button>
				            <button  class="btn-group" type="reset" name="submit">RESET</button></td>
              </tr>
            </table>
      </form>
      </div>

    </center>
  </div>
</div>

<script type="text/javascript">

var login_admin = document.getElementById('login_admin');
var login_guru = document.getElementById('login_guru');
var title_admin = document.getElementById('title_admin');
var title_guru = document.getElementById('title_guru');

function show_login_admin(){
  login_admin.style.display = 'block';
  login_guru.style.display = 'none';
  title_admin.style.display = 'block';
  title_guru.style.display = 'none';
}

function show_login_guru(){
  login_admin.style.display = 'none';
  login_guru.style.display = 'block';
  title_admin.style.display = 'none';
  title_guru.style.display = 'block';
}

</script>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
