<?php 
    namespace App\Traits;

    trait forConnect{
        function msq_query($add_query){//as a parametr add query
            global $connection;
            $query_name = mysqli_query($connection,$add_query);
            confirmQuery($query_name);
            return $query_name;
        }
        // mysqli_fetch_assoc
        function fetch_assoc($select_query){
            $fetch_assoc = mysqli_fetch_assoc($select_query);
            return $fetch_assoc;
        }
    }
    trait ActionPost{
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
 
      //Post contact form  
     function formPostDetails(){
         global $connection;
         $this->post_category = $_POST['post_category'];
         $this->post_title = $_POST['post_title'];
         $this->post_author = $_POST['post_author'];
         $this->post_content = $_POST['post_content'];
         $this->post_content =  mysqli_real_escape_string($connection, $_POST['post_content']);
         $this->post_status = $_POST['post_status'];
 
         $this->post_image =  $_FILES['image']['name'];
         $this->post_image_temp = $_FILES['image']['tmp_name'];
     }
    }
    trait PostsRows{
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
    }
    trait ContactForm{
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

    }
 

 



?>