// Document is ready
$(document).ready(function () {
    
    // Validate username
    $('#school_namecheck').hide(); 
    let school_name_error = true;
    $('#school_name').keyup(function () {     
    validateschool_name();
    });
    $('#contact_number').keyup(function () {     
        validatephone_num();
        });
        $('#website').keyup(function () {     
            validatesite();
            });
        function validatephone_num() {
            let school_nameValue = $('#contact_number').val();
            if (school_nameValue.length == '0') {
                 $('#phone_numcheck').text('');
                 $('#phone_numcheck').text('Enter Phone Number');
                 $('#submitschool_creation').prop('disabled', true);
                }
                else {
                   if (school_nameValue.length == '10') {
            
                    $('#phone_numcheck').text('');
                    $('#submitschool_creation').prop('disabled', false);
            }
            else {
                $('#phone_numcheck').text('');
                $('#phone_numcheck').text('Phone Number Should Contain Exactly 10 Digits');
                $('#submitschool_creation').prop('disabled', true);
            
            }
                }  
            
        }

    function validateschool_name() {
        let school_nameValue = $('#school_name').val();  
        if (school_nameValue.length == '') {
        $('#school_namecheck').show();
        school_name_error = false;
            return false; 
        }
        else {
            $('#school_namecheck').hide();
            school_name_error = true;   
        }
    }
    function validatesite(){
        var websiteName = $("#website").val();
        if (websiteName.length == '0') {
            $('#site_check').text('');
            $('#submitschool_creation').prop('disabled', false);
           }
           else{
            var regex = /^(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/;
            if (regex.test(websiteName)) {
               
                $('#site_check').text('');
                $('#submitschool_creation').prop('disabled', false);
            } else {
                
                $('#site_check').text('Enter Valid Website URL');
                $('#submitschool_creation').prop('disabled', true);
    
            }
           }  
      
        
    }
     

    // Create new bidder
     $("#submitschool_creation").click(function(){ 

        validateschool_name();
        
        if(school_name_error == true){ 
            return true;
        }else{
            return false;
        }
    });

     // Create new bidder
     $("#submitschool_creation").click(function(){ 

        validatephone_num();
        validatesite();
        
    });
    

});
$(document).ready(function () {
	// $(".academic_year").select2({
	// 	placeholder: "Select Academic Year",
	// 	allowClear: true,
		
	// 	});	
	// 		$(".school").select2({
	// 	placeholder: "Select School",
	// 	allowClear: true
	// 	});	

    var id = $('#id').val();
if(id != ''){

var stateid = $('#state').val();
$.ajax({
    url: "ajaxgetstatedata.php",
    data: {},
    cache: false,
    type: "post",
    dataType: "json",
    success: function (data) {

    for(var a=0; a<=data.state.length-1; a++){
      if(stateid == data.state[a]['id']){
        // var option = $('<option ></option>').val(data.state[a]['id']).text(data.state[a]['state']);
        // $('#state').append(option);
      }else{
        var option = $('<option ></option>').val(data.state[a]['id']).text(data.state[a]['state']);
        $('#state').append(option);
      }
       
        }
    
    
    }
    });

}else{

$.ajax({
    url: "ajaxgetstatedata.php",
    data: {},
    cache: false,
    type: "post",
    dataType: "json",
    success: function (data) {
    
    $('#state').text('');
    $('#state').val('');
    var option = $('<option></option>').val('').text('Select State');
    $('#state').append(option);
    for(var a=0; a<=data.state.length-1; a++){
        
        var option = $('<option ></option>').val(data.state[a]['id']).text(data.state[a]['state']);
        $('#state').append(option);
        }
    
    
    }
    });

       

}
	
});

function loadFile(event){
    var image = document.getElementById("viewimage");
    image.src = URL.createObjectURL(event.target.files[0]);
};