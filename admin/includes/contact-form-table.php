
<div class="container">
<h1>Inbox</h1>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Caregory</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Content</th>
                    <th>Date amd time</th>
                    <th>Status</th>
                  
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
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


            <tr>
                    <td class="td-id"><?php echo $msg_id;?></td>
                    <td><?php echo $category_name;  ?></td>
                    <td><?php echo $visitor_name;  ?></td>
                   
                    <td><a href="<?php echo 'mailto:' . $visitor_email;  ?>"><?php echo $visitor_email;  ?></a></td>
                    <td><?php echo $visitor_phone_no;  ?></td>
                    <td class="text-content"><?php echo $visitor_message;  ?></td>
                    <td><?php echo $visitor_message_date;  ?></td>
                    <td><a href="index.php?source=contact-form-table&update=<?php echo $msg_id;?>"><?php echo $msg_status; ?></a></td>
                    <td><a href="index.php?source=contact-form-table&delete=<?php echo $msg_id;?>">Delete</a></td>
             
                </tr>
                <?php 
                        deletePosition($msg_id, 'msweb_contact_form','visitor_id', 'index.php?source=contact-form-table');

                     
                ?>
                <?php } ?>
             <?php
                if(isset($_GET['update'])){
                    $id_read_msg = $_GET['update'];

                    $query = "UPDATE msweb_contact_form SET msg_status = 'Read' WHERE visitor_id =  $id_read_msg";

                    $update_msg_status = mysqli_query($connection, $query);

                    if(!$update_msg_status){
                        die(mysqli_error($connection));
                    }

                    header('Location: index.php?source=contact-form-table');
                }
             ?>


            
            </tbody>
        </table>
    </div>
    


</div>