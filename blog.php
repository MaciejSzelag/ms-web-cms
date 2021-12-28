<?php $tabTitle = "Blog"; include "includes/head.php";?>
<div class="content">
    <div class="row">
        <div class="blog-header">
            <div class="header-wrap">
                <div class="page-title">
                    <h1>What is what?</h1>
                </div>
            </div>
        </div>
        <main class="main-blog">
            <div class="main-wrap">

            <?php 
        

           
            $select_all_posts = $posts->select_all_posts();
            // $rows = new Post();

            while($row = mysqli_fetch_assoc($select_all_posts)){
                $posts->all_rows($row);
            ?>


                <a href="post.php?post_id=<?php echo $posts->id; ?>">
                    <div class="blog-box">
                        <div class="box-img">
                            <div class="img-wrap">
                                <img src="images/<?php echo $posts->image; ?> " alt="">
                            </div>
                        </div>
                        <div class="box-content">
                            <h1><?php echo $posts->title; ?></h1>
                            <p> <?php echo substr($posts->content, 0,350);?>...</p>
                            <span>Published: <?php echo $posts->published; ?> by <?php echo $posts->author; ?></span>
                        </div>



                    </div>
                </a>
            <?php } ?>
        

        
            </div>



        </main>







    </div>
</div>
<?php  include "includes/footer.php"; ?>