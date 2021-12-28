

<?php
require "traits.php";
use App\Traits\forConnect;
use App\Traits\ActionPost;
use App\Traits\PostsRows;
use App\Traits\ContactForm;



class Tables {
    use App\Traits\forConnect;
    // use forConnect;
    //posts
    public $posts = "posts";//table name
    public $get_post_id = "post_id";//table name
    public $cat_id = "post_cat_id";//this column
        
    //post_category
    public $table_name = "post_category";//table name
    public $cat_name = "post_cat_name";//this column

    //contact form
    public $contact_form = "msweb_contact_form"; // table name
    public $visitor_id = "visitor_id"; // table name

    

    
  
}



class ContactDetails{
    use App\Traits\forConnect;
 //contact details
    public $id;
    public $type_of_contact;
    public $contact_details;
    

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
class ContactFormAllRows extends Tables {
    use App\Traits\ContactForm;
    //Properties
    //row's names
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
          //msweb_contact_form
    //get from contact form 
    function contact_form_rows($row){
        $this->msg_id = $row ['visitor_id'];
        $this->category_name = $row['category_name'];
        $this->visitor_name = $row['visitor_name'];
        $this->visitor_phone_no = $row['visitor_phone_no'];
        $this->visitor_email = $row['visitor_email'];
        $this->visitor_message = $row['visitor_message'];
        $this->visitor_message_date = $row['visitor_message_date'];
        $this->msg_status = $row['msg_status'];                    
    } 

    //All rows and mysqli_fetch_assoc for contact form table
        function whole_rows($select_query){
            $row = $this->fetch_assoc($select_query);
            $this->contact_form_rows($row);            
        }   
        #Select Order by DESC
        function orderByDescending(){

            $query = "SELECT * FROM $this->contact_form ORDER BY $this->visitor_id DESC";
            $select_msgs_desc = $this->msq_query($query);
            return $select_msgs_desc;
        }    
        
}
class SelectTable{
    use App\Traits\forConnect;
    // public $contactForm;
    // public $questsOnWebsite;
    public $selectQuery;
    // function selectQuery($query){

    //     $this->selectQuery = select_query($query);
    //     confirmQuery($this->selectQuery);

    // }
    function SelectFrom(){
        $query= "SELECT * FROM quests_on_website";
        $this->selectQuery = select_query($query);
        confirmQuery($this->selectQuery);
        // $select_all = $this->msq_query($this->selectQuery);
        // return $select_all;
    }
    function SelectFromWhere($tableName, $column, $columnValue){
        $query = "SELECT * FROM $tableName WHERE $column = '$columnValue'";
        $this->selectQuery = select_query($query);
        confirmQuery($this->selectQuery);
    }
  


}
class Insert{
    use App\Traits\forConnect;
        function contactDatails($type_of_contact,$contact_details){
            $query = "INSERT INTO my_contact_deteils(type_of_contact, contact_details) VALUES  ('$type_of_contact','$contact_details')";
            $this->msq_query($query);
        }
}
class Post extends Tables{
    use App\Traits\ActionPost;
    use App\Traits\PostsRows;

     //add post ; default -draft
    function addPost(){
        global $connection;
        $this->formPostDetails();

        move_uploaded_file($this->post_image_temp, "../images/posts/$this->post_image");

        $query = "INSERT INTO posts(post_title, post_author, post_content, post_image, post_status, post_date_published, post_date_updated, post_category) VALUE('$this->post_title','$this->post_author','$this->post_content','$this->post_image','Draft',now(),now(),'$this->post_category')";
        $insert_post = mysqli_query($connection, $query);
        confirmQuery($insert_post);
    }
    function select_all_posts(){
        $query = "SELECT * FROM $this->posts";
        $select_all_posts = $this->msq_query($query);
        return $select_all_posts;

    }
    function select_post_where($get_post_id){
        $query = "SELECT * FROM $this->posts WHERE $this->get_post_id = $get_post_id";
        $select_posts = $this->msq_query($query);
        return $select_posts;

    }
  



    
}


class PostCategory extends Tables{
      public $query;
    public $id;
    public $name;

    function cat_name($row){
        $this->id = $row['post_cat_id'];
        $this->name = $row[$this->cat_name];
    }
    function post_cat_name(){
        $c_name = $this->name = $_POST[$this->cat_name];
        return $c_name;
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