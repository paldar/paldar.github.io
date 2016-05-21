<?php
/**
 * @author Peter Zhang
 * Date: 5/12/14
 * sqlstore.php
 * Stores comments with ID and time to SQL
 */
    $db=new PDO("mysql:dbname=yzhang;host=localhost","yzhang","dkwbtdqsw");
    if(isset($_GET['comment']) and isset($_GET['name'])){
        //since I'm doing a database query anyway, I might as well just store
        //the id inside the database.
        $commentSize=$db->query("select count(*) from Comments");
        $commentCount;
        foreach($commentSize as $row){
            $commentCount=$row["count(*)"];
        }
        $commentCount++;
        //echo "<p>".$_GET['name']."</p>";
        $curTime = time();
        $insertString = "insert into Comments values('" . $_GET['name'] . "', '"
                    . $_GET['comment'] ."','".$curTime."','".$commentCount. "')";
        //echo "<p>".$insertString."</p>";
        //I need to record user and visit time if they are visiting for the
        //first time.
        $queryString="select count(1) from Comments where Name='".$_GET['name']."'";
        $userCommentSize=$db->query($queryString);
        $userCommentCount;
        foreach($userCommentSize as $row){
            $userCommentCount=$row["count(1)"]; 
        }
        $userCommentCount=intval($userCommentCount);
        if($userCommentCount==0){
            //new user:
            $insertString2 = "insert into Namelist values('" . $_GET['name'] . "', '"
                        .$curTime."')";
            $db->exec($insertString2);
        }
        /*
        else{
            echo "<script> alert(\"".$userCommentCount."\")</script>"; 
        }
         */
        $db->exec($insertString);
        
    }
    $db=null;
?>
