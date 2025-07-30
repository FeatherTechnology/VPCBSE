<?php
@session_start();
include 'ajaxconfig.php';

if(isset($_SESSION["userid"])){
	$userid = $_SESSION["userid"];
}
if(isset($_POST["class_id"])){
	$class_id = $_POST["class_id"];
}

   
?>
		<!-- <div id="stockinformation"> -->
			<!-- Row start -->
			<!-- <div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="table-container">
						<div class="table-responsive"> -->
						<!-- <button onclick="window.print()">Print Table</button> -->

							<table class="table custom-table" id="syllabus_allocation">
								<tr>
								 <label style="background-color:#5090c0;color:#fff;width:100%;padding:10px;">Course Name: 
								<?php 
									if($class_id == "2"){
										echo "L.K.G" ;
									}elseif($class_id == "3"){
										echo "U.K.G" ;
									}elseif($class_id == "4"){
										echo "I" ;
									}elseif($class_id == "5"){
										echo "II" ;
									}elseif($class_id == "6"){
										echo "III" ;
									}
								?>
								<label>
								</tr>
								<tr>
								<th>S.No</th>
								<th>Paper Name</th>
								</tr>
							<?php
							$paper_name     = array();
							$class_id1     	= array();
							$subject_id 	= array();
							$getrefqry =$mysqli->query("SELECT * FROM subject_details  WHERE class_id = '".$class_id."' "); 
							
							while($orow = $getrefqry->fetch_assoc()){
								$subject_id[]		 = $orow["subject_id"];
								$paper_name[]		 = $orow["paper_name"];
								$class_id1[]        = $orow["class_id"];
							}
							if(sizeof($subject_id)>0){		
								for($i=0;$i<=sizeof($subject_id)-1;$i++){ 
								?>
								<tbody>
									<td><?php echo $i+1; ?></td>
									<td><?php echo $paper_name[$i]; ?></td>
								</tbody>

							<?php } } else {
							$notavl="No Records Found"; ?>
							<label class="text-danger"><?php echo $notavl; ?></label>
							<?php } ?>
						</table>
					<!-- </div>
				</div>
			</div>
		</div> -->
	<!-- </div> -->
<!-- </div> -->

<!-- <script>
	$('#syllabus_allocation').DataTable({ 
		'iDisplayLength': 5,
		"language": {
			"lengthMenu": "Display _MENU_ Records Per Page",
			"info": "Showing Page _PAGE_ of _PAGES_",
		}
		});
	</script> -->
