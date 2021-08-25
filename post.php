<?php //this page requires the variable $titre to be passed from another page
// smtg like this http://localhost/mysource/post.php?$titre=general-downloader+api
    require('php/db.php');
    require("php/header.php");
    //$email = $_SESSION['email'];
        $titre =$_POST['submit'];  //"version19DuProj"; //http://localhost/mysource/post.php?$titre=version19DuProj
        $log = $mysqli->query("SELECT * FROM posts WHERE titre='$titre' ");
        $data = $log->fetch_assoc();
        var_dump($data);
         //var_dump($data['titre']);
       // $titre =$data['titre'];
        $description=$data['description'];
        $section=$data['section'];
        $langage=$data['language'];
        $email = $data['email'];

    
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/post.css">

    <title></title>
</head>
<body>

    <div class="profil">
        <h1 align="center"><?php echo $data['titre']; ?></h1>

        <div class="div_bar">
            <p class="p1">section:  <span class="section"><?php echo $section; ?></span></p>
            <p class="p1">langage: <span class="section"><?php echo $langage; ?></span></p>
        </div>
        <div class="download">
            <a href="<?php echo 'posts/'.$titre.'.zip'; ?>"><img id="telecharger" src="img/download.png" height="100" width="100" /></a>
        </div>

        <div class="description">
            <p><?php echo $description; ?></p>
        </div>
        <form name="authorForm" method="post" action="profile.php">
        <input type="hidden" name="authorEmail" value="<?php echo $email; ?>">
        <a id="author-email" href="#" onclick="javascript:document.authorForm.submit();"><?php echo $email; ?></a>
        </form>
    </div>
   <?php  require("php/footer.php"); ?>
</body>
</html>