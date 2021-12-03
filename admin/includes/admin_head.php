<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.min.css"> -->
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="css/adminStyle.css">
    <title>Admin</title>
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
            
        </ul>
    </div>
    <div class="nav-wrap-top">
         <div class="date-wrap">
             <p><?php echo date('d M Y')?></p>
         </div>
    </div>

</nav>

    
