<?php  

// faltu file hai 

include "config.php";
if(isset($_FILES['fileToUpload'])){
$error= array();
$file_name=$_FILES['fileToUpload']['name'];
$file_size=$_FILES['fileToUpload']['size'];
$file_tmp=$_FILES['fileToUpload']['tmp_name'];
$file_type=$_FILES['fileToUpload']['type'];
#$file_ext= end(explode('.',$file_name));
#$file_ext =explode('.',$file_name);
#$extension = ["jpeg","png","jpg","JPG"];

if($file_size>2097152)
{
    $error="file size must be 2 mb or lower";
}

if(empty($error)== true){
    move_uploaded_file($file_tmp,"upload/".$file_name);
}
else{
    print_r($error);
    die();
}
}
session_start();
$author= $_SESSION["user_id"];

$title= mysqli_real_escape_string($conn,$_POST['post_title']);
$description= mysqli_real_escape_string($conn,$_POST['postdesc']);
$category= mysqli_real_escape_string($conn,$_POST['category']);
$date= date("d M,Y");

$sql = "insert into post (title, description, category,post_date,author,post_img) values('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}');";
$sql1="update category set post =post+1  where category_id = '{$category}'";
if(mysqli_multi_query($conn, $sql)){
    mysqli_query($conn,$sql1);
    header("location:http://localhost:8080/learn/news/newstemplate/news-template/admin/post.php");
}else{
    echo"<div class='alert alert-danger '> query faild</div>";
}
# /*
?> 
