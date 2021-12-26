<?php 

class ContactDetails {
 //contact details
    public $id;
    public $type_of_contact;
    public $contact_details;
     // mysqli_fetch_assoc
    function fetch_assoc($select_query){
        $fetch_assoc = mysqli_fetch_assoc($select_query);
        return $fetch_assoc;

    }
    function postContact(){
        global $connection;
        $this->type_of_contact =  mysqli_real_escape_string($connection, $_POST['type_of_contact']);
        $this->contact_details = mysqli_real_escape_string($connection, $_POST['contact_details']);
    }
    function contact_get_rows($row){
        $this->id = $row['id'];
        $this->type_of_contact = $row['type_of_contact'];
        $this->contact_details = $row['contact_details'];
    }

}
class ContactFormAllRows {
    //Properties
        public $msg_id;
        public $category_name;
        public $visitor_name;
        public $visitor_phone_no;
        public $visitor_email;
        public $visitor_message;
        public $visitor_message_date;
        public $msg_status; 
        public $fetch_assoc;
        public $fetch_row;
      // Methods

            // mysqli_fetch_assoc
            function fetch_assoc($select_query){
                $fetch_assoc = mysqli_fetch_assoc($select_query);
                return $fetch_assoc;

            }
             //Only rows without mysqli_fetch_assoc for while loop
            function rows_all_only($row){
                $this->fetch_row = $row; 
                $this->msg_id = $this->fetch_row ['visitor_id'];
                $this->category_name = $this->fetch_row['category_name'];
                $this->visitor_name = $this->fetch_row['visitor_name'];
                $this->visitor_phone_no = $this->fetch_row['visitor_phone_no'];
                $this->visitor_email = $this->fetch_row['visitor_email'];
                $this->visitor_message = $this->fetch_row['visitor_message'];
                $this->visitor_message_date = $this->fetch_row['visitor_message_date'];
                $this->msg_status = $this->fetch_row['msg_status'];                    
            } 
            //All rows and mysqli_fetch_assoc
            function whole_rows($select_query){
                $this->fetch_assoc = $this->fetch_assoc($select_query);
                $this->msg_id = $this->fetch_assoc ['visitor_id'];
                $this->category_name = $this->fetch_assoc['category_name'];
                $this->visitor_name = $this->fetch_assoc['visitor_name'];
                $this->visitor_phone_no = $this->fetch_assoc['visitor_phone_no'];
                $this->visitor_email = $this->fetch_assoc['visitor_email'];
                $this->visitor_message = $this->fetch_assoc['visitor_message'];
                $this->visitor_message_date = $this->fetch_assoc['visitor_message_date'];
                $this->msg_status = $this->fetch_assoc['msg_status'];                    
            }       
        
}
class SelectTable{
    // public $contactForm;
    // public $questsOnWebsite;
    public $selectQuery;
    function selectQuery($query){

        $this->selectQuery = select_query($query);
        confirmQuery($this->selectQuery);

    }
    function SelectFrom(){
        $query = "SELECT * FROM quests_on_website";
        $this->selectQuery = select_query($query);
        confirmQuery($this->selectQuery);
    }
    function SelectFromWhere($tableName, $column, $columnValue){
        $query = "SELECT * FROM $tableName WHERE $column = '$columnValue'";
        $this->selectQuery = select_query($query);
        confirmQuery($this->selectQuery);
    }
  


}
class Insert{
   
        function contactDatails($type_of_contact,$contact_details){
            $query = "INSERT INTO my_contact_deteils(type_of_contact, contact_details) VALUES  ('$type_of_contact','$contact_details')";
            select_query($query);
        }
}
class Post{
    //$_POST
    public $post_id;
    public $post_title;
    public $post_author;
    public $post_status;
    public $post_content;
    //$_POST_IMG
    public $post_image;
    public $post_image_temp;

    //add automatically
    public $post_date_published;
    public $post_date_updated;
    public $post_category;

    //Methods

  

   
    function formPostDetails(){
        $this->post_category = $_POST['post_category'];
        $this->post_title = $_POST['post_title'];
        $this->post_author = $_POST['post_author'];
        $this->post_content = $_POST['post_content'];
        $this->post_status = $_POST['post_status'];

        $this->post_image =  $_FILES['image']['name'];
        $this->post_image_temp = $_FILES['image']['tmp_name'];
    }
     //add post ; default -draft
    function addPost(){
        global $connection;
        $this->formPostDetails();

        move_uploaded_file($this->post_image_temp, "../images/posts/$this->post_image");

        $query = "INSERT INTO posts(post_title, post_author, post_content, post_image, post_status, post_date_published, post_date_updated, post_category) VALUE('$this->post_title','$this->post_author','$this->post_content','$this->post_image','Draft',now(),now(),'$this->post_category')";
        $insert_post = mysqli_query($connection, $query);
        confirmQuery($insert_post);
    }
  



    
}

//add post category
class PostCategory{
    public $query;
    public $id;
    public $name;
    public $cat_id = "post_cat_id";
    public $table_name ="post_category";
    public $cat_name ="post_cat_name";
    

    function cat_name($row){
        $this->id = $row['post_cat_id'];
        $this->name = $row[$this->cat_name];
    }
    function post_cat_name(){
        $c_name = $this->name = $_POST[$this->cat_name];
        return $c_name;
    }
    function msq_query($add_query){
        global $connection;
        $query_name = mysqli_query($connection,$add_query);
        confirmQuery($query_name);
        return $query_name;
    }
    function add_category($value){
        $this->query = "INSERT INTO $this->table_name($this->cat_name) VALUE('$value')";
        $add_query = $this->msq_query($this->query);
        return $add_query;
    }

    function edit_category($id,$post_name){
        $this->query = "UPDATE $this->table_name SET $this->cat_name = '$post_name' WHERE $this->cat_id = $id";
        $update_query = $this->msq_query($this->query);
        return $update_query;
    }

    function select_all_category(){
        $query = "SELECT * FROM $this->table_name";
        $select_all_cat = $this->msq_query($query);
        return $select_all_cat;

    }
    function select_where($id){
        $query = "SELECT * FROM $this->table_name WHERE $this->cat_id = $id";
        $select_cat = $this->msq_query($query);
        return $select_cat;
    }

}
?>