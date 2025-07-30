<?php
if(isset($_SESSION["userid"])){
	$userid = $_SESSION["userid"];
} 

$getmanageuserdetails = $userObj->getuser($mysqli,$userid); 
if (sizeof($getmanageuserdetails)>0) {
	$dashboard                  = $getmanageuserdetails['dashboard']; 
	$administration_module                  = $getmanageuserdetails['administration_module']; 
	$trust_creation                  = $getmanageuserdetails['trust_creation']; 
	$school_update                  = $getmanageuserdetails['school_update']; 
	$fees_master                  = $getmanageuserdetails['fees_master']; 
	$holiday_creation                  = $getmanageuserdetails['holiday_creation']; 
	$manage_users                  = $getmanageuserdetails['manage_users']; 
	$master_module                  = $getmanageuserdetails['master_module']; 
	$area_master                  = $getmanageuserdetails['area_master']; 
	$syllabus_sub_module                  = $getmanageuserdetails['syllabus_sub_module']; 
	$allocation                  = $getmanageuserdetails['allocation']; 
	$allocation_view                  = $getmanageuserdetails['allocation_view']; 
	$staff_module                  = $getmanageuserdetails['staff_module']; 
	$staff_creation                  = $getmanageuserdetails['staff_creation']; 
	$student_module                  = $getmanageuserdetails['student_module']; 
	$temp_admission_form                  = $getmanageuserdetails['temp_admission_form']; 
	$student_creation                  = $getmanageuserdetails['student_creation']; 
	$student_rollback                  = $getmanageuserdetails['student_rollback']; 
	$delete_student                  = $getmanageuserdetails['delete_student']; 
	$certificate_sub_module                  = $getmanageuserdetails['certificate_sub_module']; 
	$transfer                  = $getmanageuserdetails['transfer']; 
	$collection_module                  = $getmanageuserdetails['collection_module']; 
	$fees_concession                  = $getmanageuserdetails['fees_concession']; 
	$fees_collection                  = $getmanageuserdetails['fees_collection']; 
	$sms_module                  = $getmanageuserdetails['sms_module']; 
	$birthday_wishes                  = $getmanageuserdetails['birthday_wishes']; 
	$tamil_birthday_wishes                  = $getmanageuserdetails['tamil_birthday_wishes']; 
	$student_general_message                  = $getmanageuserdetails['student_general_message']; 
	$staff_general_message                  = $getmanageuserdetails['staff_general_message']; 
	$home_work                  = $getmanageuserdetails['home_work']; 
	$report_module                  = $getmanageuserdetails['report_module']; 
	$student_report_sub_module                  = $getmanageuserdetails['student_report_sub_module']; 
	$student_caste_report                  = $getmanageuserdetails['student_caste_report']; 
	$class_wise_list                  = $getmanageuserdetails['class_wise_list']; 
	$register_of_admission                  = $getmanageuserdetails['register_of_admission']; 
	$student_transport_list                  = $getmanageuserdetails['student_transport_list']; 
	$fee_details_sub_module                  = $getmanageuserdetails['fee_details_sub_module']; 
	$daily_fees_collection                  = $getmanageuserdetails['daily_fees_collection']; 
	$day_end_report                  = $getmanageuserdetails['day_end_report']; 
	$overall_scholarship_fee_details                  = $getmanageuserdetails['overall_scholarship_fee_details']; 
	$pending_fee_details                  = $getmanageuserdetails['pending_fee_details']; 
	$all_type_pending_fee_details                  = $getmanageuserdetails['all_type_pending_fee_details']; 
	$classwise_overall_pending                  = $getmanageuserdetails['classwise_overall_pending']; 
	$fees_summary                  = $getmanageuserdetails['fees_summary']; 
	$monthwise_fees_summary                  = $getmanageuserdetails['monthwise_fees_summary'];	
}
?>

