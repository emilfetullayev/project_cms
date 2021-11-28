   <?php
             if(isset($_GET['p_id'])) {
               $the_post_id = $_GET['p_id'];
               }
          $query = "SELECT * FROM posts WHERE  post_id=' $the_post_id'";
                        
          $select_posts_by_id = mysqli_query($connection, $query);
          $data = mysqli_fetch_assoc( $select_posts_by_id);

                                       
          while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
           $post_id = $row['post_id'];             
              $post_author = $row['post_author'];
              $post_title = $row['post_title'];

              $post_category_id = $row['post_category_id'];

              $post_status = $row['post_status'];

              $post_image = $row['post_image'];
               $post_content = $row['post_content'];

              $post_tags = $row['post_tags'];

              $post_comment_count = $row['post_comment_count'];

              $post_date = $row['post_date'];

}
            
            if(isset($_POST['update_post'])) {
              $RandomAccountNumber = uniqid();
                $id = $_POST['post_id'];
              $post_author = $_POST['author'];
              $post_title = $_POST['post_status'];
              $post_status = $_POST['post_status'];
              $post_image =  $_FILES['post_image']['name'];
              $c_image_temp=$_FILES['post_image']['tmp_name'];
              $ad =   uniqid() . $post_image ;
               $post_content = $_POST['post_content'];
                 $post_categories = $_POST['post_categories'];
                  $post_tags = $_POST['post_tags'];
              $post_status = $_POST['post_status'];
              $post_comment_count = $_POST['post_comment_count'];
               // $post_date = $_POST['post_date'];

                $RandomAccountNumber = uniqid();
                move_uploaded_file($c_image_temp,  "../images/$ad");
                
                //If the image is empty, do not reset it
                if(empty($post_image)) {
                  $query = "SELECT * FROM posts WHERE post_id =  $the_post_id";
                  $select_image = mysqli_query($connection, $query);

                  while($row = mysqli_fetch_array($select_image)) {
                     $ad = $row['post_image'];
                  }
                }

                $sql =   "UPDATE posts SET post_author = '$post_author', post_title = '$post_title',
                   post_status = '$post_status', post_category_id = '$post_categories', post_image = '$ad', post_content = '$post_content',
                 post_tags = '$post_tags', post_status = '$post_status',
                    post_comment_count = '$post_comment_count' WHERE post_id = '$the_post_id'";
                    // print($sql);
              

                        if(mysqli_query($connection,$sql))
        {
            // header('location:posts.php');
        }
        else 
        {
            echo 'not updated';
        }
            }
            // header( 'Location: edit_post.php' );

   ?>

   <form action="" method="post" enctype="multipart/form-data">        
      <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo  $data['post_title'];; ?>" type="text" class="form-control" name="title">
      </div>
      <div class="form-group">
             <select name='post_categories' id=''>
               <?php
                 $query = "SELECT * FROM categories"; 
                 $select_categories = mysqli_query($connection, $query);

                  // confirmQuery($select_categories);

                   while ($row = mysqli_fetch_assoc($select_categories)) {
                           $cat_id = $row['cat_id'];             
                           $cat_title = $row['cat_title'];                     
                           echo "<option value='$cat_id'>{$cat_title}</option>";
                  }

               ?>
             </select>
      
      </div>

       
       <div class="form-group">
             <label for="title">Post Author</label>
             <input value="<?php echo  $data['post_author']; ?>" type="text" class="form-control" name="author">            
      </div>
         
        <div class="form-group">
    <!--    <label for="title">Post Author</label> -->
             <input  type="hidden" class="form-control" name="post_id">            
      </div>

         <div class="form-group">
              <label for="post_status">Post Status</label>
              <input value="<?php echo  $data['post_status']; ?>" type="text"  class="form-control" name="post_status">            
        </div>

      <div class="form-group">
              <img src="../images/<?php echo $data['post_image']; ?>" style="width: 80px;">  
              <input  type="file"  name="post_image">           
      </div>

       <div class="form-group">
               <label for="post_tags">Post Tags</label>
               <input value="<?php echo  $data['post_tags']; ?>" type="text" class="form-control" name="post_tags">             
      </div>
      <div class="form-group">
               <label for="post_tags">Post Comment Count</label>
               <input value="<?php echo  $data['post_comment_count']; ?>" type="text" class="form-control" name="post_comment_count">            
      </div>

       <div class="form-group">
               <label for="post_content">Post Content</label>
               <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo  $data['post_content'];; ?></textarea>            
       </div>
      
       <div class="form-group">
               <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
       </div>

</form>
    
