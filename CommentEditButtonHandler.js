/**
 * @author Peter Zhang 
 * Date: May 12, 2014, 11:47:20 PM
 * CommentEditButtonHandler.js 
 */

/*
 * basically create this:
 * 
        <form role="form" action="comment.php">
                <label for="inputName">Name: </label>
                <input type="text" class="form-control" name="name" id="nameInput" placeholder="Enter name">
                <label for="inputText">Comment: </label>
                <input type="text" class="form-control" name="comment" id="commentInput" placeholder="Enter comment">
                <input type="submit" class="btn btn-default">
        </form>
 */

function editButtonHandler(){
    var xmlhttp=new XMLHttpRequest();
    var count;
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            count=parseInt(xmlhttp.responseText);
            for(var i=1;i<count+1;i++){
                document.getElementById("EditComment"+i).setAttribute("onclick","addEditBox(event,"+i+")");
            }
        }
    }
    xmlhttp.open("GET","queryNumberComments.php",true);
    xmlhttp.send();
}
function addEditBox(event,i){
    //input box
    var input=document.createElement("input");
    input.setAttribute("type","text");
    input.setAttribute("class","form-control");
    input.setAttribute("name","modifiedComment");
    input.setAttribute("id","editComment"+i);
    input.setAttribute("placeholder","Edit comment...");
    //button
    var button=document.createElement("input");
    button.setAttribute("type","submit");
    button.setAttribute("class","btn btn-default");
    button.setAttribute("value","Submit");
    button.setAttribute("onclick","handleEditSubmission(event,"+i+")");

    var commentListItem=document.getElementById("Commentli"+i);
    commentListItem.appendChild(input);
    commentListItem.appendChild(button);
    //remove the original button to prevent erros:
    var buttonObject = event.target.parentNode.parentNode;
    buttonObject.removeChild(event.target.parentNode);
}

function handleEditSubmission(event,i){
    //send an ajax request to change the database entry:
    //first get the comment:
    var editedCommentString=document.getElementById("editComment"+i).value;
    //send request:
    var ajax=new XMLHttpRequest();
    ajax.open("GET","commentEdit.php?modifiedComment="+editedCommentString+"&id="+i,true);
    ajax.send();

    //now, change displaying text:
    document.getElementById("Comment"+i).textContent=editedCommentString;
}

editButtonHandler();

