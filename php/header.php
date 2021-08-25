    <?php 
        require("php/db.php");
    ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/header.css">


    <title>Home</title>
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
           <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
               <script type="text/javascript">
           // Using jQuery.

                $(function() {
      $   ('form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('input[type=submit]').hide();
    });
});
</script>



       <form name="search" action="search-result.php" method="post">
        <input type="search" id="search-bar" name="search-bar" placeholder="Rechercher.." />
            <input type="submit" />
            </form>

        <div class="navbar2">
            <?php
            if(isset($_SESSION['email'])){
            echo '<a id="newpost" href="newpost.php">new post</a>';
            echo '<a id="signin" href="profile.php">profile</a>';
            echo '<a id="signup" href="signout.php">sign out</a>';
            }else{
            echo '<a id="signin" href="signin.php">sign in</a>';
            echo '<a id="signup" href="signup.php">sign up</a>';               
            }
            ?>
        </div>
    </div>
</body>
</html>