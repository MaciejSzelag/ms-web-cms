

<?php


?>
<?php
                if(isset($_GET['msg_id'])){
                    $id_read_msg = $_GET['msg_id'];
                    $query = "UPDATE msweb_contact_form SET msg_status = 'Read' WHERE visitor_id =  $id_read_msg";
                    $update_msg_status = select_query($query);                         
                    confirmQuery($update_msg_status);
                }
?>
<?php
            if(isset($_GET["msg_id"])){
                $id_msg = $_GET["msg_id"];
             
                $table->SelectFromWhere('msweb_contact_form','visitor_id', $id_msg);
                
                $msg_rows->whole_rows($table->selectQuery);
?>
<div class="message-wrap">
    <div class="msg-box message-header">
        <h2>Message from: <span><?php echo $msg_rows->visitor_name; ?></span></h2>
        <h2>Category: <span><?php echo $msg_rows->category_name; ?></span></h2>
        <h2>Email: <span><a href="mailto:<?php echo $msg_rows->visitor_email; ?>"><?php echo $msg_rows->visitor_email; ?></a></span></h2>
        <h2>Phone: <span><a href="tel:<?php echo $msg_rows->visitor_phone_no; ?>"><?php echo $msg_rows->visitor_phone_no; ?></a></span></h2>
    </div>
    <div class="msg-box text-container">
        <div class="msg-title"> <h3>Message</h3></div>
        <div class="text-wrap">
            <p><?php echo $msg_rows->visitor_message; ?></p>
        </div>
    </div>
    <div class="msg-box actions">
        <button class="delete"><a href="index.php?source=contact-form-table&delete=<?php echo $msg_rows->msg_id;?>">Delete</a></button>
        <button ><a href="mailto:<?php echo $msg_rows->visitor_email; ?>">Answer</a></button>
        <button class="call"><a href="tel:<?php echo $msg_rows->visitor_phone_no; ?>">Call</a></button>
    </div>
</div>
<?php 
 deletePosition($msg_rows->msg_id, 'msweb_contact_form','visitor_id', 'index.php?source=contact-form-table');
 } ?>  
