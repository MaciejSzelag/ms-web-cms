<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "maciek";
$db['db_pass'] = "maciek1";
$db['db_name'] = "msweb";



    foreach($db as $key=>$value){
        define(strtoupper($key), $value);
    }
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$connection){
        echo "we are not connected";
    }


?>