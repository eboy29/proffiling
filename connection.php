<?php
function openCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "student_profile";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db)
    or die("Connection failed");

    return $conn;
}


function closeCon($conn){
    $conn -> close();
}


?>



