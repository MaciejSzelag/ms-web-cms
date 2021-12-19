<?php 
class ContactTable {
    //contact form
    public $category_name;
    public $visitor_name;
    public $visitor_phone_number;
    public $visitor_email;
    public $visitor_message;
    public $status;
        function get_posts_names(){
            global $connection;
            $this->category_name =  mysqli_real_escape_string($connection, $_POST['category_name']);
            $this->visitor_name = mysqli_real_escape_string($connection, $_POST['visitor_name']);
            $this->visitor_phone_number =  mysqli_real_escape_string($connection, $_POST['visitor_phone_number']);
            $this->visitor_email = mysqli_real_escape_string($connection, $_POST['visitor_email']);
            $this->visitor_message =  mysqli_real_escape_string($connection, $_POST['visitor_message']);
            $this->status = 'Unread';
        }
        function insertToContactForm(){
            $this->get_posts_names();
            $query = "INSERT INTO msweb_contact_form(category_name,visitor_name,visitor_phone_no,visitor_email,visitor_message,visitor_message_date, msg_status) VALUES  ('$this->category_name','$this->visitor_name','$this->visitor_phone_number', '$this->visitor_email', '$this->visitor_message',now(),'$this->status')";
            select_query($query);
        }
    
}

?>