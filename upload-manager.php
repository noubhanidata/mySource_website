<?php
  require("php/db.php");
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("img/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $filename);
                echo "Your file was uploaded successfully.";
                $newName = $_SESSION['email'];
                unlink("img/profiles/".$newName.'.jpg');
                $newFullPath = "img/profiles/" . $_SESSION['email'].".jpg";
                rename("img/" . $filename,"img/profiles/" . $_SESSION['email'].".jpg");
                $_SESSION['picture'] = $newFullPath ;
                $email = $_SESSION['email'];
                $sql = "UPDATE users SET picture='$newFullPath' WHERE email='$email'";
                 if ($mysqli->query($sql) === TRUE) {
                echo "success";
                header ('Location: editerprofile.php');
                }

            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>