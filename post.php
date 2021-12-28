<?php $tabTitle="
Post"; include "includes/head.php"; ?>



<div class="content">
    <div class="row">

        <?php 
     if(isset($_GET['post_id'])){
         $get_post_id = $_GET['post_id'];
         $select_post = $posts->select_post_where($get_post_id);
         $row = mysqli_fetch_assoc($select_post);
         $posts->all_rows($row);

     
       
        ?>
        <div class="post-wrap">
            <div class="post-head">
                <div class="post-bg-image">
                    <img src="images/<?php  echo $posts->image; ?>" alt="<?php  echo $posts->image; ?>">
                </div>
            </div>




            <div class="post-content">
                <div class="post-title">
                
                    <h1><?php  echo $posts->title; ?></h1>
                </div>
                <div class="post-text">
                <?php  echo $posts->content; ?>
                </div>
                <span class="s-p">Published  <?php  echo $posts->published; ?> by <?php  echo $posts->author; ?></span>
            </div>
        </div>

    <?php
    }
    ?>

    </div>
</div>


<?php  include "includes/footer.php"; ?>