<div class="nav-wrap desktop mobile">
            <div class="menu-cross-wrap">
                <div class="small-wrap">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>

            </div>
            <nav>
                <div class="logo-wrap">
                    <div class="logo_container">
                        <img src="images/logo_640.png" alt="">
                    </div>
                </div>
                <ul>
                    <li class="nav-li"><a href="index.php"> Home </a></li>
                    <li class="nav-li"><a href="what-I-do.php"> What I do</a></li>
                    <li class="nav-li"><a href="contact.php"> Contact </a></li>
                    <li class="nav-li"><a href="login.php"> Login </a></li>
                    <?php if(isset($_SESSION['ms_user_role']) && $_SESSION['ms_user_role'] == "ms_admin") echo "<li class='nav-li'><a href='admin/'> Admin Dashboard </a></li>";?>
                    <?php if(isset($_SESSION['ms_user_name'])) echo "<li><a href='includes/logout.php'>Logout</a></li>";?>
                    <?php if(isset($_SESSION['ms_user_name'])) echo "<li>".$_SESSION['ms_user_name']."</li>";?>
                  


                </ul>

            </nav>
        </div>