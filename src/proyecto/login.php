<?php
ob_start();
session_start();

include_once "login_functions.php";
?>
<html lang = "en">
   <head>
      <title>Logueate</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <link href = "css/login.css" rel = "stylesheet">
   </head>
	
   <body>
      <h2>Introduzca usuario y contraseña</h2> 
      <div class = "container form-signin">
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
               if (validateIfUsernameHasAccesAllowed($_POST['username'], $_POST['password'])) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'io';
                  
                  header("Location: main.php");
               } else {
                  $msg = 'Usuario o clave incorrecta';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
         <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" name = "username" required autofocus>
            </br>
            <input type = "password" class = "form-control" name = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
         </form>
      </div> 
      
   </body>
</html>
