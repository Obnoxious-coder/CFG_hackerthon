<?php
include('preincludes/dbh.php');
include('preincludes/session.php');
$classid=$_SESSION['id'];
$title=$_POST['title'];
$link=$_POST['link'];
$query="insert into links (classid,link,title) values ('$classid','$link','$title')";
$result=mysqli_query($link,$query);

 
?>