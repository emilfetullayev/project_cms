       



       <form action="" method="post">
                                <div class="form-group">
                                    <label>Edit Category</label>

                                           <?php
                                           if(isset($_GET['edit'])) {
                                              $cat_id = $_GET['edit'];
                                              $query = "SELECT * FROM categories WHERE cat_id = '$cat_id'"; 

                                               $select_categories = mysqli_query($connection, $query);

                                               while ($row = mysqli_fetch_assoc($select_categories)) {
                           $cat_id = $row['cat_id'];             
                           $cat_title = $row['cat_title'];
                    

                                  ?>
                                      <!-- //value daxilinde isset yazada bilerik yazmiyada -->
                                      <input type="text" class="form-control" value="<?php if(isset($cat_title)){echo $cat_title;}?>"  name="cat_title">


                                        <?php }} ?>

                         <?php
                                       if(isset($_POST['update'])) {
                                       
                                             $cat_title=$_POST['cat_title'];
                                       $sql_query="UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$cat_id' ";
                                         $update_query = mysqli_query($connection, $sql_query);
                                                if(!$update_query) {
                                                    die('Query Failed' .  mysqli_error($cennection));
                                                }
                                       }
                                    
                        
                          
                                           ?>




                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
                                </div>
                            </form>