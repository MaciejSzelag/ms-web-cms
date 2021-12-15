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
                <a href="">
                    <div class="blog-box">
                        <div class="box-img">
                            <div class="img-wrap">
                                <img src="images/laptop-634x640.png" alt="">
                            </div>
                        </div>
                        <div class="box-content">
                            <h1>Title</h1>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aliquid praesentium eaque laudantium saepe quo nulla, odio dolores tenetur doloremque in hic nostrum et porro veniam illo vitae. Nesciunt, hic?</p> -->

                           <p> <?php echo substr("Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aliquid praesentium eaque laudantium saepe quo nulla, odio dolores tenetur doloremque in hic nostrum et porro veniam illo vitae. Nesciunt, hic?", 0,150);?>...</p>
                            <span>Published: 12/12/2021</span>
                        </div>



                    </div>
                </a>

                <a href="">
                    <div class="blog-box">
                        <div class="box-img">
                            <div class="img-wrap">
                                <img src="images/laptop-startup_640-640.png" alt="">
                            </div>
                        </div>
                        <div class="box-content">
                            <h1>Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aliquid praesentium eaque laudantium saepe quo nulla, odio dolores tenetur doloremque in hic nostrum et porro veniam illo vitae. Nesciunt, hic?</p>
                            <span>Published: 12/12/2021</span>
                        </div>



                    </div>
                </a>

                <a href="">
                    <div class="blog-box">
                        <div class="box-img">
                            <div class="img-wrap">
                                <img src="images/portfolio_640.jpg" alt="">
                            </div>
                        </div>
                        <div class="box-content">
                            <h1>Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aliquid praesentium eaque laudantium saepe quo nulla, odio dolores tenetur doloremque in hic nostrum et porro veniam illo vitae. Nesciunt, hic?</p>
                            <span>Published: 12/12/2021</span>
                        </div>



                    </div>
                </a>



            </div>



        </main>







    </div>
</div>
<?php  include "includes/footer.php"; ?>