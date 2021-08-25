<?php // every file is stored as name_lastname_filename in posts 
//change the storing method
  require("php/db.php");
  require("php/header.php");
if(isset($_POST['submit'])){
     $dropDownValues = array('','python','java','c/c++','ruby','php','javascript');           
     $titre =$_POST['titre'];
     $description=$_POST['description'];
     $section=$_POST['section'];
     $langage=$dropDownValues[$_POST['langage']];
     $email = $_SESSION['email'];
     

       if(empty($titre) || empty($description) || empty($section) ||empty($langage) || empty($email)){
        ?>
         <script>alert('veuillez remplir tout les champs');</script>
       <?php } else{
        if($mysqli->query("INSERT INTO posts(email,titre,description,language,section) VALUES ('$email','$titre','$description',' $langage','$section')")){
            //this is where the file upload starts 
            // Check if file was uploaded without errors
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
       // $allowed = array(".rar" , ".zip" , ".tar");
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filesize = $_FILES["file"]["size"];
    

        // Verify file size - 2GB maximum
        $maxsize = 2 * 1024 * 1024 * 1024;
        if($filesize > $maxsize) die("Erreur: fichier trop lar.");
    

            // Check whether file exists before uploading it
            if(file_exists("posts/" . $filename)){
                echo $filename . " exist deja.";
            } else{
                $nom = $_SESSION['nom'];
                $prenom = $_SESSIOn['prenom'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "posts/" . $nom ."_". $prenom ."_".$filename );
                rename( "posts/" . $nom ."_". $prenom ."_".$filename , "posts/" .$titre.".zip" );
               // echo "Your file was uploaded successfully.";
                echo "success";
            } 
    } else{
        echo "Erreur: " . $_FILES["file"]["error"];
    }
    //thi is where the file upload ends
                   header("Location: index.php");

        }else{       
             echo $mysqli->error;

    }
              }
}

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/newpost.css">

    <title>un nouveau post</title>
</head>
<body>

    <script src="js/drag&drop.js"></script>

    <div class="champ">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" enctype="multipart/form-data">
            <label id="label">fichier: </label>
            <input type="file" id="file" name="file" accept=".zip">
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"><p>drag and drop ur files here</p></div>

            <label id="label">titre: </label>
            <input type="text" id="input" name="titre" placeholder="a..." />

            <br /> <label id="label">description : </label>
            <textarea id="text-area" name="description" placeholder="a.."></textarea>

            <br /> <label id="label">section : </label>
            <input type="text" id="input" name="section" placeholder="a..." />

            <br /> <label id="label">langage : </label>
            <select id="dropdown" name="langage">
                <option value="0"></option>
                <option value="1">python</option>
                <option value="2">java</option>
                <option value="3">c/c++</option>
                <option value="4">ruby</option>
                <option value="5">php</option>
                <option value="6">javascript</option>
            </select>
            <br /><input id="butn" name="submit" class="button" type="submit" />
            <input id="butn" class="button" type="reset" />
        </form>
    </div>

</body>
</html>
<?php
  require("php/footer.php");
?>