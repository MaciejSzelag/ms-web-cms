<?php include "db.php"?>
<?php include "../admin/functions.php"?>
<?php session_start(); ?>

<?php

if(isset($_POST['login'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $query = "SELECT * FROM ms_users WHERE ms_user_email = '{$user_email}'";
    $select_user_email = mysqli_query($connection, $query);

    confirmQuery($select_user_email);


    while($ms_user_row = mysqli_fetch_array($select_user_email)){

        $db_user_firstname = $ms_user_row['ms_user_name'];
        $db_user_lastname = $ms_user_row['ms_user_surname'];
        $db_user_email = $ms_user_row['ms_user_email'];
        $db_user_password = $ms_user_row['ms_user_password'];
        $db_user_role = $ms_user_row['ms_user_role'];

    }

    //checking password

    $user_password = crypt($user_password, $db_user_password);
    if($user_email === $db_user_email && $user_password === $db_user_password && $db_user_role === "ms_admin" ){

        $_SESSION['ms_user_name'] = $db_user_firstname;
        $_SESSION['ms_user_surname'] = $db_user_lastname;
        $_SESSION['ms_user_email'] = $db_user_email;
        $_SESSION['ms_user_password'] = $db_user_password;
        $_SESSION['ms_user_role'] = $db_user_role;


        header("location: ../admin/");  
    }elseif($user_email === $db_user_email && $user_password === $db_user_password && $db_user_role === "ms_user" ){

        $_SESSION['ms_user_name'] = $db_user_firstname;
        $_SESSION['ms_user_surname'] = $db_user_lastname;
        $_SESSION['ms_user_email'] = $db_user_email;
        $_SESSION['ms_user_password'] = $db_user_password;
        $_SESSION['ms_user_role'] = $db_user_role;


        header("location: ../");  
    }else{
    
        header("location: ../login.php"); 
      
    }
}

?>