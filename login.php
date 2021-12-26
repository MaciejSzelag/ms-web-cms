<?php $tabTitle = "Login"; include "includes/head.php";?>

<div class="content">
    <div class="row">
        <div class="login-wrap">

            <div class="bgc-lettering">
                <h1>Login</h1>
            </div>

            <form action="includes/auth.php" method="post">
                <h1>Login</h1>
         
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Email</label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="email" placeholder="email" autocomplete="on" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Password</label>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-wrap">
                        <input type="submit" value="Login" name="login">
                    </div>
                </div>
                <a href="register.php">Register</a>
            </form>
        </div>
    </div>
</div>
<?php  include "includes/footer.php"; ?>