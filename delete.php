<?php
require("php/db.php");
            if(isset($_POST['user'])){
            $user = $_POST['user'];
            $deletStatus = $mysqli->query("DELETE FROM users WHERE email='$user'");
                           header ('Location: admin.php');
}else{
	        $post = $_POST['post'];
            $deletStatus = $mysqli->query("DELETE FROM posts WHERE titre='$post'");
            unlink("posts/".$post.".zip");
                           header ('Location: admin.php');

}
?>