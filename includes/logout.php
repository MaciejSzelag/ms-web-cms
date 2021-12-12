<?php session_start(); ?>
<?php 
        $_SESSION['ms_user_name'] = null;
        $_SESSION['ms_user_surname'] = null;
        $_SESSION['ms_user_email'] = null;
        $_SESSION['ms_user_password'] = null;
        $_SESSION['ms_user_role'] = null;
        header('location: ../login.php');
?>