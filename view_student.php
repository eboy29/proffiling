<?php

include 'connection.php';
$conn = openCon();

$view_id = $_POST['view_id'];

$sql = "SELECT * FROM student_table where Student_ID = '$view_id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$course_id = $row['CourseID'];

$address = $row['HomeNo']." ". $row['Street']." ".
$row['Barangay']." ". $row['City']." ".$row['Province'];

$full_name = $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];



$course = "SELECT * FROM Course where CourseID = '$course_id'";
$c_result = mysqli_query($conn, $course);
$row1 = mysqli_fetch_assoc($c_result);


?>
            <div class="container-fluid ">


            <div class="row d-flex">


              <div class="col-5 d-flex">
                <img src="<?php echo $row['images']?>" alt="student profile" class="img-fluid">
              </div>


              


                

                <div class="col d-flex flex-column">

                  <p class="m-0 p-1 fw-bold">Name: <?php echo $full_name;?></p>
                  <p class="m-0 p-1 fw-bold">Student Number: <?php echo $row['Student_Number'];?></p>
                  <p class="m-0 p-1 fw-bold">Gender: <?php echo $row['Gender'];?></p>
                  <p class="m-0 p-1 fw-bold">Age: <?php echo $row['Age'];?></p>
                  <p class="m-0 p-1 fw-bold">Birthday: <?php echo $row['Date_of_Birth'];?></p>
                </div>


               </div>

                



              </div>  


              <div class="container-lg d-flex mt-3">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Label</th>
                    <th scope="col">Info</th>
                  </tr>
                </thead>
                <tbody>

                <tr>
                    <td>Place Of Birth</td>
                    <td><?php echo $row['Place_of_Birth'];?></td>
                  </tr>

                  <tr>
                    <td>Religion</td>
                    <td><?php echo $row['Religion'];?></td>
                  </tr>

 
                  <tr>
                    <td>Course</td>
                    <td><?php echo $row1['Course'];?></td>
                  </tr>

                  <tr>
                    <td>Address</td>
                    <td><?php echo $address;?></td>
                  </tr>

                  <tr>
                    <td>Contact Number</td>
                    <td><?php echo $row['Contact_Number'];?></td>
                  </tr>

                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['Email'];?></td>
                  </tr>

                  <tr>
                    <td>Parents Name</td>
                    <td><?php echo $row['Parents_Name'];?></td>
                  </tr>

                  <tr>
                    <td>Relationship</td>
                    <td><?php echo $row['Relationship'];?></td>
                  </tr>

                  <tr>
                    <td>Occupation</td>
                    <td><?php echo $row['Occupation'];?></td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $row['Number'];?></td>
                </tr>


                </tbody>
                </table>


               <!--  <div class="d-flex flex-column justify-content-center p-3">
                  <p class="p-1 fw-bold h-20">Course</p>
                  <p class="p-1 fw-bold h-40">Address</p>
                  <p class="p-1 fw-bold h-20">Contact Number</p>
                  <p class="p-1 fw-bold h-20">Email</p>
                  <p class="p-1 fw-bold h-20">Parents Name</p>
                </div>
 -->
                <!-- border border-dark mb-3 -->

               <!--  <div class="d-flex flex-column justify-content-center p-3">
                  <p class = "p-1  h-100"><?php echo $row['Course'];?></p>
                  <p class = "p-1  h-100"><?php echo $row['Address'];?></p>
                  <p class = "p-1  h-100"><?php echo $row['Contact_Number'];?></p>
                  <p class = "p-1  h-100"><?php echo $row['Email'];?></p>
                  <p class = "p-1  h-100"><?php echo $row['Parents_Name'];?></p>
                </div> -->
                


            </div>  




