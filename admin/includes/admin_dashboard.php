<div class="container">
    <div class="dash-head">

        <div class="dash-box">
            <a href="index.php?source=contact-form-table">
                <div class="icon-wrap">
                    <i class="fas fa-user-friends"></i>
                </div>
                    <h3>Number of visits:</h3>
                    <?php 
                        $query = "SELECT * FROM quests_on_website";
                        $select_number_of_visits = mysqli_query($connection, $query);
                        $select_number_of_visits_row = mysqli_fetch_array($select_number_of_visits);
                        $number_of_visits = $select_number_of_visits_row['q_number'];
                        echo " <h1>". $number_of_visits ."</h>";
                    ?>    
            </a> 
        </div>
        <div class="dash-box">
             <a href="index.php?source=contact-form-table">
            <div class="icon-wrap">
            <i class="far fa-envelope"></i>
            </div>
                <h3>New messages</h3>
                <?php 
                    $query = "SELECT * FROM msweb_contact_form WHERE msg_status = 'Unread'";
                    $select_number_of_status = mysqli_query($connection, $query);

                    $count_unread_msgs = mysqli_num_rows($select_number_of_status);
                   

                   
                    echo " <h1>". $count_unread_msgs ."</h>";
                ?>   
            </a> 
        </div>
    </div>

</div>