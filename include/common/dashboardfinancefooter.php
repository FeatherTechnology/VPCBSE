<?php $current_page = isset($_GET['page']) ? $_GET['page'] : null; ?>

	<!-- Datepickers -->
	<script src="vendor/datepicker/js/picker.js"></script>
		<script src="vendor/datepicker/js/picker.date.js"></script>
		<script src="vendor/datepicker/js/custom-picker.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Bootstrap Select JS -->
		<script src="vendor/bs-select/bs-select.min.js"></script>


		<!-- Main JS -->
		<script src="js/main.js"></script>

<script type="text/javascript">
    function GetDRCRDropDown() {
        var DRCRDropDown33=$("#DRCRDropDown").val();
 
        if (DRCRDropDown33 == 'DR')
        {          
			$('#credit').attr('readonly', true); 
            $('#debit').attr('readonly', false); 
        }
        if (DRCRDropDown33 == 'CR') 
        {      
            $('#credit').attr('readonly', false); 
            $('#debit').attr('readonly', true); 
        }  
    }
	function onaccounts() {

		$(".billtype").show();
		$(".againstbill").hide();
		$("#cashincomecontent").hide();
		
	}
	function againstbillreference() {

		$(".billtype").hide();
		$(".againstbill").show();
		$("#cashincomecontent").show();
		$.ajax({
		url: 'ajaxagainstcash.php',
		type: 'post',
		data: {},   
		success: function(html){       
			$("#cashincomecontent").html(html);
		}
	});
	}
	</script>
 
 <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

