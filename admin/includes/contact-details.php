<div class="container">
<h1>My contact details</h1>
    <div class="table-wrap">
        <div class="form-wrap">
        <?php 
            if(isset($_POST['submit'])){
                $contact = new ContactDetails();
                $contact->postContact();
                $insert_contact_query = new Insert();
                $contact->contact_details = ltrim($contact->contact_details); //  Removes whitespace or other predefined characters from the left side of a string

               if($contact->type_of_contact != "" && $contact->contact_details != ""){
                    $insert_contact_query->contactDatails($contact->type_of_contact, $contact->contact_details);
                    $contact->type_of_contact = null;
                    $contact->contact_details = null;                                          
                   
                }else if($contact->type_of_contact === null && $contact->contact_details === null || $contact->contact_details == ""){
                    $msg = "You have to select option";
                    $msg_details = "You have to add contact";                                                
                      
                }else if($contact->type_of_contact === null  || $contact->type_of_contact == ""){
                    $msg = "You have to select option";               
                } else  if (empty($contact->contact_details) || $contact->contact_details === null || $contact->contact_details == ""){
                    $msg_details = "You have to add contact";                          
                }
            }
        ?>
            <form action="" method="post">
                <h3>Add contact</h3>
                <div class="form-group">
                    <label for="">Type of contact    <?php if(!empty($msg)) echo '<span class="span-alert"> - '.  $msg . '</span>'; ?></label>
                   <select name="type_of_contact" >
                    <?php  if(!empty($contact->type_of_contact)) echo "<option value='$contact->type_of_contact'>".$contact->type_of_contact."</option>";?>
                        <option value="">Select option</option>
                        <option value="Email">Email</option>
                        <option value="Phone">Phone number</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Instagram">Instagram</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="">Contact detail <?php if(!empty($msg_details)) echo '<span class="span-alert"> - '.  $msg_details . '</span>'; ?></label>
                    <input type="text" name="contact_details" placeholder="Contact detail" value="<?php  if(!empty($contact->contact_details)) echo $contact->contact_details;?>" >
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add contact">
                </div>
            </form>

<!-- edit item -->
<?php 
    if(isset($_GET['edit'])){
        $contact_id = $_GET['edit'];
        $contactTable = new ContactDetails();
        $query = selectWhere('my_contact_deteils','id',$contact_id );// Function
        $select_contact_details_query = select_query($query);//function
        $row_edit = $contactTable->fetch_assoc($select_contact_details_query);
        $contactTable->contact_get_rows($row_edit);
        $detail_id = $contactTable->id;
        $type_of_contact = $contactTable->type_of_contact;
        $contact_details = $contactTable->contact_details;
      
?>
            <form action="" method="post">
                <h3>Edit contact</h3>
                <div class="form-group">
                    <label for="">Type of contact</label>
                   <select name="type_of_contact" >
                   <option value="<?php echo $type_of_contact;?>"><?php echo $type_of_contact;?></option>
                       <option value="Email">Email</option>
                       <option value="Phone">Phone number</option>
                       <option value="Facebook">Facebook</option>
                       <option value="Twitter">Twitter</option>
                       <option value="Instagram">Instagram</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="">Contact detail</label>
                    <input type="text" name="contact_details" placeholder="Contact detail" value="<?php echo $contact_details;?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="update" value="Update contact">
                </div>
            </form>
            <?php
                if(isset($_POST['update'])){

                    $post = new ContactDetails();
                    $post->postContact();
                    $type_of_contact = $post->type_of_contact;
                    $contact_details = $post->contact_details;
                
                    $query = "UPDATE my_contact_deteils SET type_of_contact = '$type_of_contact', contact_details = '$contact_details' WHERE id = $contact_id";
                    $update_query = mysqli_query($connection, $query);
                    confirmQuery($update_query);
                    $type_of_contact = "";
                    $contact_details = "";
                }
            ?>
<?php   } ?>
<!-- edit item -->
        </div>
        <table class="small"> 
            <thead>
                <tr>
                    <th>Type of contact</th>
                    <th>Contact details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT * FROM my_contact_deteils";
            $select_contact_details = mysqli_query($connection, $query);
            while($contact_details_row = mysqli_fetch_assoc($select_contact_details)){
                $detail_id =$contact_details_row['id'];
                $type_of_contact = $contact_details_row['type_of_contact'];
                $contact_details = $contact_details_row['contact_details'];
            ?>
            <tr>
                    <td><?php echo $type_of_contact; ?> </td>
                    <td><?php echo $contact_details; ?></td>
                    <td><a href="index.php?source=contact-details&edit=<?php echo $detail_id;?>">Edit</a></td>
                    <td><a href="index.php?source=contact-details&delete=<?php echo $detail_id;?>">Delete</a></td>
            </tr>
                <?php 
                deletePosition($detail_id, 'my_contact_deteils','id', 'index.php?source=contact-details');
                ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>