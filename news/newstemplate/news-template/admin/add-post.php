<?php include "header.php"; ?>





  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading"> Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <?php //echo $_SERVER['PHP_SELF']; ?>
                  <form  action="savepost.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                        <!-- catagory -->
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" disabled> Select Category</option>
                          
                          <?php 
                          include "config.php";
                          $sql1= "select * from category ";


                          $result=mysqli_query($conn,$sql1) or die("query unsucessfull");
                          if(mysqli_num_rows($result)>0)
                         {
                            while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<option value='{$row['category_id']}' > {$row["category_name"]} </option>";
                        }
                        }
                         ?>
                            </select>


                        <!-- catagory end  -->


                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload"  accept=".jpg,.jpeg,.png" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
  <?php  



// add post 


// include "config.php";
// if(isset($_FILES['fileToUpload'])){
// $error= array();
// $file_name=$_FILES['fileToUpload']['name'];
// $file_size=$_FILES['fileToUpload']['size'];
// $file_tmp=$_FILES['fileToUpload']['tmp_name'];
// $file_type=$_FILES['fileToUpload']['type'];
// #$file_ext= end(explode('.',$file_name));
// #$file_ext =explode('.',$file_name);
// #$extension = ["jpeg","png","jpg","JPG"];

// if($file_size>2097152)
// {
//     $error="file size must be 2 mb or lower";
// }

// if(empty($error)== true){
//     move_uploaded_file($file_tmp,"upload/".$file_name);
// }
// else{
//     print_r($error);
//     die();
// }
// }
// $author= $_SESSION["user_id"];

// $title= mysqli_real_escape_string($conn,$_POST['post_title']);
// $description= mysqli_real_escape_string($conn,$_POST['postdesc']);
// $category= mysqli_real_escape_string($conn,$_POST['category']);
// $date= date("d M,Y");

// $sql = "insert into post (title, description, category,post_date,author,post_img) values('{$title}','{$description}','{$category}','{$date}','{$author}','{$file_name}')";
// $sql1="update category set post =post+1  where category_id = '{$category}'";
// if(mysqli_multi_query($conn, $sql)){
//     mysqli_query($conn,$sql1);
//     header("location:http://localhost:8080/learn/news/newstemplate/news-template/admin/post.php");
// }else{
//     echo"<div class='alert alert-danger '> query faild</div>";
// }
// # /*
?>
<?php include "footer.php"; ?>
