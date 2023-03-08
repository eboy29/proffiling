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

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    /> -->

    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
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
              <a href ="dashboard.php"class="nav-link px-3 mt-4 active">
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

              <a id ="course" class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"href="#layouts">
               
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
                <ul class="navbar-nav ps-3" >

                <li id ="courseline"></li>

                
                  
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          

          <?php
          if(isset($_SESSION['message'])){
            

            ?>

        <div class="alert alert-success" role="alert">
          <?= $_SESSION['message'];?>
        </div>

        <?php     
          unset($_SESSION['message']);  
          }

          ?>

            <h4>Course Menu</h4>
          </div>
        </div>


        <div class="row mt-4">

          <div class="container">
          <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped"
                    style="width: 100%">
                    <thead>
                      <tr>
                        <th>CourseID</th>
                        <th>Course Name</th>
                        <th>Image Name</th>

                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    include 'connection.php';
                    $conn = openCon();


                    $stmt = $conn->prepare("SELECT * FROM Course");
                    $stmt ->execute();
                    $result = $stmt->get_result();


                    /*  $show = "SELECT * FROM student_table";
                    $result = $conn ->query($show); */


                    if ($result->num_rows >0){
                        while ($row = $result -> fetch_assoc()){
    
                    ?>



                      <tr>
                        <td><?php echo $row['CourseID']?></td>
                        <td><?php echo $row['Course']?></td>
                        <td><?php echo $row['Images']?></td>
  
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







          <div id="message2"></div>







          <div class="row">

                <form method = "POST">

                <h4 class = "d-flex justify-content-center align-items-center">Add New Course</h4>

                <div class="form1 d-flex justify-content-center align-items-center flex-column mt-4">
                    <div class="col-md-4 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Course Name</label>
                        <input type="text" name = "course"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="course_logo" aria-describedby="emailHelp" onchange="validate2(this.value)">
                    </div>

                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-primary d-flex">Submit</button>
                    </div>

                    
                </div>
               
                </form>

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


          

     








        </div>

   
        



        
      </div>
    </main>


    
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script> -->
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="js/functions_js.js"></script>
  </body>
</html>
