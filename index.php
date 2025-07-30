<?php	
date_default_timezone_set('Asia/Calcutta');
@session_start();

$id=0;
include("api/main.php");
$msg="";

/* Log In Start  */

if(isset($_POST['lusername'])) {  

	$username  = $_POST['lusername'];
	$password  =  $_POST['lpassword'];
    $school = $_POST['school'];
    $year = $_POST['year'];

	$getyearfromschool = "SELECT year_id FROM school_creation WHERE status = '0' AND school_id='$school'";
	$res1 = $mysqli->query($getyearfromschool) or die("Error in Get All Records".$mysqli->error);
	$row1 = $res1->fetch_object();
	
		$year1 = $row1->year_id;
			// Split the string into individual years
		$yearsArray = explode(',', $year1);

		// Iterate through the years and add single quotes
		$quotedYears = array();
		foreach ($yearsArray as $year1) {
		$quotedYears[] = "'" . trim($year1) . "'";
		}

		// Convert the array of quoted years back to a string
		$quotedYearsString = implode(', ', $quotedYears);
		$len = strlen($quotedYearsString);
		if ($len > 11){
			$quotedYearsStrings = implode(', ', $quotedYears);
		}else{
			$quotedYearsString = implode(', ', $quotedYears);
			$quotedYearsStrings = trim($quotedYearsString,"'");
		}


	$qry = "SELECT u.fullname,u.user_name,u.user_id,u.school_id,s.school_name,s.school_logo,a.year_id,a.academic_year FROM user u LEFT JOIN school_creation s ON s.school_id=u.school_id LEFT JOIN academic_year a ON a.academic_year IN ($year) = s.year_id IN ($quotedYearsStrings) WHERE u.user_name = '$username' AND u.user_password = '$password' AND u.status=0  AND u.school_id ='$school' AND a.academic_year='$year'"; 
	$res = mysqli_query($mysqli, $qry)or die("Error in Get All Records".mysqli_error($mysqli)); 
	$result = mysqli_fetch_array($res);
	if ($mysqli->affected_rows>0)
	{  
		$_SESSION['username']    = $result['user_name']; 
		$_SESSION['userid']      = $result['user_id']; 
		$_SESSION['fullname']    = $result['fullname']; 
		$_SESSION['school_id']    = $result['school_id']; 
		$_SESSION['school_name']    = $result['school_name']; 
		$_SESSION['school_logo']    = $result['school_logo']; 
		$_SESSION['year_id']    = $result['year_id']; 
		$_SESSION['academic_year']    = $result['academic_year']; 
		$_SESSION['curdateFromIndexPage']    = date('Y-m-d'); 
		?>
		<script>location.href='<?php echo $HOSTPATH; ?>dashboard';</script>  
		<?php
	}	
	else
	{ 
		$msg="Enter Valid Email Id and Password";
	} 
}
?>

<?php include("include/common/accounthead.php"); ?>

	<form  id="loginform" name="loginform" action="" method="post">
		<div class="row justify-content-md-center">
			<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
				<div class="login-screen">
					<div class="login-box">
						<a href="#" class="login-logo">
							<h3 style="color: #5090c0; padding-left: 50px;">SCHOOL SOFTWARE</h3>
						</a>
						<span class="text-danger" id="cinnocheck">		 
						<?php
						if($msg != '')
						{
							echo $msg; 
						}
						?>
						</span>
						<h5>Welcome back,<br />Please Login to your Account.</h5>
						<div class="form-group mt-4">
							<input type="text" name="lusername" id="lusername"  tabindex="1"  class="form-control val" placeholder="Enter Email" />
							<span id="usernamecheck" class="text-danger" style="display: none;"></span>    
						</div>
						<div class="form-group mt-4">
							<input type="password" name="lpassword" id="lpassword"  tabindex="2"  class="form-control val" placeholder="Enter Password" />
							<span id="passwordcheck" class="text-danger" style="display: none;"></span>    
						</div>		
						<div class="form-group mt-4">
							<select class="school form-control val" id="school" tabindex="3" name="school" required></select>
							<span id="scval" class="text-danger"></span>
						</div>
						<div class="form-group mt-4">
							<select class="academic_year form-control val" tabindex="4" id="academic_year" name="year" required></select> 
							<span id="yrval" class="text-danger"></span>
						</div>
						<div class="actions" style="margin-top: 60px;">
							<button type="submit"  id="lbutton"  tabindex="5" name="lbutton" class="form-control btn btn-primary" >Login</button>
						</div>
						
						<hr>

					</div>
				</div>
			</div>
		</div>
	</form>
			
<?php $current_page = isset($_GET['page']) ? $_GET['page'] : null; ?>
			
<?php include("include/common/dashboardfooter.php"); ?>
		