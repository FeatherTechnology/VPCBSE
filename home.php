<?php 
date_default_timezone_set('Asia/Calcutta');
@session_start();

if(isset($_SESSION['fullname'])){
	$fullname  = $_SESSION['fullname'];
}
if(isset($_SESSION['userid'])){
	$userid  = $_SESSION['userid'];
}
if(isset($_SESSION['school_logo']) && $_SESSION['school_logo'] !=''){
	$school_logo  = "uploads/school_creation/".$_SESSION['school_logo'];
}else{
	$school_logo = "img/user22.png";
}

$msc=0;
if(isset($_GET['msc']))
{
	$msc=$_GET['msc'];
}
$current_page = isset($_GET['page']) ? $_GET['page'] : null; 
define('iEditValid', 1);
include('api/main.php'); // Database Connection File   
?>

<!doctype html>
<html lang="en">

<!-- downlaod customer excel div -->
<div id="backup_customer" style="display:none"></div>
<div id="accountdata" style="display:none"></div>
<!-- end customer excel div -->

<!-- Important -->
<?php  
if( $current_page != 'vendorcreation' and $current_page != 'auction_details' ) { 
	include "include/common/dashboardhead.php";
} 

if($current_page == 'vendorcreation' || $current_page == 'auction_details') { 
	include "include/common/dashboardfinancedatatablehead.php";
} ?>

