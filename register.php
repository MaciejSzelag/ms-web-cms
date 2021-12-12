<?php $tabTitle = "Register"; include "includes/head.php";?>

<?php
if(isset($_POST['submit'])){
    $user_firstname = $_POST['name'];
    $user_lastname = $_POST['surname'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_confirm_password = $_POST['confirm_password'];


    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $user_confirm_password =  mysqli_real_escape_string($connection, $user_confirm_password);


    if($user_password === $user_confirm_password){


            // $message =  "Password is ok and email is ok";

 
            $query = "SELECT randSalt FROM ms_users";
            $select_rand_salt_query = mysqli_query($connection, $query);
            confirmQuery($select_rand_salt_query);

            $ms_users_row = mysqli_fetch_array($select_rand_salt_query);
            $salt = $ms_users_row['randSalt'];
            $user_password = crypt($user_password, $salt);



            if(!empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_password) && !empty($user_password)){

                $query = "SELECT randSalt FROM ms_users WHERE ms_user_email = '$user_email' ";
                $select_user_emails = mysqli_query($connection, $query);
                // check if email exist
                if($select_user_emails->num_rows > 0){

                    $message_email =  "<span class='wrong'>Email exist. You have to choose different.</span>";

                }else{
                


                    $query = "INSERT INTO ms_users(ms_user_name, ms_user_surname, ms_user_email, ms_user_password, ms_user_role, date) VALUES('$user_firstname','$user_lastname','$user_email','$user_password','ms_user',now())";

                    $insert_new_record = mysqli_query($connection,$query);
                    confirmQuery($insert_new_record);



                    $user_firstname ="";
                    $user_lastname ="";
                    $user_email = "";
        
                    $message_success = "Thank you for register. Now you can login on your account";


                }

            }
    } else{


    $message =  "<span class='wrong'> - The given passwords do not match. </span>";
    }


}


?>







<div class="content">
    <div class="row">
        <div class="login-wrap">


            

            <div class="bgc-lettering">
                <h1>Register</h1>
            </div>
            <?php if(!empty($message_success)) alertMessage($message_success, "success")?>
            <form role="form" action="register.php" method="post" autocomplete="off">
                <h1>Register</h1>       <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Name</label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="name" placeholder="Your name" required value="<?php if(!empty($user_firstname)) echo $user_firstname;?>">
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Surname</label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="surname" placeholder="Your surname"  value="<?php if(!empty($user_lastname)) echo $user_lastname;?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Email <?php  if(!empty($message_email)) echo $message_email; ?></label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="email" placeholder="email"  value="<?php  if(!empty($user_email)) echo $user_email;?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Password <?php if(!empty($message)) echo $message; ?></span></label>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Confirm password <span class="wrong"><?php if(!empty($message)) echo $message; ?></span></label>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="confirm_password" placeholder="Confirm password" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-wrap">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php  include "includes/footer.php"; ?>