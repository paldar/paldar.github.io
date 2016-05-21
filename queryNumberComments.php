<?php
/**
 * queryNumberComments.php
 * author: peter Zhang
 * echos a number of the current comment count.
 */
$db=new PDO("mysql:dbname=yzhang;host=localhost","yzhang","dkwbtdqsw");
$commentSize=$db->query("select count(*) from Comments");
$commentCount;
foreach($commentSize as $row){
    $commentCount=$row["count(*)"];
}
echo $commentCount;
$db=null;
?>
