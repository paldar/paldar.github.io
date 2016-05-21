<?php
/**
 * @author Peter Zhang
 * Date: 5/12/14
 * commentEdit.php
 * changes comment edited in comment.php
 */
function updateCommentWithID($id,$comment){
    $db=new PDO("mysql:dbname=yzhang;host=localhost","yzhang","dkwbtdqsw");
    /*
     * query string:
     * update Comments
    -> set Comment="valkoisen suomen puolesta"
    -> where ID=2;
     * 
     */
    $replaceString="update Comments set Comment=\"".$comment."\" where ID=".$id.";";
    $db->exec($replaceString);
}


    if(isset($_GET['modifiedComment']) and isset($_GET['id'])){
        updateCommentWithID($_GET['id'],$_GET['modifiedComment']);
    }
    $db=null;

?>