<?php include "includes/db.php";?>
<?php include "admin/functions.php"; ?>
<?php include "admin/class/Classes.php"; ?>
<?php session_start(); ?>
<?php 
$posts = new Post();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $tabTitle; echo $tabTitle ." | Maciej Szelag Freelance Web Designer &  Developer";?></title>
        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/all.min.css">
      

    </head>

    <body>
           <!-- navigation  -->
        <?php include "includes/navigation.php"; ?>
           <!-- navigation  -->