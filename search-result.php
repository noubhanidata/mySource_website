<?php
    require("php/db.php");
    require("php/header.php");
     //language
        $keyword = $_POST['search-bar'];
        $data = array(array());
        $res = $mysqli->query("SELECT titre,description FROM posts");
        $row_no = 0;
        $columns=$res->num_rows;
        while($row = $res->fetch_assoc()) {
       // for ($row_no = 0; $row_no < 2 ; $row_no++) {
       // $res->data_seek($row_no);
        //$row = $res->fetch_assoc();
        if(strpos($row['description'], $keyword) !== false){
        $data[$row_no] = array('titre' => $row['titre'],'description' => $row['description']);
        $row_no++;}
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

    <div class="result">
         <form method="post" action="post.php">
        <table class="table1">
           
            <tr><?php if($GLOBALS['row_no'] > 0) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value=""><h3><?php echo getTitle(0); ?></h3><p><?php echo substr(getDescription(0),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(0); ?>">go</button></div>
                </td><?php endif; ?>
                <?php if($GLOBALS['row_no'] > 1) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_2" value=""><h3><?php echo getTitle(1); ?></h3><p><?php echo substr(getDescription(1),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(1); ?>">go</button></div>
                </td>
                <?php endif; ?><?php if($GLOBALS['row_no'] > 2) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_3" value="version19DuProj"><h3><?php echo getTitle(2); ?></h3><p><?php echo substr(getDescription(2),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(2); ?>">go</button></div>
                </td>
            </tr><?php endif; ?>
            <tr><?php if($GLOBALS['row_no'] > 3) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="<?php echo getTitle(3); ?>"><h3><?php echo getTitle(3); ?></h3><p><?php echo substr(getDescription(3),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(3); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['row_no'] > 4) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(4); ?></h3><p><?php echo substr(getDescription(4),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(4); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['row_no'] > 5) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(5); ?></h3><p><?php echo substr(getDescription(5),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(5); ?>">go</button></div>
                </td>
            </tr><?php endif; ?><?php if($GLOBALS['row_no'] > 6) : ?>
            <tr>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(6); ?></h3><p><?php echo substr(getDescription(6),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(6); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['row_no'] > 7) : ?>
                <td>
                    <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(7); ?></h3><p><?php echo substr(getDescription(7),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(7); ?>">go</button></div>
                </td><?php endif; ?><?php if($GLOBALS['row_no'] > 8) : ?>
                <td>
                   <div class="box button" ><input type="hidden" name="td_1" value="version19DuProj"><h3><?php echo getTitle(8); ?></h3><p><?php echo substr(getDescription(8),0,100); ?></p><button class="button" id="submit-box" type="submit" name="submit" value="<?php echo getTitle(8); ?>">go</button></div>
                </td>
                                <?php endif; ?>
            </tr>
        </table>
        </form>

    </div>

 <?php require("php/footer.php"); ?>
</body>
</html>