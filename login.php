<?php $tabTitle = "Login"; include "includes/head.php";?>

<div class="content">
    <div class="row">
        <div class="login-wrap">
            <form action="">
                <h1>Login</h1>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Email</label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="email" placeholder="email" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="label-wrap">
                        <label for="">Password</label>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-wrap">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php  include "includes/footer.php"; ?>