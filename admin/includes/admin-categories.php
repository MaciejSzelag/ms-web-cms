<div class="container">
<h1>Categories</h1>
    <div class="table-wrap">
        <div class="form-wrap">
        <?php 
            if(isset($_POST['add_category'])){
                             $category_name = $_POST['category_name'];       
                $category_name = mysqli_real_escape_string($connection, $category_name);
                $query = "INSERT INTO categories_name(category_name) VALUES  ('$category_name')";
                $insert_category_query= mysqli_query($connection, $query);
                        if(!$insert_category_query){
                            die(mysqli_error($connection));
                        }
            }
        ?>
            <form action="" method="post">
                <h3>Add Category</h3>
                <div class="form-group">
                    <label for="">Category name</label>
                    <input type="text" name="category_name" placeholder="Category name">
                </div>
          
                <div class="form-group">
                    <input type="submit" name="add_category" value="Add Category">
                </div>
            </form>
<!-- edit item -->
        <?php 
            if(isset($_GET['edit'])){
                $category_name_id = $_GET['edit'];
                $query = "SELECT * FROM categories_name WHERE category_id = $category_name_id";
                $select_category_query = mysqli_query($connection, $query);
                                $row_edit_category = mysqli_fetch_assoc($select_category_query);
                $category_id =$row_edit_category['category_id'];
                $category_name = $row_edit_category['category_name'];
        ?>
            <form action="" method="post">
                <h3>Edit category</h3>
                <div class="form-group">
                    <label for="">Category name</label>
                    <input type="text" name="category_name"   value="<?php echo $category_name;?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="update_category" value="Update contact">
                </div>
            </form>
            <?php
                if(isset($_POST['update_category'])){
                    $category_name = $_POST['category_name'];
                    $category_name = mysqli_real_escape_string($connection, $category_name);
                    $query = "UPDATE categories_name SET category_name = '$category_name' WHERE category_id = $category_name_id";
                    $update_category_query = mysqli_query($connection, $query);
                    if(!$update_category_query){
                        die(mysqli_error($connection));
                    }
                }
            ?>
        <?php   } ?>
<!-- edit item -->
        </div>
        <table class="small"> 
            <thead>
                <tr>
                <th>ID</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $query = "SELECT * FROM categories_name";
                $select_category = mysqli_query($connection, $query);
                while($category_row = mysqli_fetch_assoc($select_category)){
                    $category_id = $category_row['category_id'];
                    $categories_name = $category_row['category_name'];
                ?>
                <tr>
                        <td><?php echo $category_id; ?> </td>
                        <td><?php echo $categories_name; ?></td>
                        <td><a href="index.php?source=admin-categories&edit=<?php echo $category_id;?>">Edit</a></td>
                        <td><a href="index.php?source=admin-categories&delete=<?php echo $category_id;?>">Delete</a></td>
                </tr>
                    <?php
                    //delete
                    deletePosition($category_id, 'categories_name','category_id', 'index.php?source=admin-categories');
                    ?>
                <?php } ?>    
            </tbody>
        </table>
    </div>
</div>