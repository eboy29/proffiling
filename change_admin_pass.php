<?php
session_start();

if(!isset($_SESSION['auth'])){
	header('location:login.php');
}

include 'functions/change_admin_pass_f.php';

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
              <a id="course"class="nav-link px-3 sidebar-link" data-bs-toggle="collapse"href="#layouts">
               
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
              <a href="#" class="nav-link px-3">
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
          if(isset($_SESSION['admin_pass'])){
            

            ?>

        <div class="alert alert-danger" role="alert">
          <?= $_SESSION['admin_pass'];?>
        </div>

        <?php     
          unset($_SESSION['admin_pass']);  
          }
          else if(isset($_SESSION['success'])){
        ?>

          <div class="alert alert-success" role="alert">
          <?= $_SESSION['success'];?>
        </div>




        <?php
        unset($_SESSION['success']);  
                  }

                  ?>

            
          </div>
        </div>


  <div class="container-fluid">

  

    <form method ="POST" class ="w-100">

    <h4>Change Admin Password</h4>


  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>

  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Old Password</label>
    <input type="password" name ="old_pass"class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" name="new_pass"class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name="c_pass"class="form-control" id="exampleInputPassword1">
  </div>


  <button type="submit" name="change_btn" class="btn btn-primary">Change Password</button>
</form>
        


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
