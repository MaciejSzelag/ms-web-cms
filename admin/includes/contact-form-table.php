
<div class="container">
    <h1>Inbox</h1>
    <div class="table-wrap">
        <div class="table">
        
            <div class="tbody">
                <?php

                    $query = "SELECT * FROM msweb_contact_form ORDER BY visitor_id DESC";
                    $select_visitor_messages = mysqli_query($connection, $query);
                    if(!$select_visitor_messages){
                            die(mysqli_error($connection));
                    }

                    while($msg_rows = mysqli_fetch_assoc( $select_visitor_messages)){
                                    $msg_id = $msg_rows['visitor_id'];
                                    $category_name = $msg_rows['category_name'];
                                    $visitor_name = $msg_rows['visitor_name'];
                                    $visitor_phone_no = $msg_rows['visitor_phone_no'];
                                    $visitor_email = $msg_rows['visitor_email'];
                                    $visitor_message = $msg_rows['visitor_message'];
                                    $visitor_message_date = $msg_rows['visitor_message_date'];
                                    $msg_status = $msg_rows['msg_status'];

                ?>

                <div class=" <?php echo $msg_status; ?> tr">

                    <a href="index.php?source=show-message&msg_id=<?php echo $msg_id;?>">
                        <div class="td t1"><?php echo $category_name;  ?></div>
                        <div class="td t2"><?php echo $visitor_name;  ?></div>
                    
                        <div class="td t3"><?php echo $visitor_message_date;  ?></div>
                      
                    </a>
                    <div class="thd4  ">
                        <a href="index.php?source=contact-form-table&delete=<?php echo $msg_id;?>"><i class="fas fa-trash-alt"></i></a>
                    </div>


                </div>













    <?php 
                        deletePosition($msg_id, 'msweb_contact_form','visitor_id', 'index.php?source=contact-form-table');

                     
                ?>
    <?php } ?>



                    </div>
                    </div>
</div>







</div>
