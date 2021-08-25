   <?php
   if (session_status() == PHP_SESSION_NONE) {
                 session_start();
                //$_SESSION["email"] = FALSE;
                // $_SESSION["password"] =FALSE;
         }
   $mysqli = mysqli_connect("localhost", "root", "", "mysource");
     if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
     
     ?>