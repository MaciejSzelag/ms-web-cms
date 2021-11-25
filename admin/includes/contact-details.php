
<div class="container">
<h1>My contact details</h1>
    <div class="table-wrap">
        <div class="form-wrap">
        <?php 
            if(isset($_POST['submit'])){
                    $type_of_contact = $_POST['type_of_contact'];
                    $contact_details = $_POST['contact_details'];
                    // echo $type_of_contact ." - " .$contact_details;
                    $type_of_contact = mysqli_real_escape_string($connection, $type_of_contact);
                    $contact_details = mysqli_real_escape_string($connection, $contact_details);
                    
                    $query = "INSERT INTO my_contact_deteils(type_of_contact, contact_details) VALUES  ('$type_of_contact','$contact_details')";
                    $insert_datails_contact_query= mysqli_query($connection, $query);
                        if(!$insert_datails_contact_query){
                            die(mysqli_error($connection));
                        }
            }
        ?>
            <form action="" method="post">
                <h3>Add contact</h3>
                <div class="form-group">
                    <label for="">Type of contact</label>
                   <select name="type_of_contact" >
                       <option value="Email">Email</option>
                       <option value="Phone">Phone number</option>
                       <option value="Facebook">Facebook</option>
                       <option value="Twitter">Twitter</option>
                       <option value="Instagram">Instagram</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="">Contact detail</label>
                    <input type="text" name="contact_details" placeholder="Contact detail">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add contact">
                </div>
            </form>




<!-- edit item -->






<?php 
    if(isset($_GET['edit'])){
        $contact_id = $_GET['edit'];
        $query = "SELECT * FROM my_contact_deteils WHERE id = $contact_id";
        $select_contact_details_query = mysqli_query($connection, $query);
        
        $row_edit = mysqli_fetch_assoc($select_contact_details_query);
        $detail_id =$row_edit['id'];
        $type_of_contact = $row_edit['type_of_contact'];
        $contact_details = $row_edit['contact_details'];


 

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
                    $type_of_contact = $_POST['type_of_contact'];
                    $contact_details = $_POST['contact_details'];

                    $type_of_contact = mysqli_real_escape_string($connection, $type_of_contact);
                    $contact_details = mysqli_real_escape_string($connection, $contact_details);
                    
                    $query = "UPDATE my_contact_deteils SET type_of_contact = '$type_of_contact', contact_details = '$contact_details' WHERE id = $contact_id";
                    $update_query = mysqli_query($connection, $query);

                    if(!$update_query){
                        die(mysqli_error($connection));
                    }
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

            <?php } ?>
            <?php 
            if(isset($_GET['delete'])){
                    $contact_id = $_GET['delete'];

                    $query = "DELETE FROM my_contact_deteils WHERE id = $contact_id";
                    $delete_item_id = mysqli_query($connection, $query);
                    if(!$delete_item_id){
                            die(mysqli_error($connection));
                    }
                    header("Location: index.php?source=contact-details");

            }

            ?>
           
            </tbody>
        </table>
    </div>
    


</div>

