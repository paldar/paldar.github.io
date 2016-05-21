/**
 * commentRefresh.js
 * @author: Terrence Tan, Peter Zhang, Pratap Luitel, Stephen Morse
 * 
 * I recycled this code from our group project, with minor modifications to suit
 * my application.
 */
function refreshComments() {
	//if(!writing){
    console.log("dafsdf");
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
                //using jquery since it's already included....
                $(" div.commentSection").replaceWith(xmlhttp.responseText);
			}
		  }
		xmlhttp.open("GET","sqlQueryComment.php",true);
		xmlhttp.send();
	//}
}
//refreshComments();
window.setInterval(refreshComments, 10000);
