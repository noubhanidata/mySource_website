<?php
    require('php/db.php');
    if(isset($_GET['submit'])){
    $email = $_GET['email'];
    $password = $_GET['password'];
    $log = $mysqli->query("SELECT * FROM users WHERE email='$email' AND password='$password' ");
    if(mysqli_num_rows ($log)==1)
      {
           $data = $log->fetch_assoc();
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            $_SESSION["nom"] = $data["nom"];
            $_SESSION["prenom"] = $data["prenom"];
            $_SESSION["picture"] = $data["picture"];
            $_SESSION["profession"] = $data["profession"];
            $_SESSION["resume"] = $data["resume"];
            $_SESSION["telephone"] = $data["telephone"];



               header ('Location: index.php');
   }
    //else echo "Username/password is not valid";
       //            header ("Location: signin.php?email='$email'&password='$password");

 }
    
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>sign in</title>
    <link rel="stylesheet" type="text/css" href="css/signin.css">

</head>
<body>
    <video id="background" src="video/form.mp4" type="video/mp4" autoplay loop muted></video>

    <a href="index.php"><img id="logo" src="img/logo.png" height="100" width="100" /></a>
    <div class="champ">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" type=get>
            <p id="label">email</p>
            <input id="input" name="email" type="text" placeholder="user" />
            <p id="label">password</p>
            <input id="input" name="password" type="password" placeholder="*****" />
            <br /> <a id="links" href="mdpOublier.html">mot de pass oublier?</a>
            <br /> <a id="links" href="signup.html">creer un nouveau compte</a>
            <br /> <input type="submit" id="submit" class="button" name="submit" />
        </form>
    </div>
    <?php require('php/footer.php'); ?>
</body>
</html>