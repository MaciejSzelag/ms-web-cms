
<div class="container">
    <h1>Inbox</h1>
    <div class="table-wrap">
        <div class="table">
                    <div class="tbody">
                <?php
                    $select_msgs = $msg_rows->orderByDescending();
                    // $select_visitor_messages = select_query($query);
           
                    while($row = mysqli_fetch_assoc($select_msgs)){
                          $msg_rows->contact_form_rows($row);     
                ?>

                <div class=" <?php echo $msg_rows->msg_status; ?> tr">
                    <a href="index.php?source=show-message&msg_id=<?php echo $msg_rows->msg_id;;?>">
                        <div class="td t1"><?php echo $msg_rows->category_name;  ?></div>
                        <div class="td t2"><?php echo $msg_rows->visitor_name;  ?></div>
                        <div class="td t3"><?php echo $msg_rows->visitor_message_date;  ?></div>
                    </a>
                    <div class="thd4  ">
                        <a href="index.php?source=contact-form-table&delete=<?php echo $msg_rows->msg_id;?>"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
        <?php deletePosition($msg_rows->msg_id, 'msweb_contact_form','visitor_id', 'index.php?source=contact-form-table');?>
        <?php } ?>



    </div>
    </div>
</div>
