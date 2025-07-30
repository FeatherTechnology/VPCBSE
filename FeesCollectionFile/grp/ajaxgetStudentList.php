<?php
//Also using in fees_collection.
//Also using in fees_concession.
include '../../ajaxconfig.php';
@session_start();
if(isset($_SESSION["userid"])){
  $userid = $_SESSION["userid"];
$school_id = $_SESSION["school_id"];
$year_id = $_SESSION["academic_year"];

} 

$medium = '';
if(isset($_POST['medium'])){
  $medium = $_POST['medium'];
}
$standard = '';
if(isset($_POST['standard'])){
  $standard = $_POST['standard']; 
}
$section = '';
if(isset($_POST['section'])){
  $section = $_POST['section'];
}
$student_id = '';
if(isset($_POST['student_id'])){
  $student_id = $_POST['student_id'];
}
$student_name1 = '';
if(isset($_POST['student_name1'])){
  $student_name1 = $_POST['student_name1'];
}

// listen for changes in the medium, standard, and section dropdowns
if($medium != '' && $standard != ''  && $section != ''){
  
  // make a query to fetch the student names list
  $sql2 = "SELECT sc.student_id, sc.student_name FROM student_creation sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id WHERE sc.medium = '$medium' AND sh.standard = '$standard' AND sh.section = '$section' AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND sc.status = 0 ";
  $result2 = mysqli_query($mysqli, $sql2);

  // check if there are any students in the result
  if (mysqli_num_rows($result2) > 0) {
    $student_idArr = array();
    $student_name = array();
    while($row2 = mysqli_fetch_assoc($result2)) {
      $student_idArr[] = $row2['student_id'];
      $student_name[] = $row2['student_name'];
    }
    echo json_encode(array("student_id"=>$student_idArr, "student_name"=>$student_name));
  } else {
    echo json_encode(array("student_id"=>array(), "student_name"=>array()));
  }

} else if($medium != '' && $standard != ''){
  
  // make a query to fetch the section list
  $sql = "SELECT sh.section FROM student_creation sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id WHERE sc.medium = '$medium' AND sh.standard = '$standard'  AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND sc.status = 0 GROUP BY section";
  $result = mysqli_query($mysqli, $sql);

  // check if there are any sections in the result
  if (mysqli_num_rows($result) > 0) {
    $sectionNameArr = array();
    while($row = mysqli_fetch_assoc($result)) {
      $sectionNameArr[] = $row['section'];
      
    }
    echo json_encode(array("section"=>$sectionNameArr));
  } else {
    echo json_encode(array("section"=>array()));
  }

} else if($student_id !='' && $student_name1 !=''){
    
  if (!empty($student_id)) {
      $sql = "SELECT sc.student_name FROM student_creation  sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id  WHERE sc.student_id = '$student_id' AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND status = 0 ";
  } elseif (!empty($student_name1)) {
    $sql = "SELECT sc.student_name FROM student_creation  sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id  WHERE sc.student_id = '$student_id' AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND status = 0 ";
  } else {
      // handle error case
  }

  // execute the query and return results
  $result = mysqli_query($mysqli, $sql);

  // check if there are any students in the result
  if (mysqli_num_rows($result) > 0) {
      $student_name2 = array();
      while($row = mysqli_fetch_assoc($result)) {
          $student_name2[] = $row['student_name'];
      }
      echo json_encode(array("student_name2"=>$student_name2));
  } else {
      echo json_encode(array("student_name2"=>array()));
  }

} else if($standard != ''){

  // make a query to fetch the section list
  $sql = "SELECT sh.section FROM student_creation sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id WHERE sh.standard = '$standard'  AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND sc.status = 0 GROUP BY section "; 
  $result = mysqli_query($mysqli, $sql);

  // check if there are any sections in the result
  if (mysqli_num_rows($result) > 0) {
    $sectionArr = array();
    while($row = mysqli_fetch_assoc($result)) {
      $sectionArr[] = $row['section'];
    }
    echo json_encode(array("section"=>$sectionArr));
  } else {
    echo json_encode(array("section"=>array()));
  }

} else if($section !=''){
  
    // make a query to fetch the student names list
    $sql2 = "SELECT sc.student_id, sc.student_name FROM student_creation sc LEFT JOIN student_history sh ON sc.student_id = sh.student_id WHERE sc.medium = '$medium' AND sh.standard = '$standard' AND sh.section = '$section' AND sc.school_id='$school_id' AND sh.academic_year ='$year_id' AND sc.status = 0 ";
    $result2 = mysqli_query($mysqli, $sql2);
  
    // check if there are any students in the result
    if (mysqli_num_rows($result2) > 0) {
      $student_idArr = array();
      $student_name = array();
      while($row2 = mysqli_fetch_assoc($result2)) {
        $student_idArr[] = $row2['student_id'];
        $student_name[] = $row2['student_name'];
      }
      echo json_encode(array("student_id"=>$student_idArr, "student_name"=>$student_name));
    } else {
      echo json_encode(array("student_id"=>array(), "student_name"=>array()));
    }
  }
  
  // close the database connection
  mysqli_close($mysqli);

?>
