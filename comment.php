<!--
Author: Peter Zhang
Date: 5/13/14
Note to self:
create table Comments (Name varchar(255), Comment varchar(5000), Time varchar(255), ID int);
create table Namelist (Name varchar(255), Firsttime varchar(255));

-->


<!doctype html>
<html>
<head>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="custom_styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
<title>
    Aldaron Consulting - Comment 
</title>
<meta charset="utf-8"> 
</head>

<body>
<div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand" id="heading-par">Aldaron Consulting</p>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="quotes.html">Quotes</a></li>
                    <li><a href="awesome.html">Our Awesomeness</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="contact.html">Contact Us</a></li>
                    <li class="active"><a href="#">Comments</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<?php
include 'sqlstore.php';
?>

    <div class="container">
        <div class="commentSection">
            <?php
                include 'sqlQueryComment.php';
            ?>
        </div>
        <form role="form" action="comment.php">
                <label for="inputName">Name: </label>
                <input type="text" class="form-control" name="name" id="nameInput" placeholder="Enter name">
                <label for="inputText">Comment: </label>
                <input type="text" class="form-control" name="comment" id="commentInput" placeholder="Enter comment">
                <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>

<hr>


</body>

<script src="CommentEditButtonHandler.js"></script>
</html>
