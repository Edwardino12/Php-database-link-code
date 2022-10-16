<?php
    require 'config.php';
    if(isset($_POST["submit"])){
        $name = $_POST["Nom"];
        $prenom = $_POST["Prenom"];
        $username = $_POST["username"];
        $date = $_POST["Date"];
        $lieu = $_POST["Lieu"];
        $Email = $_POST["Email"];
        $Tel = $_POST["Tel"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
    
        $duplicate = mysqli_query($conn, "SELECT * FROM evaluation WHERE username = '$username' OR Email = '$Email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo
            "<script> alert('Utilisateur ou Email existe deja'); </script>";
        }
        else{
            if($password == $cpassword){
                $query = "INSERT INTO evaluation VALUES('','$name','$prenom','$username','$date','$lieu','$Email','$Tel','$password')";
                mysqli_query($conn,$query);
                echo
            "<script> alert('Enregistrer avec success'); </script>";
            }
            else{
                echo 
                "<script> alert('Mot de passe ne correspond pas'); </script>"; 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<title>TEC EVA</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-8 col-offset-2">
<div class="page-header">
<h2>Fiche d'Inscription en Ligne</h2>
</div>
<p>Veillez remplir le formulaire</p>
<form action="registration.php" method="post" >
<div class="form-group">
<label for="Nom">Nom</label>
<input type="text" name="Nom" id="Nom" class="form-control" required value="">
</div>
<div class="form-group ">
<label for="Prenom">Prenom</label>
<input type="text" name="Prenom" id="Prenom" class="form-control" required value="">
</div>
<div class="form-group">
<label for="username">Nom d'utilisateur</label>
<input type="text" name="username" id="username" class="form-control" required value="">
</div>
<div class="form-group">
<label for="Date">Date de Naissance</label>
<input type="date" name="Date" id="Date" class="form-control" required value="">
</div>
<div class="form-group">
<label for="Lieu">Lieu de Naissance</label>
<input type="text" name="Lieu" id="Lieu" class="form-control" required value="">
</div>
<div class="form-group ">
<label for="Email">Email</label>
<input type="email" name="Email" id="Email" class="form-control" required value="">
</div>
<div class="form-group ">
<label for="Tel">Telephone</label>
<input type="text" name="Tel" id="Tel" class="form-control" placeholder="00237xxxxxxxxx" required value="">
</div>
<div class="form-group">
<label for="password">Mot de Passe</label>
<input type="password" name="password" id="password" class="form-control" required value="">
</div>  
<div class="form-group">
<label for="cpassword">Confirmation de Mot de Passe</label>
<input type="password" name="cpassword" id="cpassword" class="form-control" required value="">
</div>
<a href="acceuil.html" class="btn btn-register"><input type="submit" name="submit" value="S'inscrire"></a>
Already have a account?<a href="login.php" class="btn btn-default">Login</a>
</form>
</div>
</div>    
</div>
</body>
</html>    
