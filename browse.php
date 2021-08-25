<?php
    require("php/db.php");
     //language
        $language =$_POST['lang'];
        $data = array(array());
        $res = $mysqli->query("SELECT titre,description FROM posts WHERE language='$language' ");
        $row_no = 0;
        $columns=$res->num_rows;
        while($row = $res->fetch_assoc()) {
       // for ($row_no = 0; $row_no < 2 ; $row_no++) {
       // $res->data_seek($row_no);
        //$row = $res->fetch_assoc();
        $data[$row_no] = array('titre' => $row['titre'],'description' => $row['description']);
        $row_no++;
       }
        function getTitle($number){
                return $GLOBALS['data'][$number]['titre'];
        }
           function getDescription($number){
                return $GLOBALS['data'][$number]['description'];
        }
 ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="css/browse.css">

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

    <div class="result">
         <form method="post" action="post.php">
        <table class="table1">
           
            <tr><?php if($GLOBALS['columns'] > 0) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value=""><h3><?php echo getTitle(0); ?></h3><p><?php echo substr(getDescription(0),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(0); ?>">go</button></div>
                </td><?php endif; ?>
                <?php if($GLOBALS['columns'] > 1) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_2" value=""><h3><?php echo getTitle(1); ?></h3><p><?php echo substr(getDescription(1),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(1); ?>">go</button></div>
                </td>
                <?php endif; ?><?php if($GLOBALS['columns'] > 2) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_3" value="version19DuProj"><h3><?php echo getTitle(2); ?></h3><p><?php echo substr(getDescription(2),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(2); ?>">go</button></div>
                </td>
            </tr><?php endif; ?>
            <tr><?php if($GLOBALS['columns'] > 3) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="<?php echo getTitle(3); ?>"><h3><?php echo getTitle(3); ?></h3><p><?php echo substr(getDescription(3),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(3); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['columns'] > 4) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(4); ?></h3><p><?php echo substr(getDescription(4),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(4); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['columns'] > 5) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(5); ?></h3><p><?php echo substr(getDescription(5),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(5); ?>">go</button></div>
                </td>
            </tr><?php endif; ?><?php if($GLOBALS['columns'] > 6) : ?>
            <tr>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(6); ?></h3><p><?php echo substr(getDescription(6),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(6); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['columns'] > 7) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(7); ?></h3><p><?php echo substr(getDescription(7),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(7); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['columns'] > 8) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(8); ?></h3><p><?php echo substr(getDescription(8),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(8); ?>">go</button></div>
                </td>
                                <?php endif; ?>
            </tr>
        </table>
        </form>
        <?php if($GLOBALS['columns'] > 9) : ?>
        <div class="page-nav">
            <a id="nouv" class="button" href="">precedent</a>
            <a id="nouv" class="button" href="">suivant</a>
        </div>
          <?php endif; ?>




    </div>

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