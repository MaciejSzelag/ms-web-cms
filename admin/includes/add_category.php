<div class="container">
<h1>Add Category</h1>
    <div class="table-wrap">
        <div class="form-wrap">
        <?php
                    $post_cat = new PostCategory();
                   
                    // $select_cat = new PostCategory();

                    if(isset($_POST['add_cat'])){
                        $post_cat->post_cat_name();
                        $post_cat->add_category($post_cat->name);
                        $msg = "Categry has been added successfully";
                        $post_cat->name = null;
                    }

        ?>
            <form action="" method="post">
                <h3>Add category</h3>
                <div class="form-group">
                    <label for="">Category name</label>
                   
                    <input type="text" name="post_cat_name" placeholder="Add new category" >
                </div>
             
                <div class="form-group">
                    <input type="submit" name="add_cat" value="Add contact">
                </div>
            </form>
            <?php if(!empty($msg)) echo '<div class="alert success">'.  $msg . '</div>'; ?>
     

            <?php include "edit/edit_category.php"; ?>

<!-- edit item -->
        </div>
        <table class="small"> 
            <thead>
                <tr>
                    <th></th>
                    <th>Contact details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               <?php
              $select_categories = $post_cat->select_all_category();
              for($x=1; $x<=mysqli_num_rows($select_categories); ) {
               while($cat_name = mysqli_fetch_assoc($select_categories)){;
                    $post_cat->cat_name($cat_name);
                 
               ?>
     
            <tr>
                    <td><?php echo $x++; ?></td>
                    <td><?php echo $post_cat->name; ?></td>
                    <td><a href="index.php?source=add_category&edit=<?php echo $post_cat->id;?>">Edit</a></td>
                    <td><a href="index.php?source=add_category&delete=<?php echo $post_cat->id;?>">Delete</a></td>
            </tr>
            <?php } } ?>
                <?php 
               deletePosition($post_cat->id, 'post_category','post_cat_id', 'index.php?source=add_category');
             ?>
 
            </tbody>
        </table>
    </div>
</div>