<?php
include 'connection.php';
$conn = openCon();


if(isset($_POST['change_btn'])){

$email = $_POST['email'];
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$c_pass = $_POST['c_pass'];



$sql = "SELECT Email,Password from admin where Email='$email' AND Password='$old_pass'";
$cpass = mysqli_query($conn, $sql);

$pass = mysqli_fetch_array($cpass);

if($pass >0){


    if($new_pass == $c_pass){

        if (strlen($new_pass)< 8){
            $_SESSION['admin_pass'] = "Password Must At least 8 Characters";
        }
        else{
            $update = "UPDATE admin SET Password='$new_pass' 
            WHERE Email='$email'";

            $pass_query = mysqli_query($conn, $update);
            $_SESSION['success'] = "Change Password Successfully";
        }
      
    }
    else {
        $_SESSION['admin_pass'] = "Password did not match";
    }

}else {
    $_SESSION['admin_pass'] = "Incorrect Credentials";
}



/* if(mysqli_num_rows($result) > 0){

    if($new_pass == $c_pass){

        



    }

    else {
        

    }



}else{
    $_SESSION['admin_pass'] = "Incorrect Credentials";

}
 */


}


?>