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





?>