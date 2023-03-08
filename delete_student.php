<?php
session_start();
include 'connection.php';
$conn = openCon();

if(isset($_POST['delete_stud'])){

    $id = $_POST['del_id'];



    $query = "DELETE FROM student_table WHERE Student_ID='$id'";
    $result = mysqli_query($conn, $query);

    if($result){

        




        $_SESSION['delete'] = "Deleted Successfully";
        header('location:../student_table.php');
    }

    else {
        
    }




}


?>