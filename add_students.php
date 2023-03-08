<?php
session_start();

if(!isset($_SESSION['auth'])){
	header('location:login.php');
}

include 'f_add_students.php';
?>





<html>
  <head>

  
<!--     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>    
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>

   

    
 


    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="./js/functions_js.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
    
    <link rel ="stylesheet" href ="cropper/cropper.css">
    <script src="cropper/cropper.js"></script>

    <link rel ="stylesheet" href ="cropper/cropper.min.css">
    <script src="cropper/cropper.min.js"></script>


    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    /> -->

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



<?php if(isset($_POST['crop_image']))

echo '<div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">'
.$imgname;

?>


<div class="container-fluid mt-3 mb-3 overflow-auto" >

<div id="message"></div>


<?php if(isset($error)):?>
  <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">
 <?php echo $error?>
</div> 
<?php endif?>

<?php if(isset($success)):?>
  <div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
 <?php echo $success?>
</div> 
<?php endif?>










<!-- <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert" id="alerter">
 success
</div> -->



  <h2 class="container-fluid d-flex justify-content-center mt-3 mb-4">Add Student</h2>



  <form class="row g-3" id="add_student" method ="POST" onmousemove="findAge()">

      <!-- FIRST ROW -->

   
      

      <div class="row m-0 mb-3">

      <div class="mb-3">Personal Information</div>


      <!-- STUDENT NUMBER -->
      <div class="col-md-3">
        <label for="inputEmail4" class="form-label" >Student Number</label>
        <input type="text" class="form-control" value="<?php echo $stud_num ?>" required ="required" id="stud_num1" name ="stud_num" onkeypress="number(event)">

      </div>
      

      <!-- FIRST NAME -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">First Name</label>
        <input type="text" class="form-control" id="inputPassword4" name ="fname" value="<?php echo $fname ?>">
        <p class="text-danger help-block"></p>
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="inputPassword4" name ="mname" value="<?php echo $mname?>">
        <p class="text-danger help-block"></p>
      </div>

      
      <!-- LAST NAME -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="inputPassword4" name ="lname" value="<?php echo $lname ?>">
        <p class="text-danger help-block"></p>
      </div>


      <!-- GENDER -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Gender</label>
        <select id="inputState" class="form-select" name ="gender">
          <option selected>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
        <p class="text-danger help-block"></p>
      </div>


      <!-- DATE OF BIRTH -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name ="dob" id ="dobCal" >
        <p class="text-danger help-block"></p>
      </div>



      <!-- AGE -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Age</label>
        <input type="text" class="form-control" readonly name ="age" id="age" >
        <p class="text-danger help-block"></p>
      </div>


      <!-- CONTACT NUMBER -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Contact Number</label>
        <input type="text" class="form-control" placeholder="+63" value="<?php echo $cnum ?>" id="inputPassword4" name ="cnum" onkeypress="number(event)">
        <p class="text-danger help-block"></p>
      </div>


      <!-- EMAIL -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Email</label>
        <input type="text" class="form-control" value="<?php echo $email ?>"id="inputPassword4" name ="email">
        <p class="text-danger help-block"></p>
      </div>

      <!-- PLACE OF BIRTH -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Place of Birth</label>
        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $pob ?>" name ="pob">
        <p class="text-danger help-block"></p>
      </div>


      <!-- RELIGION -->
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Religion</label>
        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $religion ?>" name ="religion">
        <p class="text-danger help-block"></p>
      </div>

      </div>


    <div class="row m-0 mb-3">

      <div class="mb-4">Residential Address</div>

    
      <!-- HOME NO -->
      <div class="col-6">
        <label for="inputAddress" class="form-label">Home No / Blg No</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $street ?>"placeholder="1234 Main St" name ="homeno">
        <p class="text-danger help-block"></p>
      </div>

      <!-- STREET -->
      <div class="col-6">
        <label for="inputAddress" class="form-label">Street/Blg Name</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $street ?>" placeholder="Example St/Building " name ="street">
        <p class="text-danger help-block"></p>
      </div>


      <!-- BARANGAY -->
      <div class="col-6">
        <label for="inputAddress" class="form-label">Barangay / Road Name</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $brgy ?>" placeholder="Sito Juan/Roxas Ave" name ="brgy">
        <p class="text-danger help-block"></p>
      </div>

      <!-- CITY -->
      <div class="col-6">
        <label for="inputAddress" class="form-label">City</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $city ?>" placeholder="Manila" name ="city">
        <p class="text-danger help-block"></p>
      </div>


      <!-- PROVINCE -->
      <div class="col-6">
        <label for="inputAddress" class="form-label">Province</label>
        <input type="text" class="form-control" id="inputAddress" value="<?php echo $prov ?>" placeholder="NCR" name ="prov">
        <p class="text-danger help-block"></p>
      </div>



      </div>


      <div class="row m-0 mb-3">

        <div class="mb-4">Parent Information</div>


      <!-- PARENTS NAME -->
      <div class="col-md-3">
        <label for="inputZip" class="form-label">Parents Name</label>
        <input type="text" class="form-control" id="inputZip" value="<?php echo $pname ?>"name ="pname">
      </div>


      <!-- RELATIONSHIP -->
      <div class="col-md-3">
        <label for="inputZip" class="form-label">Relationship</label>
        <input type="text" class="form-control" id="inputZip" value="<?php echo $relation ?>"name ="relation">
      </div>

      <!-- OCCUPATION -->
      <div class="col-md-3">
        <label for="inputZip" class="form-label">Occupation</label>
        <input type="text" class="form-control" id="inputZip" value="<?php echo $job ?>"name ="job">
      </div>

      <!-- CONTACT NUMBER -->
      <div class="col-md-3">
        <label for="inputZip" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="inputZip" name ="pnum" value="<?php echo $pnum ?>"onkeypress="number(event)">
      </div>

      </div>



      <div class="row m-0 mb-3">

      <div class="mb-3">Course Information</div>


      <!-- PICTURE -->
        <div class="col-md-5">
          <label for="inputZip" class="form-label">Upload A Picture</label>
          <input type="file" class="form-control crop_img" id="crop_img" name ="pic" onchange="validate(this.value)">
        </div>



        

        

       
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">Course</label>
          <select id="inputState" class="form-select" name ="course">



          <?php
          $stmt = $conn->prepare("SELECT * FROM course");
          $stmt ->execute();
          $result = $stmt->get_result();


          if ($result->num_rows >0){
              while ($row = $result -> fetch_assoc()){
        ?>

            <option value="<?php echo $row['CourseID']?>"><?php echo $row['Course'];?></option>
            
            <?php
            }
          }
         ?>



          </select>
        </div>


        <!-- IMAGE NAME -->
        <input type="hidden" id="filename" name="fpic">
        <!-- END OF IMAGE NAME -->

      </div>
      


      <!-- SUBMIT BUTTON -->
      <div class="row m-0 mb-3">
        <div class="col-15">
          <button type="submit" class="btn btn-primary" name ="submit" id ="sendbtn">Add Student</button>
        </div>
      </div>
      
     
  </form>
</div>



<!-- LOGOUT MODAL -->


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

<!-- END OF LOGOUT MODAL -->



<!-- MODAL FOR IMAGE CROP -->

<div class="modal fade " id="box_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crop Your Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
            <div class="img-container">
              <div class="row">
                
                  <div class="col-md-8 d-flex">
                    <img src="" id="sample_image" class="img-fluid w-100 h-100"/>
                  </div>

                  <div class="col-md-4">
                    <div class="preview"></div>
                  </div>

              </div>
            </div>
        </div>   

      
      <div class="modal-footer">

      <button type="button" class="btn btn-primary" id="cropbtn">Crop Image</button></a>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>

<!-- END FOR MODAL IMAGE DROP -->





    </main>
  </body>
</html>
