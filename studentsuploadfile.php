<?php
include('preincludes/dbh.php');
include('preincludes/session.php');


if(isset($_POST['but_upload'])){
  
  $assign_no=$_POST['ass_no'];
  $file=$_FILES['file']; 

  $fileName=$_FILES['file']['name'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  $fileType=$_FILES['file']['type'];

  $fileExt=explode('.',$fileName);
  $fileactualext=strtolower(end($fileExt));

  $allow=array('jpg','jpeg','png','mp4','pdf');
  if(in_array($fileactualext,$allow)){
    if($fileError === 0){
      if($fileSize < 10000000000){
        $filenamenew=uniqid('',true).".".$fileactualext;
        $filedest='uploads/'.$filenamenew;
        $query="insert into file_map(classid,name,filename,assign) values ('".$_SESSION['id']."','".$_SESSION['name']."','".$filenamenew."','".$assign_no."')";
        $result=mysqli_query($link,$query);
        if(!$result){
        die('Query Failed');}
        
        move_uploaded_file($fileTmpName,$filedest);
        header("Location:Student_view.php");
    }
    else{
      echo "Too big";
    }
  }
    else{
      echo "Error uploading your file";
    }
  }
  else{
    echo "Invalid type";
  }
}
 
?>