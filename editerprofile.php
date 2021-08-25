<?php 
    require('php/db.php');
    if(isset($_GET['submit'])){
     $email=$_SESSION['email'];
     $telephone=$_GET['telephone'];
     $profession=$_GET['profession'];
     $resume=$_GET['resume'];
     $nom = $_GET['nom'];
     $prenom = $_GET['prenom'];
     if(!empty($_GET['password'])){
        if($_GET['password'] == $_GET['password2']){
        $password = $_GET['password'];
        $_SESSION["password"] = $password;

        }

     }
    /* if(isset($_POST['change-pic'])){
        $img = $_FILES['avatar']['name'];
        $img_loc=$_FILES['avatar']['tmp_name'];
        $img_folder = "img/profiles";
        if(move_uploaded_file($img, $img_folder.$img)){
            echo "succeed";
        }else{
            echo "error while uploading file ";
        }
     }*/
    $sql = "UPDATE users SET telephone='$telephone',profession='$profession',nom='$nom',prenom='$prenom',resume='$resume' WHERE email='$email'";
     if ($mysqli->query($sql) === TRUE) {
            $_SESSION['telephone'] = $telephone;
            $_SESSION['profession'] = $profession;
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["resume"] = $resume;
            if(!empty($password)){
                    $sql = "UPDATE users SET password='$password' WHERE email='$email'";
                        $mysqli->query($sql);
                     }
                   header ('Location: profile.php');
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $mysqli->error;
}
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="css/editeprofile.css">
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
    <video id="background" src="video/falling.mp4" type="video/mp4" autoplay loop muted></video>
    <div class="header">
        <a href="index.php"><img id="logo" src="img/logo.png" height="100" width="100" /></a>
                  <div class="navbar">

            <div class="dropdown">
                <button class="dropbtn">
                    Browse
                </button>
                <div class="dropdown-content">
                    <form name="formPython" method="post" action="browse.php">
                    <input type="hidden" name="lang" value=" python">
                    <a href="#"  onclick="javascript:document.formPython.submit();">python</a>
                    </form>
                    <form name="formJava" method="post" action="browse.php">
                    <input type="hidden" name="lang" value=" java">
                    <a href="#" onclick="javascript:document.formJava.submit();">java</a>
                    </form>
                    <form name="formC" method="post" action="browse.php">
                    <input type="hidden" name="c/c++" value=" c/c++">
                    <a href="#" onclick="javascript:document.formC.submit();">c/c++</a>
                    </form>
                    <form name="formRuby" method="post" action="browse.php">
                    <input type="hidden" name="ruby" value=" ruby">
                    <a href="#" onclick="javascript:document.formRuby.submit();">ruby</a>
                    </form>
                    <form name="formPhp" method="post" action="browse.php">
                    <input type="hidden" name="php" value=" php">
                    <a href="#" onclick="javascript:document.formPhp.submit();">php</a>
                    </form>
                    <form name="formJavascript" method="post" action="browse.php">
                    <input type="hidden" name="javascript" value=" javascript">
                    <a href="#" onclick="javascript:document.formJavascript.submit();">javascript</a>
                    </form>
                   </div>

            </div>
            <a id="nouv" href="nouv.php">nouveauté</a>
            <a id="tend" href="trend.php">tendance</a>
        </div>

    <section class="body-section">
        <form action="upload-manager.php" method="post" class="form" enctype="multipart/form-data">
                <input type="file" name="photo" id="fileSelect" >
               <input type="submit" id="submit-file" name="submit" value="Upload">
        </form>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="get">
        <img id="profile-pic" src="<?php echo $_SESSION['picture'].'?'.rand(1,300); ?>" width="100" height="100" />

        <h1 id="names"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></h1>
        <div class="toolsbox">
            <a href="#"><img id="like" width="25" height="25" src="img/like.png" /></a>
            <br />  <a id="heart" href="#"><img width="25" height="25" src="img/heart.png" /></a>
            <br />   <a id="flag" href="#"><img width="25" height="25" src="img/flag.jpg" /></a>
        </div>
        <label id="resume">auto résumé</label>
        <textarea id="resumetext" name="resume" width="250px" height="150px" ><?php echo $_SESSION['resume']; ?></textarea>
        <label id="nom" class="labeltext">nom</label><input type="text" name="nom" id="nomtext" class="text" value="<?php echo $_SESSION['nom']; ?>"/>
        <br /><label id="Profession" class="labeltext">Profession</label><input type="text" name="profession" class="text" id="professiontext" value="<?php echo $_SESSION['profession']; ?>"/>
        <br /><label id="telephone" class="labeltext">telephone</label><input type="text" class="text" name="telephone" id="telephonetext" value="<?php echo $_SESSION['telephone']; ?>"/>
        <br /><label id="prenom" >prenom</label><input type="text" name="prenom"  id="prenomtext" value="<?php echo $_SESSION['prenom']; ?>"/>
        <br /><label id="pass1">password</label><input type="password" name="password"  id="pass1text" />
        <br /><label id="pass2" >confirm password</label><input type="password" name="password2"  id="pass2text" />
        <input type="submit" id="submit" class="button" name="submit" />


    </section>
    <footer class="footer">
        <h3>à propos</h3>
        <p>
            nous soutenons une communauté où les gens
            <br />apprennent,partagent et travaillent ensemble
            <br />pour créer des logiciels
        </p>
        <div class="button-grp">

        </div>
        <div class="Socialbar">
            <a href="#"><img src="img/fb.png"</a>
            <br />  <a href="#"><img src="img/ig.png"</a>
            <br />   <a href="#"><img src="img/tw.png"</a>
        </div>

    </footer>
</body>
</html>