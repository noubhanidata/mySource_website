<?php
    require('php/db.php');
        $users = $mysqli->query("SELECT * FROM users");
        $posts = $mysqli->query("SELECT * FROM posts");
       // $num_of_users = $users->num_rows;
        //$num_of_posts = $posts->num_rows;
        $usersList = array(array());
        $postsList = array(array());
        $user_row_no = 0;
        $post_row_no = 0;
        //$usersColumns=$users->num_rows;
        //$postsColumns=$posts->num_rows;
      
               // $res->data_seek($row_no);
        //$row = $res->fetch_assoc();

 
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/admin.css">

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


    <div class="profil">
        <label id="label1" for="search-bar-user"> utilisateurs: 
        </label>
        <table class="table1">
            <tr>
                <th width="20%">
                    nom
                </th>
                <th width="20%">
                    prenom
                </th>
                <th width="20%">
                    email
                </th>
                <th width="30%">
                    telephone
                </th>
                <th width="10%">
                    delete
                </th>
            </tr>
               <?php while($row = $users->fetch_assoc()): ?>
             <tr>
                <td width="20%"><?php echo $row['nom']; ?></td>
                <td width="20%"><?php echo $row['prenom']; ?></td>
                <td width="20%"><?php echo $row['email']; ?></td>
                <td width="20%"><?php echo $row['telephone']; ?></td>
                <td width="20%"><form name="formDelete" method="post" action="delete.php">
                    <input type="hidden" name="user" value="<?php echo $row['email']; ?>">
                    <button  onclick="javascript:document.formDelete.submit();">delete</button>
                    </form></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <label id="label1" for="search-bar-posts"> posts: </label>
        </label>
        <table class="table1">
            <tr>
                <th class="th1">
                    post
                </th>
                <th width="20%">
                    auteur
                </th>
                <th wirth="10%">
                    description
                </th>
                <th width="10%">
                    langage
                </th>
                <th width="10%">
                    section
                </th>
                <th width="10%">
                    delete
                </th>
            </tr>
            <?php while($row = $posts->fetch_assoc()): ?>
             <tr>
                <td width="20%"><?php echo $row['titre']; ?></td>
                <td width="20%"><?php echo $row['email']; ?></td>
                <td width="20%"><?php echo substr($row['description'],0,100); ?></td>
                <td width="20%"><?php echo $row['language']; ?></td>
                <td width="20%"><?php echo $row['section']; ?></td>
                <td width="20%"><form name="formDelete" method="post" action="delete.php">
                    <input type="hidden" name="post" value="<?php echo $row['titre']; ?>">
                    <button  onclick="javascript:document.formDelete.submit();">delete</button>
                    </form></td>
            </tr>
            <?php endwhile; ?>
        </table>






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
                <a href="#" ><img src="img/fb.png"</a>
                <br />  <a href="#" ><img src="img/ig.png"</a>
                <br />   <a href="#" ><img src="img/tw.png"</a>
            </div>

        </footer>
</body>
</html>