<body>
	<!-- Page wrapper start -->
	<div class="page-wrapper">
		<?php 
		if($_SESSION['userid']=="")
		{
			echo "<script>location.href='index.php'</script>"; 
		}
		include "include/common/leftbar.php"?>

		<!-- Page content start  -->
		<div class="page-content">

			<!-- Header start -->
			<header class="header">
				<div class="toggle-btns">
					<a id="toggle-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
					<a id="pin-sidebar" href="#">
						<i class="icon-list"></i>
					</a>
				</div>
				<h3 class="sec" style="color:#1b6aaa; text-align: center;">
					<span class="text-wrapper">
					<span class="line line1"></span>
					<span class="letters"><?php echo $_SESSION['school_name']."-"."(".$_SESSION['academic_year'].")";  ?></span>
					</span>
				</h3>
				
				<div class="header-items">
					<!-- Custom search start -->
					<div class="custom-search">
						<input type="text" class="search-query" placeholder="Search here ..." >
						<i class="icon-search1"></i>
					</div>
					<!-- Custom search end -->

					<!-- Header actions start -->
					<ul class="header-actions">
						<li class="dropdown"></li>
						<li class="dropdown">
							<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
								<i class="icon-bell"></i>
								<span
									class="count-label"><?php //echo count($notification); // count($notificationmax); ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
								<div class="dropdown-menu-header">
									Notifications
								</div>
								<div class="customScroll5 quickscard">
									<ul class="header-notifications"></ul>
								</div>
							</div>
						</li>
						<li class="dropdown">
							<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
								aria-haspopup="true">
								<span class="user-name"><?php echo $fullname; ?></span>
								<span class="avatar">
									<img src="<?php echo $school_logo; ?>" alt="avatar">
									<span class="status busy"></span>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
								<div class="header-profile-actions">
									<div class="header-user-profile">
										<div class="header-user">
											<img src="<?php echo $school_logo; ?>" alt="Admin Template">
										</div>
										<h5><?php echo $fullname; ?></h5>
										<p><?php echo $fullname; ?></p>
									</div>
									<!-- <a href="#"><i class="icon-user1"></i> My Profile</a> -->
									<a href="logout.php"><i class="icon-log-out1"></i> Sign Out</a>
								</div>
							</div>
						</li>
					</ul>
					<!-- Header actions end -->
				</div>
			</header>
			<!-- Header end -->

			<!-- Manage users -->
			<?php 
			if($current_page == 'edit_manage_users'){
				include "include/templates/edit_manage_users.php";
			}

			if($current_page == 'manage_users'){
				include "include/templates/manage_users.php";
			}

			//School Creation
			if($current_page == 'school_creation') { 
			include "include/templates/school_creation.php"; 
			} 

			if($current_page == 'edit_school_creation') { 
			include "include/templates/edit_school_creation.php"; 
			} 

			//syllabus Allocation
			if($current_page == 'syllabus_allocation') { 
			include "include/templates/syllabus_allocation.php"; 
			} 

			if($current_page == 'syllabus_report') { 
			include "include/templates/syllabus_report.php";
			} 
			
			//Fees Master Model1	
			if($current_page == 'fees_master_model1') { 
			include "include/templates/fees_master_model1.php"; 
			}
			
			//Fees Master Model2
			if($current_page == 'fees_master_model2') { 
			include "include/templates/fees_master_model2.php"; 
			} 

			//Fees Master Model3
			if($current_page == 'fees_master_model3') { 
			include "include/templates/fees_master_model3.php"; 
			} 
			
			//Fees Master Model4
			if($current_page == 'fees_master_model4') { 
			include "include/templates/fees_master_model4.php"; 
			} 

			//Holiday Creation
			if($current_page == 'holiday_creation') { 
			include "include/templates/holiday_creation.php"; 
			} 
			
			//Backup And Restore
			if($current_page == 'backup_restore') { 
			include "include/templates/backup_restore.php"; 
			} 
			
			//Temp Student Admission
			if($current_page == 'temp_admission_form') { 
			include "include/templates/temp_admission_form.php"; 
			} 

			if($current_page == 'edit_temp_admission_form') { 
			include "include/templates/edit_temp_admission_form.php"; 
			} 
			
			//student Creation
			if($current_page == 'student_creation') { 
			include "include/templates/student_creation.php"; 
			} 

			if($current_page == 'edit_student_creation') { 
			include "include/templates/edit_student_creation.php"; 
			} 
			
			//Delete Student
			if($current_page == 'delete_student') { 
			include "include/templates/delete_student.php"; 
			} 
			
			//Student Rollback 
			if($current_page == 'student_rollback') { 
			include "include/templates/student_rollback.php";
			} 
			
			//Covid Concession 
			if($current_page == 'covid_concession') { 
			include "include/templates/covid_concession.php"; 
			} 
			
			//Fees Concession 
			if($current_page == 'fees_concession') { 
			include "include/templates/fees_concession.php"; 
			} 

			//Fees collection 
			if($current_page == 'fees_collection') { 
			include "include/templates/fees_collection.php"; 
			} 

			//Configuration Setting
			if($current_page == 'configurationsetting') { 
			include "include/templates/configurationsetting.php"; 
			} 

			//Trust creation 
			if($current_page == 'trust_creation') { 
			include "include/templates/trust_creation.php"; 
			} 

			if($current_page == 'edit_trust_creation') { 
			include "include/templates/edit_trust_creation.php"; 
			} 
			
			//Item Creation
			if($current_page == 'item_creation') { 
			include "include/templates/item_creation.php"; 
			} 

			if($current_page == 'edit_item_creation') { 
			include "include/templates/edit_item_creation.php"; 
			} 
			
			//Area Creation
			if($current_page == 'area_creation') { 
			include "include/templates/area_creation.php";; 
			} 

			//staff Creation
			if($current_page == 'staff_creation') { 
			include "include/templates/staff_creation.php"; 
			} 

			if($current_page == 'edit_staff_creation') { 
			include "include/templates/edit_staff_creation.php"; 
			} 

			if($current_page == 'pay_fees') { 
			include "include/templates/pay_fees.php"; 
			} 

			if($current_page == 'transport_fees') { 
			include "include/templates/transport_fees.php"; 
			} 

			if($current_page == 'last_year_fees') { 
			include "include/templates/last_year_fees.php"; 
			} 

			if($current_page == 'dashboard') { 
			include "include/templates/dashboard.php"; 
			} 

			if($current_page == 'transfer_certificate') { 
			include "include/templates/transfer_certificate.php"; 
			} 

			if($current_page == 'edit_transfer_certificate') { 
			include "include/templates/edit_transfer_certificate.php"; 
			} 

			if($current_page == 'conduct_certificate') { 
			include "include/templates/conduct_certificate.php"; 
			} 

			if($current_page == 'edit_conduct_certificate') { 
			include "include/templates/edit_conduct_certificate.php"; 
			} 

			if($current_page == 'study_certificate') { 
			include "include/templates/study_certificate.php"; 
			} 

			if($current_page == 'bonafide_certificate') { 
			include "include/templates/bonafide_certificate.php"; 
			} 

			if($current_page == 'course_completion') { 
			include "include/templates/course_completion.php"; 
			} 

			if($current_page == 'marksheet_certificate') { 
			include "include/templates/marksheet_certificate.php"; 
			} 

			if($current_page == 'transport_fees_master') { 
			include "include/templates/transport_fees_master.php"; 
			} 

			if($current_page == 'last_year_fees_master') { 
			include "include/templates/last_year_fees_master.php"; 
			} 
			
			if($current_page == 'last_year_fees_pay') { 
			include "include/templates/last_year_fees_pay.php"; 
			} 

			if($current_page == 'bonafide_community_certificate') { 
			include "include/templates/bonafide_community_certificate.php"; 
			} 

			if($current_page == 'edit_student_bonafide') { 
			include "include/templates/edit_student_bonafide.php"; 
			} 

			if($current_page == 'purchase_order') { 
			include "include/templates/purchase_order.php"; 
			} 

			if($current_page == 'edit_purchase_order') { 
			include "include/templates/edit_purchase_order.php"; 
			} 

			if($current_page == 'stock_issuance') { 
			include "include/templates/stock_issuance.php"; 
			} 

			if($current_page == 'edit_stock_issuance') { 
			include "include/templates/edit_stock_issuance.php"; 
			} 

			if($current_page == 'stockstatement') { 
			include "include/templates/stockstatement.php"; 
			} 
			
			if($current_page == 'temp_admission_pay_fees') { 
				include "include/templates/temp_admission_pay_fees.php";
			}

			//Reports => student reports
			if($current_page == 'student_caste_report') { 
				include "reports/caste_report/student_caste_report.php";
			}
			//Class wise List.
			if($current_page == 'class_wise_list') { 
				include "reports/class_wise_report/class_wise_list.php";
			}
			//Register of Admission.
			if($current_page == 'register_of_admission') { 
				include "reports/register_of_admission/register_of_admission.php";
			}
			//Student transport List.
			if($current_page == 'student_transport_list') { 
				include "reports/student_transport_report/student_transport_list.php";
			}
			//Student Fees Details.

			if($current_page == 'daily_fees_collection') { 
				include "reports/fees_details_report/daily_fees_collection.php";
			}
			if($current_page == 'day_end_report') { 
				include "reports/fees_details_report/day_end_report.php";
			}

			if($current_page == 'overall_scholarship_fee_details') { 
				include "reports/fees_details_report/overall_scholarship_fee_details.php";
			}
			
			if($current_page == 'pending_fees_details') { 
				include "reports/fees_details_report/pending_fees_details.php";
			}
			
			if($current_page == 'all_type_pending_fees') { 
				include "reports/fees_details_report/all_type_pending_fees.php";
			}

			if($current_page == 'classwise_overall_pending') { 
				include "reports/fees_details_report/classwise_overall_pending.php";
			}

			if($current_page == 'fees_summary') { 
				include "reports/fees_details_report/fees_summary.php";
			}

			if($current_page == 'monthwise_fees_summary') { 
				include "reports/fees_details_report/monthwise_fees_summary.php";
			}

			if($current_page == 'edit_birthday_wishes') { 
				include "include/templates/edit_birthday_wishes.php";
			}

			if($current_page == 'edit_tamil_birthday_wishes') { 
				include "include/templates/edit_tamil_birthday_wishes.php";
			}

			if($current_page == 'edit_general_message') { 
				include "include/templates/edit_general_message.php";
			}

			if($current_page == 'edit_staff_general_message') { 
				include "include/templates/edit_staff_general_message.php";
			}

			if($current_page == 'edit_home_work') { 
				include "include/templates/edit_home_work.php";
			}
			?>


			
		</div>
		<!-- Page content end -->

	</div>
	<!-- Page wrapper end -->

	<!-- Important -->
	<!-- This the important section for download excel file and script adding with our screen -->
	<?php if( $current_page != 'vendorcreation') { ?>
	<?php include "include/common/dashboardfooter.php"?>
	<?php } ?>

	<?php
		if($current_page == 'vendorcreation') { ?>
	<?php include "include/common/dashboardfinancedatatablefooter.php" ?>
	<?php } ?>
	
	
</body>
</html>