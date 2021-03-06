<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php include "class/Classes.php"; ?>
<?php ob_start();?>
<?php session_start(); ?>
<?php
    if($_SESSION['ms_user_role'] !== "ms_admin"){
        header('location: ../index.php');
    }
    if(!isset($_SESSION['ms_user_role'])){
        header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.min.css"> -->
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="css/adminStyle.css">
    <title><?php global $tabTitle; echo $tabTitle;?></title>
    <link rel="stylesheet" href="css/summernote-lite.css">
</head>
<body>
<nav>
    <div class="nav-wrap">
    <h1>Admin Panel</h1>
        <ul>
            <li><a href="../index.php">Home page</a></li>
      
            <li><a href="../admin/">Dashboard</a></li>
            <li><a href="index.php?source=contact-form-table">Inbox </a></li>
            <li><a href="index.php?source=contact-details">Contact Details</a></li>
          
           
            <li><a href="index.php?source=admin-categories">Categories </a></li>
            <li><a href="index.php?source=table-visits-by-ip">Vists by IP</a></li>
            <li class="dropdown">Posts 
                <ul class="dropdown-list">
                    <li><a href="index.php?source=all_posts">All posts</a></li>
                    <li><a href="index.php?source=add_post">Add post</a></li>
                    <li><a href="index.php?source=add_category">Add Category</a></li>
                </ul>
            </li>
            <li><a href="../includes/logout.php">Logout</a></li>
            
        </ul>
    </div>
    <div class="nav-wrap-top">
         <!-- <div class="date-wrap"> -->
         <div class="d-left"><i class="fas fa-bars"></i></div>
            <div class="d-right">   <?php if(isset($_SESSION['ms_user_name'])) echo "<p>Hello ".$_SESSION['ms_user_name']." </p>";?></p>
             <p><?php echo "Today is ".date('d M Y')?></p></div>


       

         <!-- </div> -->
    </div>

</nav>

    
