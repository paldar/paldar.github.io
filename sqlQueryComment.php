<?php
/**
 * @author Peter Zhang
 * Date: 5/12/14
 * sqlQueryComment.php
 * Querys comments in sql and populated the list in comment.php 
 */
function getInfoFromSql(){

    $db=new PDO("mysql:dbname=yzhang;host=localhost","yzhang","dkwbtdqsw");
    //$rows = $db->query("select * from Comments");
    $rows=$db->query("select Comments.*,Namelist.Firsttime from Comments join Namelist on Namelist.Name=Comments.Name");
    $commentSize=$db->query("select count(*) from Comments");
    $commentCount;
    foreach($commentSize as $row){
        $commentCount=$row["count(*)"];
    }
    echo ("
        <div class=\"row\">
            <div class=\"panel panel-default widget\">
                <div class=\"panel-heading\">
                    <span class=\"glyphicon glyphicon-comment\"></span>
                    <h3 class=\"panel-title\">
                        Comments</h3>
                    <span class=\"label label-info\">".
                        $commentCount
                        ."</span>
                </div>
                <div class=\"panel-body\">
                    <ul class=\"list-group\">
           ");
    foreach ($rows as $row) {
        populateRow($row["Name"],$row["Comment"],date("Y-m-d h:i:s",$row["Time"]),
                date("Y-m-d h:i:s",$row["Firsttime"]),$row["ID"],$db);
    }
echo("
                    </ul>
                </div>
            </div>
        </div>");
    //disconnect
    $db=null;
}

function populateRow($userNameFromSql,$commentStringFromSql,$timeString,$firstTime,$id,$db){
    //Note: I'm doing a timestamp + id as the id for the buttons so that the
    //serial number can be completely unique.

    //do an internal query here to get count of each user:
    $rows=$db->query("select count(*),Comments.*,Namelist.Firsttime from Comments join Namelist on Namelist.Name=Comments.Name where Comments.Name=\"" . $userNameFromSql . "\"");
    $count=0;
    foreach($rows as $row){
        $count=$row["count(*)"];
    }
    echo "<li class=\"list-group-item\" id=\"Commentli".$id."\">
<div class=\"row\">
    <div class=\"col-xs-2 col-md-1\">
        <img src=\"https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcThE9nQrl5iuzvtRS2d5sOZegqzOvxu0t_9Ox8uhDBxzpaKeCSu\" class=\"img-circle img-responsive\" alt=\"\" /></div>
    <div class=\"col-xs-10 col-md-11\">
        <div>
            <div class=\"mic-info\">
                #".$id." By: ".$userNameFromSql." on ".$timeString.", who first visited on ".$firstTime." and has ".$count." comments.
            </div>
        </div>
        <div class=\"comment-text\" id=\"Comment".$id."\">
            ".$commentStringFromSql."
        </div>
        <div class=\"action\">
            <button type=\"button\" id=\"EditComment".$id."\" class=\"btn btn-primary btn-xs\" title=\"Edit\">
                <span class=\"glyphicon glyphicon-pencil\"></span>
            </button>
        </div>
    </div>
</div>
</li>";
}

getInfoFromSql();

?>
