<?php
    $dbhost='localhost';
    $dbuser='unitabase';
    $database='pharmanage';
    $dbpassword='configphp';
    
    $con=mysqli_connect($dbhost,$dbuser,$dbpassword,$database);
    if(!$con){
        echo "Couldn't connect to Database Server".mysqli_error($con);
		
    }
?>
