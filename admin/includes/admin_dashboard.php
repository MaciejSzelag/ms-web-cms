<?php
    //select number of visits
    $row = $fetch_assoc->fetch_assoc($table->selectQuery);
    //new message
    $table->SelectFromWhere('msweb_contact_form','msg_status', 'Unread');
    $query = $table->selectQuery;
    //count msgs
    $count_new_msgs = mysqli_num_rows($query);    
    $number_of_visits = $row['q_number']; 

?>

<div class="container">
    <div class="dash-head">
        <div class="dash-box">
            <a href="index.php?source=contact-form-table">
                <div class="icon-wrap">
                    <i class="fas fa-user-friends"></i>
                </div>
                    <h3>Number of visits:</h3>
                    <?php 
                    
                       
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
                                        
                    echo " <h1>". $count_new_msgs ."</h>";
                ?>   
            </a> 
        </div>
    </div>

</div>