<style>
	body {
	font-family: "Lato", sans-serif;
	}

	/* Fixed sidenav, full height */
	.sidenav {
	height: 100%;
	width: 200px;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #111;
	overflow-x: hidden;
	padding-top: 20px;
	}

	/* Style the sidenav links and the dropdown button */
	.sidenav a, .dropdown-btn1 {
	padding: 6px 8px 6px 16px;
	text-decoration: none;
	
	color: #818181;
	display: block;
	border: none;
	background: none;
	width: 100%;
	text-align: left;
	cursor: pointer;
	outline: none;
	}

	/* On mouse-over */
	.sidenav a:hover, .dropdown-btn1:hover {
	color: #5090c0;
	}

	.sidenav a, .dropdown-btn {
	padding: 6px 8px 6px 16px;
	text-decoration: none;
	
	color: #818181;
	display: block;
	border: none;
	background: none;
	width: 100%;
	text-align: left;
	cursor: pointer;
	outline: none;
	}

	/* On mouse-over */
	.sidenav a:hover, .dropdown-btn:hover {
	color: #5090c0;
	}

	/* On mouse-over */
	.sidenav a:hover, .dropdown-btn1:hover {
	color: #5090c0;
	}
	/* Main content */
	.main {
	margin-left: 200px; /* Same as the width of the sidenav */
	
	padding: 0px 10px;
	}

	/* Add an active class to the active dropdown button */
	.active {
	
	color: white;
	}

	/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
	.dropdown-container {
	display: none;

	padding-left: 8px;
	}

	.dropdown-container1 {
	display: none;

	padding-left: 8px;
	}
	/* Optional: Style the caret down icon */
	.fa-caret-down {
	float: right;
	padding-right: 8px;
	}

	/* Some media queries for responsiveness */
	@media screen and (max-height: 450px) {
	.sidenav {padding-top: 15px;}
	.sidenav a {font-size: 18px;}
	}
</style>

