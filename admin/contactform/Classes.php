<?php 

class AllTables {
//contact details
  public $type_of_contact;
  public $contact_details;
function postContact(){
    global $connection;
    $this->type_of_contact =  mysqli_real_escape_string($connection, $_POST['type_of_contact']);
    $this->contact_details = mysqli_real_escape_string($connection, $_POST['contact_details']);
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
    public $tableName;


        function contactDatails($type_of_contact,$contact_details){
            $query = "INSERT INTO my_contact_deteils(type_of_contact, contact_details) VALUES  ('$type_of_contact','$contact_details')";
            select_query($query);
        }

}
?>