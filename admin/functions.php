<?php 
function confirmQuery($mysqliQuery){
    global $connection;
    if(!$mysqliQuery){
        die("Query faild". mysqli_error($connection));
    }
}

function deletePosition($get_id_name, $table_name, $table_column_id,   $header_location){
    global $connection;
    if(isset($_GET['delete'])){
        $get_id_name = $_GET['delete'];
        $query = "DELETE FROM $table_name WHERE $table_column_id = $get_id_name";
        $select_mysqli_query = mysqli_query($connection, $query);
        confirmQuery($select_mysqli_query);
        header("Location: $header_location");
    }
}

function numberOfVisits(){
    global $connection;
    $query = "SELECT * FROM quests_on_website WHERE q_number";
    $select_last_number = mysqli_query($connection, $query);
    $qnumber_row = mysqli_fetch_assoc($select_last_number);
    $last_number = $qnumber_row['q_number'];

    if($last_number){
        $last_number++;
        $query = "UPDATE  quests_on_website SET q_number = $last_number";
        $update_number = mysqli_query($connection, $query);
        if(!$update_number){
            die(mysqli_error($connection));
        }
    }
}


// Function to get the user IP address
function getUserIP() {
    global $connection;
    function getIPAddress() {  
   
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    $ip = getIPAddress();  
// temporary
    if($ip == "::1"){
        $ip = "My computer";
    }
//temporary

   if($ip){
        $query = "SELECT * FROM ip_adresses WHERE IP_address = '$ip' ";
        $check_if_exist = mysqli_query($connection,$query);
        $check_if_exist_row = mysqli_fetch_array($check_if_exist);
        $number_of_visits = $check_if_exist_row['number_of_visits'];


        
        if($check_if_exist->num_rows > 0){
            if($number_of_visits){
                $number_of_visits++;
                $query = "UPDATE  ip_adresses SET number_of_visits = $number_of_visits, last_visit = now()  WHERE IP_address = '$ip' ";
                $update_number_of_visits = mysqli_query($connection, $query);
                            if(!$update_number_of_visits){
                                die(mysqli_error($connection));
                            }
            }
        }else{
                $query = "INSERT INTO ip_adresses(IP_address, number_of_visits,last_visit) VALUES ('$ip','1',now())";
                $add_ip_address = mysqli_query($connection,$query);
                if(!$add_ip_address ){
                     die(mysqli_error($connection));
                }
        }

    }
}


?>