<!-- Sidebar wrapper start -->
<nav id="sidebar" class="sidebar-wrapper" style="background-color:#1b6aaa;">

	<div class="sidebar-menu sidebar-brand" style="background-color: #1b6aaa">
			<ul>
                <li class="sidebar">
					<a href="dashboard">
						<span class="menu-text" style="text-align: center;"><h2 class="ml-4" style="color: white">School</h2></span>
					</a>
				
				</li>
            </ul>
   </div>
	<div class="sidebar-content">
	<!-- sidebar menu start -->
		<div class="sidebar-menu">
			<ul>
				<li>									
					<a href="dashboard"><i class="icon-devices_other"></i>Dashboard</a>
				</li>	
				<?php if(isset($administration_module) && $administration_module ==0){ ?>
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-cog"></i>
						<span class="menu-text">Administration</span>
					</a>
					<div class="sidebar-submenu">
						<ul>	
						<?php if(isset($trust_creation) && $trust_creation ==0){ ?>
							<li>
								<a href="edit_trust_creation"><i class="icon-shield"></i>Trust Creation</a>
							</li>	
						<?php } if(isset($school_update) && $school_update ==0){ ?>		
							<li>									
								<a href="edit_school_creation"><i class="icon-school"></i>School Update</a>
							</li>
						<?php } if(isset($fees_master) && $fees_master ==0){ ?>
							<li>
								<a href="fees_master_model1"><i><span class="icon-attach_money"></span></i>Fees Master</a>
							</li>
						<?php } if(isset($holiday_creation) && $holiday_creation ==0){ ?>
							<li>									
								<a href="holiday_creation"><i class="icon-calendar"></i>Holiday Info</a>
							</li>
						<?php } if(isset($manage_users) && $manage_users ==0){ ?>
							<li>									
								<a href="edit_manage_users"><i class="icon-person"></i>Manage Users</a>
							</li>
						<?php } ?>
						</ul>
					</div>
				</li>
			<?php } if(isset($master_module) && $master_module ==0){ ?>

				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-book"></i>
						<span class="menu-text">Master</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
						<?php if(isset($area_master) && $area_master ==0){ ?>
							<li>
								<a href="area_creation"><i><span class="icon-call_split"></span></i>Area Master</a>
							</li>
						<?php } if(isset($syllabus_sub_module) && $syllabus_sub_module ==0){ ?>
							<li class="sidebar-dropdown1">
								<a href="javascript:void(0)">
									<i class="icon-book"></i>
									<span class="menu-text" >Syllabus</span>
								</a>
								<div class="sidebar-submenu1">
									<ul>
									<?php if(isset($allocation) && $allocation ==0){ ?>
										<li>
											<a href="syllabus_allocation"><i class="icon-monitor"></i>Allocation
											</a>	
										</li>
									<?php } if(isset($allocation_view) && $allocation_view ==0){ ?>
										<li>
											<a href="syllabus_report"><i><span class="icon-eye"></span></i>Allocation View
											</a>	
										</li>
									<?php } ?>
									</ul>
								</div>	
							</li>
						<?php } ?>
							
						</ul>
					</div>
				</li>
			<?php } if(isset($staff_module) && $staff_module ==0){ ?>
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-person"></i>
						<span class="menu-text"> Staff </span>
					</a>
					<div class="sidebar-submenu">
						<ul>
						<?php if(isset($staff_creation) && $staff_creation ==0){ ?>
							<li>
								<a href="edit_staff_creation"><i class="icon-add-user"></i>Staff Creation</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</li>
			<?php } if(isset($student_module) && $student_module ==0){ ?>
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-user"></i>
						<span class="menu-text">Student</span>
					</a>
					<div class="sidebar-submenu">
						<ul>
						<?php if(isset($temp_admission_form) && $temp_admission_form ==0){ ?>
							<li>
								<a href="edit_temp_admission_form"><i class="icon-file"></i>Temp.Admission Form</a>
							</li>
						<?php } if(isset($student_creation) && $student_creation ==0){ ?>
							<li>
								<a href="edit_student_creation"><i class="icon-add-user"></i>Student Creation</a>
							</li>
						<?php } if(isset($student_rollback) && $student_rollback ==0){ ?>
							<li>
								<a href="student_rollback"><i class="icon-cw"></i>Student Roll Back</a>
							</li>
						<?php } if(isset($delete_student) && $delete_student ==0){ ?>
							<li>
								<a href="delete_student"><i class="icon-trash"></i>Delete Student</a>
							</li>
						<?php } if(isset($certificate_sub_module) && $certificate_sub_module ==0){ ?>
							<li class="sidebar-dropdown1">
								<a href="javascript:void(0)">
									<i class=""><span class="icon-cpu"></span></i>
									<span class="menu-text" >Certificates - 6</span>
								</a>
								<div class="sidebar-submenu1">
									<ul>
									<?php if(isset($transfer) && $transfer ==0){ ?>
										<li>									
											<a href="edit_transfer_certificate"><i><span class="icon-file-text"></span></i>Transfer</a>
										</li>
									<?php } ?>
									</ul>
								</div>	
							</li>
						<?php } ?>
						</ul>
					</div>
				</li>
			<?php } if(isset($collection_module) && $collection_module ==0){ ?>
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-wallet"></i>
						<span class="menu-text"> Collection </span>
					</a>
					<div class="sidebar-submenu">
						<ul>
						<?php if(isset($fees_concession) && $fees_concession ==0){ ?>
							<li>
								<a href="fees_concession"><i class="icon-attach_money"></i>Fees Concession</a>
							</li>
						<?php } if(isset($fees_collection) && $fees_collection ==0){ ?>
							<li>
								<a href="fees_collection"><i class="icon-file"></i>Fees Collection</a>
							</li>
						<?php } ?>
						</ul>
					</div>
				</li>
			<?php } if(isset($sms_module) && $sms_module ==0){ ?>
				<!-- SMS Module START -->
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-message"></i>
						<span class="menu-text"> SMS </span>
					</a>
					<div class="sidebar-submenu">
						<ul>
						<?php if(isset($birthday_wishes) && $birthday_wishes ==0){ ?>
							<li>
								<a href="edit_birthday_wishes"><i class="icon-cake"></i>Birthday Wishes</a>
							</li>
						<?php } if(isset($tamil_birthday_wishes) && $tamil_birthday_wishes ==0){ ?>
							<li>
								<a href="edit_tamil_birthday_wishes"><i class="icon-gift"></i>Tamil Birthday Wishes</a>
							</li>
						<?php } if(isset($student_general_message) && $student_general_message ==0){ ?>
							<li>
								<a href="edit_general_message"><i class="icon-chat_bubble"></i>Student General Message</a>
							</li>
						<?php } if(isset($staff_general_message) && $staff_general_message ==0){ ?>
							<li>
								<a href="edit_staff_general_message"><i class="icon-user-check"></i>Staff General Message</a>
							</li>
						<?php } if(isset($home_work) && $home_work ==0){ ?>
							<!-- <li>
								<a href="edit_home_work"><i class="icon-pencil"></i>Home Work</a>
							</li> -->
						<?php }  ?>
						</ul>
					</div>
				</li>
				<!-- SMS Module END -->

			<?php }  if(isset($report_module) && $report_module ==0){ ?>
				<li class="sidebar-dropdown">
					<a href="javascript:void(0)">
						<i class="icon-folder"></i>
						<span class="menu-text"> Reporting </span>
					</a>
					<div class="sidebar-submenu">
						<!-- Student report START -->
						<?php if(isset($student_report_sub_module) && $student_report_sub_module ==0){ ?>
						<ul>
							<li class="sidebar-dropdown1">
								<a href="javascript:void(0)">
									<i class="icon-file-text"></i>
									<span class="menu-text" >Student Report</span>
								</a>
								<div class="sidebar-submenu1">
									<ul>
									<?php if(isset($student_caste_report) && $student_caste_report ==0){ ?>
										<li>
											<a href="student_caste_report"><i class="icon-pie-chart"></i>Student Caste List</a>	
										</li>
									<?php } if(isset($class_wise_list) && $class_wise_list ==0){ ?>
										<li>
											<a href="class_wise_list"><i class="icon-list"></i>Class wise List</a>	
										</li>
									<?php } if(isset($register_of_admission) && $register_of_admission ==0){ ?>
										<li>
											<a href="register_of_admission"><i class="icon-documents"></i>Register of Admission</a>	
										</li>
									<?php } if(isset($student_transport_list) && $student_transport_list ==0){ ?>
										<li>
											<a href="student_transport_list"><i class="icon-airport_shuttle"></i>Student Transport List</a>	
										</li>
									<?php } ?>
									</ul>
								</div>	
							</li>
						</ul>
						<?php } if(isset($fee_details_sub_module) && $fee_details_sub_module ==0){ ?>
						<!-- Student report END -->

						<!-- Fee Details START -->
						<ul>
							<li class="sidebar-dropdown1">
								<a href="javascript:void(0)">
									<i class="icon-book"></i>
									<span class="menu-text" >Fee Details</span>
								</a>
								<div class="sidebar-submenu1">
									<ul>
									<?php if(isset($daily_fees_collection) && $daily_fees_collection ==0){ ?>
										<li>
											<a href="daily_fees_collection"><i class="icon-dollar-sign"></i>Daily Fees Collection</a>	
										</li>
									<?php } if(isset($day_end_report) && $day_end_report ==0){ ?>
										<li>
											<a href="day_end_report"><i class="icon-sunset"></i>Day End Report</a>	
										</li>
									<?php } if(isset($overall_scholarship_fee_details) && $overall_scholarship_fee_details ==0){ ?>
										<li>
											<a href="overall_scholarship_fee_details"><i class="icon-file"></i>OverAll Scholarship Fee Details </a>	
										</li>
									<?php } if(isset($pending_fee_details) && $pending_fee_details ==0){ ?>
										<li>
											<a href="pending_fees_details"><i class="icon-file"></i>Pending Fee Details</a>	
										</li>
									<?php } if(isset($all_type_pending_fee_details) && $all_type_pending_fee_details ==0){ ?>
										<li>
											<a href="all_type_pending_fees"><i class="icon-file"></i>All Type Pending Fee Details</a>	
										</li>
									<?php } if(isset($classwise_overall_pending) && $classwise_overall_pending ==0){ ?>
										<li>
											<a href="classwise_overall_pending"><i class="icon-file"></i>Class-wise Overall Pending</a>	
										</li>
									<?php } if(isset($fees_summary) && $fees_summary ==0){ ?>
										<li>
											<a href="fees_summary"><i class="icon-file"></i>Fees Summary</a>	
										</li>
									<?php } if(isset($monthwise_fees_summary) && $monthwise_fees_summary ==0){ ?>
										<li>
											<a href="monthwise_fees_summary"><i class="icon-file"></i>Month-wise Fees Summary</a>	
										</li>
									<?php } ?>
									</ul>	
								</div>	
							</li>
						</ul>
						<?php } ?>
						<!-- Fee Details END -->
					</div>
				</li>
			<?php } ?>
			</ul>
		<!-- sidebar menu end -->
		</div>
	</div>
</nav>
<!-- Sidebar wrapper end -->

<script>
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;
	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}

	var dropdown1 = document.getElementsByClassName("dropdown-btn1");
	var i;
	for (i = 0; i < dropdown1.length; i++) {
		dropdown1[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}
</script>
