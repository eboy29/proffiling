<?php
include 'connection.php';
$conn = openCon();
$output = '';


if(isset($_POST['excel'])){

  
    $query = "SELECT * FROM student_table";
    $result = mysqli_query($conn, $query);

    {
        $output .= '
        <table id="example" class="table table-bordered" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Student Number</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Parents Name</th>
                        <th>Relationship</th>
                        <th>Number</th>
                        <th>Occupation</th>

                      </tr>
                    </thead>
                    <tbody>';

        
        while($row = mysqli_fetch_array($result))
        {
         $output .= '<tr>
         <td>'.$row['Student_Number'].'</td>
         <td>'.$row['Full_Name'].'</td>
         <td>'.$row['Age'].'</td>
         <td>'.$row['Date_of_Birth'].'</td>
         <td>'.$row['Gender'].'</td>
         <td>'.$row['Address'].'</td>
         <td>'.$row['Contact_Number'].'</td>
         <td>'.$row['Email'].'</td>
         <td>'.$row['Course'].'</td>
         <td>'.$row['Parents_Name'].'</td>
         <td>'.$row['Relationship'].'</td>
         <td>'.$row['Number'].'</td>
         <td>'.$row['Occupation'].'</td>
       </tr>
     
       </tr>';
        }
        $output .= '</tbody>

                    
            
        </table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
       }


















}

?>