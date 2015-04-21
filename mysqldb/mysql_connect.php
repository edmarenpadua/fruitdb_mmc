<?php
/*
Do stuff
*/
    $con = mysqli_connect("localhost", "root", "", "fruit_db");
    
    if(mysqli_connect_error()) echo "Connection Fail";
    else {
        //query
    }
    mysqli_close($con);
?>