<?php
                if(isset($_GET['msg_id'])){
                    $id_read_msg = $_GET['msg_id'];

                    $query = "UPDATE msweb_contact_form SET msg_status = 'Read' WHERE visitor_id =  $id_read_msg";

                    $update_msg_status = mysqli_query($connection, $query);

                    if(!$update_msg_status){
                        die(mysqli_error($connection));
                    }

                    // header('Location: index.php?source=contact-form-table');
                }
?>
<?php
            if(isset($_GET["msg_id"])){
                $id_msg = $_GET["msg_id"];
                $query = "SELECT * FROM msweb_contact_form WHERE visitor_id = $id_msg";
            $select_visitor_messages = mysqli_query($connection, $query);
            if(!$select_visitor_messages){
                    die(mysqli_error($connection));
            }

            $msg_rows = mysqli_fetch_assoc( $select_visitor_messages);
            $msg_id = $msg_rows['visitor_id'];
            $category_name = $msg_rows['category_name'];
            $visitor_name = $msg_rows['visitor_name'];
            $visitor_phone_no = $msg_rows['visitor_phone_no'];
            $visitor_email = $msg_rows['visitor_email'];
            $visitor_message = $msg_rows['visitor_message'];
            $visitor_message_date = $msg_rows['visitor_message_date'];
            $msg_status = $msg_rows['msg_status'];

?>
<div class="message-wrap">
    <div class="msg-box message-header">
        <h2>Message from: <span><?php echo $visitor_name; ?></span></h2>
        <h2>Category: <span><?php echo $category_name; ?></span></h2>
        <h2>Email: <span><a href="mailto:<?php echo $visitor_email; ?>"><?php echo $visitor_email; ?></a></span></h2>
        <h2>Phone: <span><a href="tel:<?php echo $visitor_phone_no; ?>"><?php echo $visitor_phone_no; ?></a></span></h2>
    </div>
    <div class="msg-box text-container">
        <div class="msg-title"> <h3>Message</h3></div>
        <div class="text-wrap">
            <p><?php echo $visitor_message; ?></p>
        </div>
    </div>
    <div class="msg-box actions">
        <button class="delete"><a href="index.php?source=contact-form-table&delete=<?php echo $msg_id;?>">Delete</a></button>
        <button ><a href="mailto:<?php echo $visitor_email; ?>">Answer</a></button>
        <button class="call"><a href="tel:<?php echo $visitor_phone_no; ?>">Call</a></button>
    </div>





</div>

<?php 
 deletePosition($msg_id, 'msweb_contact_form','visitor_id', 'index.php?source=contact-form-table');
 } ?>  
