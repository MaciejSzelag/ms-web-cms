<?php 
if(isset($_POST['add_post'])){
    $post = new Post();
    $post->addPost();
}
?>
<div class="container">
<h1>Add new post</h1>
    <div class="table-wrap">
        <div class="form-wrap"> 
        <form action="" method="post" enctype="multipart/form-data">

                <!-- <h3>Add new post</h3> -->
                <div class="form-group">
                    <label for="">Post category</label>
                    <select name="post_category" >
                        <option value="">Select post category</option>
                        <option value="SEO">SEO</option>
                        <option value="Web Application">Web Application</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Post title</label>
                    <input type="text" name="post_title" placeholder="Post title " >
                </div>
                <div class="form-group">
                    <label for="">Post author</label>
                    <input type="text" name="post_author" placeholder="Author" required>
                </div>
                <div class="form-group">
                    <label for="">Post status</label>
                    <select name="post_status" >
                        <option value="Draft">Select Status</option>
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_image">Picture</label>
                    <input type="file"  name="image">
                </div>
                <div class="form-group">
               
                    <label for="summernote">Post Content</label>
                    <textarea class="form-control" name="post_content" id="summernote" cols="60" rows="10"></textarea>
               
                <div class="form-group">
                    <input type="submit" name="add_post" value="Publish post">
                </div>
        </form>
        </div>
    </div>
</div>