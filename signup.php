<?php
    require('php/db.php');
    if(isset($_GET['submit'])){
     $nom =$_GET['nom'];
     $prenom=$_GET['prenom'];
     $email=$_GET['email'];
     $password=$_GET['password1'];
  
     function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
       }
       if(empty($nom) || empty($prenom) || empty($email) ||empty($password)){
       alert('veuillez remplir tout les champs');
       //  header("Location: signup.php");
       }
       else if(ctype_alpha($nom) || ctype_alpha($prenom)){
       alert('veuillez entrer un vrai nom et prenom');
       }
       else if($password != $_GET['password2']){
       alert('mot de pass incorrect');
       }
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       alert("veuilez entrer une vrai adress email");
        }
       else{
        if(!$mysqli->query("INSERT INTO users(nom,prenom,email,password) VALUES ('$nom','$prenom','$email','$password')")){
            alert("adress email deja utilise");
           // header("Location: signup.php");

        }else{
        header("Location: signin.php");
    }
              }
}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>sign up</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body>
    <video id="background" src="video/form.mp4" type="video/mp4" autoplay loop muted></video>

    <a href="index.php"><img id="logo" src="img/logo.png" height="100" width="100" /></a>
    <div class="champ">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" >
            <p id="label">nom</p>
            <input id="input" name="nom" type="text" placeholder="nom" />
            <p id="label">prenom</p>
            <input id="input" name="prenom" type="text" placeholder="prenom" />
            <p id="label">email</p>
            <input id="input" name="email" type="text" placeholder="email" />
            <p id="label">mot de pass</p>
            <input id="input" name="password1"type="password" placeholder="*******" />
            <p id="label">confirmer le mot de pass</p>
            <input id="input" name="password2" type="password" placeholder="*******" />
            <p id="conditions">en cliquant sur sumbit vous accepter les conditions d'utilisation ,la politique du confidentialité et la politique du cookies</p>
            <br /> <input type="submit" id="submit" class="button" name="submit" />
            <br /> <a id="links" href="signin.php">déjà inscrit?</a>
        </form>
    </div>
    <footer class="footer">
        <h3>à propos</h3>
        <p>
            nous soutenons une communauté où les gens
            <br />apprennent,partagent et travaillent ensemble
            <br />pour créer des logiciels
        </p>
        <!--  <img src="img/facebook.png" />
        <img src="img/instagram.png" />
        <img src="img/twitter.png" />
         -->

    </footer>
</body>
</html>