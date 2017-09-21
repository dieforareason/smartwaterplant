<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SWP17</title> <!-- ini judul halaman -->
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- memanggil file bootstrap.css -->
    <!-- Custom styles For Login -->
    <link href="css/login.css" rel="stylesheet"><!-- memanggil file login.css -->
  </head>
  <body>
    <div class="container">
      <div class="form-login-group">
      <form method="POST" action="" class="form-signin" role="form">
        <h2 class="form-signin-heading"><center>Silahkan Login</center></h2>
        <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block btn-login" name="submit" type="submit">Sign in</button>
      </form>
      <?php
        include "koneksi.php";
        
        if (isset($_POST['login'])) {
          $user= @$_POST['username'];
          $pass= @$_POST['password'];
                      
          $login= mysqli_query($con, "select * from admin where username= '".$user."' and password= '".$pass."'");
          $cek= mysqli_num_rows($login);
          $ambil = mysqli_fetch_array($login);
          if($cek > 0){
          $_SESSION['username']=$user;
          header('location: control.html');
          }else{
          echo "Maaf, Username atau Password yang anda masukkan salah.";}
          }
        ?>
      </div>
    </div>
  </body>
</html>
<?php ob_flush(); ?>