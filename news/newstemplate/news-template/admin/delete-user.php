<?php 
 include "header.php";
 if($_SESSION["user_role"]=='0'){ 
    header("location:http://localhost:8080/learn/news/newstemplate/news-template/admin/post.php");
  } 
 // include "config.php";
 $conn = mysqli_connect("localhost:3308","root","","news-site") or die("connection failed". mysqli_connect_error());

  $userid= $_GET['id'];

$sql= "DELETE FROM user WHERE user_id = {$userid} " ;
mysqli_query($conn,$sql) or die("unsuccessful");
    header("location:http://localhost:8080/learn/news/newstemplate/news-template/admin/users.php");

 mysqli_close($conn);

?>