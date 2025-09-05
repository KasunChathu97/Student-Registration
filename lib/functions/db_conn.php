<?php

function Connection(){
    $server = "localhost"; //server

    $user = "root"; //database user

    $password = ""; //database password

    $db_name = "ums12"; //database name

    //create a database connection
    $conn = mysqli_connect($server,$user,$password,$db_name);

    if(!$conn){
        return("Database Error");
    }else{
        return($conn);
    }
}
?>
