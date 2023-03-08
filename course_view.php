<?php
  include 'connection.php';
  $conn = openCon();

  $stmt = $conn->prepare("SELECT * FROM course");
  $stmt ->execute();
  $result = $stmt->get_result();



  if ($result->num_rows >0){
      while ($row = $result -> fetch_assoc()){
  ?>
  
    
            <a href="course_table.php?course=<?php echo $row['CourseID']?>" class="nav-link px-5">
                      <span class="me-2"><img src="images/compass-drafting.svg" alt=""></i></span>
                      <span><?php echo $row['Course']?></span>
            </a>

      

    <?php
        }
    }
    ?>











?>