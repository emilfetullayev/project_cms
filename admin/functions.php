<?php

function comfirm($result) {
    global $connection;
   if(!$result) {
      die("QUERY FAILED ." . mysqli_error($connection));
  }

}

  function insert_categories() {

  	   global $connection;

           if(isset($_POST['submit'])) {

                                   $cat_title = $_POST['cat_title'];
                                  //empty parametre olaraq girilen deyerin bos olub olmadigini yoxlayit
                                  if(empty($cat_title)) {
                                    echo "This field sholud not be em";
                                  }else {
                                    $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";

                                    $select_category_query = mysqli_query($connection, $query);

                                    if(!$select_category_query) {
                                        die('QUERY Failed' . mysqli_error($connection));
                                    }
                                  }
                              }
                         }




function findAllCategories(){
	   global $connection;

	     $query = "SELECT * FROM categories";
                        
          $select_categories_sidebar = mysqli_query($connection, $query);
                                       
          while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
           $cat_id = $row['cat_id'];             
              $cat_title = $row['cat_title'];
                       
                    echo "<tr>";
                       echo "<td>{$cat_id}</td>";
                         echo "<td>{$cat_title}</td>";
                           echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                            echo "</tr>";
                        }

}




function deleteCategories() {

         global $connection;
	     if(isset($_GET['delete'])) {
           $the_cat_id = $_GET['delete']; 
           $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
           $delete_query = mysqli_query($connection, $query);
           header("Location: categories.php");
                                       }
            else {
                echo 'Alinmadi';
                 }
}













?>