<?php
include '../../ajaxconfig.php';
@session_start();

if(isset($_SESSION['userid'])){
    $userid = $_POST['userid'];
}

if (isset($_POST['admissionno'])) {
    $admission_number = $_POST['admissionno'];
}
if (isset($_POST['studentid'])) {
    $studentid = $_POST['studentid'];
}
if (isset($_POST['attachment_id'])) {
    $attachment_id = $_POST['attachment_id'];
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
}
// if (isset($_POST['updatecertificate'])) {
//     $updatecertificate = $_POST['updatecertificate'];
// }

$certificate = '';
$fileroot = "uploads/certificates/". $admission_number; 
$dir = "../../uploads/certificates/". $admission_number; 

if (!empty($_FILES['file']['name'])) {
    // set the directory path name
    
    // Check if the directory already exists
    if (!is_dir($dir)) {
        // If not, make the directory
        mkdir($dir, 0777);
    }

    // delete old file
    $path = "$dir/" . $_POST["updatecertificate"];
    if (file_exists($path)) {
        unlink($path);
    }
    // insert new file
    $certificate = $_FILES['file']['name'];
    $certificate_tmp = $_FILES['file']['tmp_name'];
    $certificatefolder = "$dir/" . $certificate;
    move_uploaded_file($certificate_tmp, $certificatefolder);
    $filepath = "$fileroot/" . $certificate;
}

if($certificate == '' && isset($_POST["updatecertificate"])){
    $certificate = $_POST["updatecertificate"];
    $filepath = "$fileroot/" . $certificate;
}

// Get the file extension
$file_info = pathinfo($certificate);
$certificate_format = $file_info['extension'];

$attachmenttitle='';
$attachmentStatus='';
$selectAttachment=$mysqli->query("SELECT * FROM attachment WHERE title = '".$title."' AND student_id = '".$studentid."' ");
while ($row=$selectAttachment->fetch_assoc()){
	$attachmenttitle    = $row["title"];
	$attachmentStatus  = $row["status"];
}

if($attachmenttitle != '' && $attachmentStatus == 0){
	$message="Attachment Already Exists, Please Enter a Different Name!";
}else if($attachmenttitle != '' && $attachmentStatus == 1){ 
	$updateAttachment = $mysqli->query("UPDATE attachment SET status=0, updated_date = now() WHERE title='".$title."' AND student_id = '".$studentid."' ");
	$message="Attachment Added Succesfully";
}else{
	if($attachment_id>0){
		$updateAttachment = $mysqli->query("UPDATE attachment SET title='".$title."', file_name ='$certificate', file_path ='$filepath', attach_format ='$certificate_format', update_login_id = '$userid', updated_date = now()  WHERE attachment_id ='".$attachment_id."' ");
        
		if($updateAttachment){
            $message="Attachment Updated Succesfully";
        }
    }
	else{
        $insertAttachment = $mysqli->query("INSERT INTO attachment(student_id, title, file_name, file_path, attach_format, insert_login_id) VALUES ('$studentid', '$title', '$certificate', '$filepath', '$certificate_format', '$userid')");
        if($insertAttachment){
            $message="Attachment Added Succesfully";
        }
    }
}

echo json_encode($message);
?>