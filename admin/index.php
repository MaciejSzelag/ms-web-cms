
<?php $tabTitle = "Admin"; include "includes/admin_head.php";?>
<?php

    $table = new SelectTable();//Select from table
    $fetch_assoc = new ContactFormAllRows();// mysqli_fetch_assoc
    $msg_rows = new ContactFormAllRows();//messages rows
    $table->SelectFrom();//select * From all rows
    // $query = $table->selectQuery;
   


?>
<div class="admin-wrap">
    <div class="row">

        <?php 
            if(isset($_GET['source'])){
                $source = $_GET['source'];


            }else{
              $source = "";
            }
            switch($source){
         
                case "contact-details";
                include "includes/contact-details.php";
                break;
                case "contact-form-table";
                include "includes/contact-form-table.php";
                break;
                case "admin-categories";
                include "includes/admin-categories.php";
                break;
                case "table-visits-by-ip";
                include "includes/table-visits-by-ip.php";
                break;
                case "show-message";
                include "includes/show-message.php";
                break;
                default: 
                include "includes/admin_dashboard.php";
                break;

            }
        ?>



    </div>





</div>

<?php  include "includes/admin_footer.php"; ?>