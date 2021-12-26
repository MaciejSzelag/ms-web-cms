<?php 
// include "admin/contactform/Classes.php";
?>
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

class Posts{
    public $query;
    public $id;
    public $title;
    public $author;
    public $content;
    public $image;
    public $status;
    public $published;
    public $updated;
    public $category;


        function all_rows($row){
            
            $this->id = $row['post_id'];
            $this->title = $row['post_title'];
            $this->author = $row['post_author'];
            $this->content = $row['post_content'];
            $this->image = $row['post_image'];
            $this->status = $row['post_status'];
            $this->published = $row['post_date_published'];
            $this->updated = $row['post_date_updated'];
            $this->category = $row['post_category'];
        }

      
        //Query

          function select_all($table_name){
            global $connection;
            $this->query = "SELECT * FROM $table_name";
            $select_all = mysqli_query($connection, $this->query);
            return $select_all;
        }

}

?>