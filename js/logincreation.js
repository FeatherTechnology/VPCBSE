// Document is ready
$(document).ready(function () {

	$("#lusername").change(function() { 
		var mail = $(this).val();
		$.ajax({
			url: "ajaxFiles/ajaxgetschooldata.php",
			data: { "mail":mail },
			cache: false,
			type: "post",
			dataType: "json",
			success: function (response) {
				$('#school').empty()
				// $('#school').append("<option value=''>Select School</option>");
				for (var a = 0; a < response.length; a++) {
					$('#school').append("<option value='"+response[a]['school_id']+"'>"+response[a]['school_name']+"</option>");
				}
			}
		});
		userNamecheck();
	});

	// Validate password
	$('#lpassword').change(function () {	
		passwordCheck();
	});
	
	$("#lbutton").click(function() {
		userNamecheck();
		passwordCheck();
	});

}); //Document END.

$(function(){
	getSchoolNames(); //get school Name list.
	getAcademicYearList(); //get  Academic Year List.
});

function getSchoolNames(){
	var mail = $('#lusername').val();
	$.ajax({
		url: "ajaxFiles/ajaxgetschooldata.php",
		data: { "mail":mail },
		cache: false,
		type: "post",
		dataType: "json",
		success: function (response) {
			$('#school').empty();
			$('#school').append("<option value=''>Select School</option>");
			for(var a=0; a<response.length; a++){
				$('#school').append("<option value='"+response[a]['school_id']+"'>"+response[a]['school_name']+"</option>");
			}
		}
	});
}

function getAcademicYearList(){ //Getting academic_year list from database.
	$.ajax({
		type: 'POST',
		data: {},
		url: 'ajaxFiles/getAcademicYearList.php',
		dataType: 'json',
		success:function(response){
			$('#academic_year').empty();
			// $('#academic_year').append("<option value=''>Select Academic Year</option>");
			for(var i=0; i <response.length; i++){
				$('#academic_year').append("<option value='" +response[i]['academicyear']+ "'>" +response[i]['academicyear']+ "</option>");
			}
		}
	})
}

function validateusername() {
	let usernameValue = $('#lusername').val();	
	if (usernameValue.length == '') {
		$('#usernamecheck').show();
		usernameError = false;
		return false;
	} else {
		$('#usernamecheck').hide();
		usernameError = true;	
	}
}

function validatepassword() {
	let passwordValue = $('#lpassword').val();	
	if (passwordValue.length == '') {
		$('#passwordcheck').show();
		passwordError = false;
		return false;
	}
	else {
		$('#passwordcheck').hide();
		passwordError = true;	
	}
}

function passwordCheck(){
	var mail = $("#lusername").val();
	var len = mail.length;
	if(len == 0){
		$('#passwordcheck').text('');
		$('#passwordcheck').text('Enter Login Email Address And Enter Password');
	}else{
		var passval = $('#lpassword').val();
		$.ajax({
		url: "ajaxvalidpassdata.php",
		data: {"mail":mail, "val":passval },
		cache: false,
		type: "post",
		dataType: "json",
		success: function (data) {
			if(data == true){
				$('#passwordcheck').hide();
			}else{
				$('#passwordcheck').show();
				$('#passwordcheck').text('');
				$('#passwordcheck').text('Enter Valid Password');
			}
		}
		});
	}
}

function userNamecheck(){
	var mail = $("#lusername").val();
	var len = mail.length;
	if(len == 0){
		$('#usernamecheck').text('');
		$('#usernamecheck').text('Enter Login Email Address');
	}else{
		$.ajax({
			url: "ajaxvaliduserdata.php",
			data: {"mail":mail},
			cache: false,
			type: "post",
			dataType: "json",
			success: function (data) {
				if(data == true){
					$('#usernamecheck').text('');
				}else{
					$('#usernamecheck').show();
					$('#usernamecheck').text('');
					$('#usernamecheck').text('Enter Valid Login Email Address');
				}	
			
			}
			});
	}
}