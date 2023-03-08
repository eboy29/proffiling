<?php
session_start();

if(!isset($_SESSION['auth'])){
	header('location:login.php');
}



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    /> -->

    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    
    <title>CIT Student Profile</title>
  </head>
  <body>

    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar1">
      <div class="container-fluid">

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>




       
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"href="#">
          <img src="images/CIT.png" alt="" width="30" height="30" class="mx-1">CIT Student Profile
        </a>
        
        
        
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation">


        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">

           <!--  <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div> -->

          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <span>Welcome Admin</span>
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">My Account</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav sidebar1"tabindex="-1" id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a class="nav-link px-3 mt-4 active" href="dashboard.php">
                <span class="me-2"><img src="images/dashboard-customize.svg" alt=""></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-uppercase px-3 mb-3 text-light">
                Main Menu
              </div>
            </li>
            <li>
              <a id="course" class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"href="#layouts">
               
                <span class="d-flex justify-content-center align-items-center">
                <img  class ="me-3" src="images/menu-book-rounded.svg">
                  
                  <span>Courses</span>
                
                </span>



                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">


                  <li id="courseline">

                  </li>


                </ul>
              </div>
            </li>


            <li>
            <a href="student_table.php" class="nav-link px-3">
            <span class="me-2"><img src="images/table-chart-sharp.svg" alt=""></i></span>
            <span>Student Table</span>
              </a>  
            </li>

            <li>
            <a href="add_students.php" class="nav-link px-3">
                <span class="me-2"><img src="images/add2.svg" alt=""></i></span>
                <span>Add Students</span>
              </a>
            </li>

            <li>
            <a href="course_menu.php" class="nav-link px-3">
                <span class="me-2"><img src="images/menu-book-rounded.svg"></i></span>
                <span>Course Menu</span>
              </a>
            </li>



            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Admin Settings
              </div>
            </li>
            <li>
              <a href="change_admin_pass.php" class="nav-link px-3">
                <span class="me-2"><img src="images/change-circle.svg" alt=""></i></span>
                <span >Change Admin Pass</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><img src="images/add2.svg" alt=""></i></span>
                <span>Add Admin</span>  
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <!-- <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Add Students</h4>
          </div>
        </div> -->






  <div class="container-fluid mt-3 mb-3" >

    <div class="col-md-12 mb-3">

          <div class="card">

            <div class="card-header">


              <?php
              include 'connection.php';
              $conn = openCon();

              $course_id = $_GET['course'];

              $link = "SELECT * FROM course where CourseID ='$course_id'";
              $result1 = mysqli_query($conn, $link);

              $row1 = mysqli_fetch_assoc($result1);

              ?> 
    

              <span><i class="bi bi-table me-2"></i></span> <?php echo $row1['Course']?>
            </div>

              <div class="card-body">

                <div class="table-responsive">

                  <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <th hidden>ID</th>
                        <th>Student Number</th>
                        <th>Full Name</th>
                        <th>Birthday</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Actions</th>

                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    


                    $course_id = $_GET['course'];


                    $sql = "SELECT * FROM student_table where CourseID ='$course_id'";
                    $result = mysqli_query($conn, $sql);

                    if($result->num_rows>0){
                        while ($row = $result ->fetch_assoc()){
                        $full_name = $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];

                    ?>

                
      
                      <tr>
                        <td hidden><?php echo $row['Student_ID']?></td>
                        <td><?php echo $row['Student_Number']?></td>
                        <td><?php echo $full_name?></td>
                        <td><?php echo $row['Date_of_Birth']?></td>
                        <td><?php echo $row['Age']?></td>
                        <td><?php echo $row['Contact_Number']?></td>
                        <td><?php echo $row['Gender']?></td>
                        <td><?php echo $row1['Course']?></td>
                        

                        <td><button data-id='<?php echo $row['Student_ID']?>' type="button" class="view_info btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="images/baseline-remove-red-eye.svg">
                        </button>

                        <a href="update_students.php?update=<?php echo $row['Student_ID']?>"><button type="button" class="btn btn-success"><img src="images/edit.svg"></button></a>
                        
                        <button type="button" class="btn btn-danger btn_del" data-bs-toggle="modal" data-bs-target="#ask_delete" id="deletebtn"><img src="images/trash-bold.svg"></button>
                        </td>
                      </tr>
                    
                      </tr>

                      <?php 
                            }
                        }
                        ?>

                    </tbody>
            
                  </table>
                  
                </div>
              </div>
        </div>
    </div>
  </div>


  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are your sure you want to Logout?
      </div>
      
      <div class="modal-footer">

      <a href="logout.php"><button type="button" class="btn btn-danger">Yes</button></a>
      <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>



<!-- MODAL FOR STUDENT INFO -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel ">Student Info</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- STUDENT INFO -->
        <div class="modal-body stud_info">
            <div class="container ">

              <div class="container-lg d-flex m-1 p-1">

             
              </div>  
         
        </div>
      </div>
    
        <!-- END OF STUDENT INFO -->

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<!-- END OF MODAL FOR STUDENT INFO -->



<!-- DELETE CONFIRMATION -->

<div class="modal fade" id="ask_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


    
      <form method = "POST" action="functions/delete_student.php">


      <div class="modal-body">
      Do you want to Delete this Data?
      </div>
      
      <div class="modal-footer">

      <!-- GET ID OF EACH USERS IN TABLE -->
      <input type="hidden" name="del_id" id="del_id">       

      <!-- END OF GET ID OF EACH USERS IN TABLE -->

      <button type="submit" class="btn btn-danger" name="delete_stud">Yes</button>
      <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>

      </div>
      </form>


    </div>
  </div>
</div>
<!-- END OF DELETE CONFIRMATION -->
















        <!-- FORMS -->

   
        <div class="row">
          





        </div>



        
      </div>
    </main>


    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="js/functions_js.js"></script>


  </body>
</html>
