<?php
require 'config.php';
if(!empty($_SESSION["uid"])){
    $uid = $_SESSION["uid"];
    $result = mysqli_query($conn, "SELECT * FROM evaluation WHERE uid = $uid");
    $row = mysqli_fetch_assoc($result);
}

else{
    header("Location: login.php");

}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>
    <body>
        <h1>WELCOME <?php echo $row["Nom"];?></h1>
        <a href="acceuil.html">Logout</a>
    </body>
</html>