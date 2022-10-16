<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM evaluation WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["uid"] = $row["uid"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Mot de Passe Incorrect'); </script>"; 
        }
    }
    else{
        echo
        "<script> alert('Utilisateur ou email incorrect'); </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
  </head>
 <body>
    <form class="" action="login.php" method="post">
    <h2>Login</h2>
    <label for="usernameemail">Nom d'utilisateur ou Email : </label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password" required value=""><br>
    <div class="checkbox">
                    <label>
                      <input type="checkbox">Remember Me
                    </label>
                    <label class="pull-right">
                      <a href="#">Mot de Passe oublier</a>

                    </label>
                  </div>
    <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Inscription</a>
 </body>
</html>