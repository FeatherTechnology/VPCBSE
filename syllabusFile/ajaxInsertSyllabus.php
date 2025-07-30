<?php
include '../ajaxconfig.php';
@session_start();

if(isset($_SESSION['curdateFromIndexPage'])){
	$curdate = $_SESSION['curdateFromIndexPage'];
}
if(isset($_SESSION["userid"])){
    $school_id = $_SESSION["school_id"];
} 

if(isset($_POST['paper_name'])){
	$paper_name = $_POST['paper_name'];
}
if(isset($_POST['max_mark'])){
	$max_mark = $_POST['max_mark'];
}
if(isset($_POST['class_id'])){
	$class_id = $_POST['class_id']; 
}
if(isset($_POST['insert_login_id'])){
	$insert_login_id = $_POST['insert_login_id']; 
} 
if(isset($_POST['subject_id'])){
	$subject_id = $_POST['subject_id']; 
} 

$subpaper_name='';
$subclass_id='';
$classStatus='';
$maxMark='';

$selectClass=$mysqli->query("SELECT * FROM subject_details WHERE paper_name = '".$paper_name."' AND class_id = '".$class_id."' AND school_id ='$school_id' ");
while ($row=$selectClass->fetch_assoc()){
	$subpaper_name    = $row["paper_name"];
	$subclass_id    = $row["class_id"];
	$classStatus  = $row["status"];
	$maxMark  = $row["max_mark"];
}

if($subpaper_name != '' && $subclass_id != '' && $classStatus == 0 && $maxMark == $max_mark){
	$message="Subject Already Exists, Please Enter a Different Name!";

}else if($subpaper_name != '' && $subclass_id != '' && $classStatus == 1){
	$updateClass=$mysqli->query("UPDATE subject_details SET paper_name='$paper_name', max_mark='$max_mark', status = 0, update_login_id = '$insert_login_id', updated_date = '$curdate' WHERE paper_name='".$paper_name."' AND class_id = '".$class_id."' AND school_id ='$school_id' ");
	$message="Subject Details Added Succesfully";

}else{
	if($subject_id>0){
		$updateClass=$mysqli->query("UPDATE subject_details SET class_id='$class_id', paper_name='$paper_name', max_mark='$max_mark', update_login_id = '$insert_login_id', updated_date = '$curdate' WHERE subject_id='$subject_id' ");
		if($updateClass == true){
			$message="Subject Details Updated Succesfully";
		}
    }
	else{
		$insertClass=$mysqli->query("INSERT INTO subject_details(class_id, paper_name, max_mark, school_id, insert_login_id) VALUES('".strip_tags($class_id)."', '".strip_tags($paper_name)."', '".strip_tags($max_mark)."', '".$school_id."', '".strip_tags($insert_login_id)."')");
		if($insertClass == true){
			$message="Subject Insert Succesfully";
		}
    }
}

echo json_encode($message);
?>