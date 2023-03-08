<?php
session_start();
include 'connection.php';
$conn = openCon();






if(isset($_POST['submit'])){

    $stud_id = mysqli_real_escape_string($conn, $_POST['stud_id']);

    $stud_num = mysqli_real_escape_string($conn, $_POST['stud_num']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);




    $homeno = mysqli_real_escape_string($conn, $_POST['homeno']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $prov = mysqli_real_escape_string($conn, $_POST['prov']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $pob = mysqli_real_escape_string($conn, $_POST['pob']);


    $dob = mysqli_real_escape_string($conn, $_POST['dob']);


    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $cnum = mysqli_real_escape_string($conn, $_POST['cnum']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pnum = mysqli_real_escape_string($conn, $_POST['pnum']);
    $relation = mysqli_real_escape_string($conn, $_POST['relation']);


    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $job = mysqli_real_escape_string($conn, $_POST['job']);
    $relation = mysqli_real_escape_string($conn, $_POST['relation']);


    $update = "UPDATE student_table SET Student_Number='$stud_num',

    First_Name='$fname',Middle_Name='$mname', Last_Name='$lname' ,Age='$age',
    Date_of_Birth='$dob',Place_of_Birth='$pob',Religion='$religion',Gender='$gender',

    HomeNo='$homeno',Street='$street',Barangay='$brgy',City='$city',
    Province='$prov',Contact_Number='$cnum',Email='$email',

    CourseID='$course',Parents_Name='$pname',Relationship='$relation',Number='$pnum',
    Occupation='$job' WHERE Student_ID = '$stud_id'";


    $update_res = mysqli_query($conn, $update);


    if($update_res){
        $_SESSION['update_msg'] = "Update Successfully";
        header('location:../student_table.php');
    }

    else {
        echo 'error';
    }


}


?>