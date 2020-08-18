<?php  


$link = mysqli_connect("localhost", "root", "Jonathan@123","cfg");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else 
{
  echo "";
}
session_start();
echo "";
$id=$_SESSION['id'];
$links=$_POST['link'];
$title=$_POST['title'];

        $query="insert into `links`(classid,link,title) values ('$id','$links','$title')";
        $result=mysqli_query($link,$query);

        if($result){
        
        header("Location: Teacher_view.php");

        
	}
	else{
    
        
    header("Location: Teacher_view.php");
	}
?>