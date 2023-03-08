<?php
session_start();
include 'connection.php';
$conn = openCon();




if(isset($_POST['accept_stud'])){
$id = $_POST['pending_id'];

$sql = "SELECT * FROM pending_request WHERE PendingID ='$id'";
$sql_query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($sql_query);

$stud_num = $row['Student_Number'];

$fname = $row['First_Name'];
$m_name = $row['Middle_Name'];
$l_name = $row['Last_Name'];


$age = $row['Age'];

$dob = $row['Date_of_Birth'];
$pob = $row['Place_of_Birth'];
$religion = $row['Religion'];

$gender = $row['Gender'];

$homeno = $row['HomeNo'];
$street = $row['Street'];
$brgy = $row['Barangay'];
$city = $row['City'];
$prov = $row['Province'];


$cnum = $row['Contact_Number'];

$email = $row['Email'];
$course = $row['CourseID'];
$pname = $row['Parents_Name'];

$relation = $row['Relationship'];
$pnum = $row['Number'];
$job = $row['Occupation'];
$fpic = $row['images'];

$time_stamp = $row['Time_Registered'];


$insert = "INSERT INTO student_table(Student_Number, First_Name, Middle_Name, Last_Name, Age, Date_of_Birth, 
Place_of_Birth,Religion,Gender, HomeNo,Street,Barangay,City,Province, Contact_Number, Email, CourseID, Parents_Name, Relationship,Number,Occupation
,images,Time_Registered)

VALUES ('$stud_num','$fname','$m_name','$l_name','$age','$dob','$pob','$religion','$gender',
'$homeno','$street','$brgy','$city','$prov','$cnum','$email','$course','$pname',
'$relation','$pnum','$job','$fpic','$time_stamp')";

$insert_res = mysqli_query($conn, $insert);


$query = "DELETE FROM pending_request WHERE PendingID='$id'";
$result = mysqli_query($conn, $query);




$_SESSION['s_accept'] = "Student Accepted";
header('location:../student_table.php');




}
else if(isset($_POST['reject_stud'])){
    $id = $_POST['pending_id'];
    $query = "DELETE FROM pending_request WHERE PendingID='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['s_reject'] = "Student Rejected";
        header('location:../student_table.php');
    }

    else {
        
    }
}


?>