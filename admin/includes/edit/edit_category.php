<?php 
    if(isset($_GET['edit'])){
        $get_id = $_GET['edit'];
               $select_categories = $post_cat->select_where($get_id);
            while($cat_name = mysqli_fetch_assoc($select_categories)){
                $post_cat->cat_name($cat_name);
?>
            <div class="form-wrap">
                <form action="" method="post">
                    <h3>Edit category</h3>
                    <div class="form-group">
                        <label for="">New category name</label>
                        <input type="text" name="post_cat_name" value="<?php echo $post_cat->name; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update_cat" value="Update">
                    </div>
                </form>
            </div>
<?php       } 
}?>
<?php
if(isset($_POST['update_cat'])){
    $category_name = $post_cat->post_cat_name();
    $post_cat->edit_category($get_id, $category_name);
}
?>