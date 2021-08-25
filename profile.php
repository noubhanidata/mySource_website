<?php
    require('php/db.php'); //isset($email)
    require("php/header.php");
    if(isset($_POST['authorEmail'])){//we use email as it is the only unique value we have 
        //$email = $_SESSION['email'];7
        $email = $_POST['authorEmail'];
        $log = $mysqli->query("SELECT * FROM users WHERE email='$email' ");//for pic we use img/profiles/.$email.jpg
        $data = $log->fetch_assoc();
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $nom = $data['nom'];
        $resume = $data['resume'];
        $telephone = $data['telephone'];
        $profession = $data['profession'];
        $picture = $data['picture'];
    }else{
        $email = $_SESSION['email'];
        $log = $mysqli->query("SELECT * FROM users WHERE email='$email' ");
        $data = $log->fetch_assoc();
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $nom = $data['nom'];
        $resume = $data['resume'];
        $telephone = $data['telephone'];
        $profession = $data['profession'];
        $picture = $data['picture'];
    }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <title>profile</title>
</head>
<body>

    <section class="body-section">
        <img id="profile-pic" src="<?php echo $_SESSION['picture'].'?'.rand(1,300); ?>" width="100" height="100" />
        <?php if(!isset($_POST['authorEmail'])) : ?>
        <a href="editerprofile.php" id="editer" class="button">editer profile</a>
        <?php endif; ?>
        <h1 id="names"><?php echo"$nom $prenom";  ?></h1>
        <div class="toolsbox">
            <a href="#"><img id="like" width="25" height="25" src="img/like.png" /></a>
            <br />  <a id="heart" href="#"><img width="25" height="25"src="img/heart.png"  /></a>
            <br />   <a id="flag" href="#"><img width="25" height="25" src="img/flag.jpg" /></a>
        </div>
        <label id="resume">auto résumé</label>
        <p id="resumetext" width="250px" height="150px"><?php echo"$resume";  ?></p>
        <label id="email" class="labeltext">email</label><p id="emailtext" class="text"><?php echo"$email";  ?></p>
        <br /><label id="Profession" class="labeltext">Profession</label><p class="text" id="professiontext"><?php echo"$profession";  ?>
        </p>
        <br /><label id="telephone" class="labeltext">telephone</label><p class="text" id="telephonetext"><?php echo '0'.$telephone;  ?></p>


    </section>

     <?php require("php/footer.php") ?>
</body>
</html>