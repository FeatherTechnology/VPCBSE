// Document is ready
$(document).ready(function () {
   	
    $('#admission_number').change(function () { 
        
        var admission_number = $("#admission_number").val();

                 $.ajax({ 
                   url: 'ajaxGetStudentDetailsConduct.php',
                   type: 'post',
                   data: {"admission_number":admission_number},
                   dataType: 'json',
                   success:function(response){ 
       
                    $("#student_name").val(response['student_name']);
                    $("#phone_number").val(response['telephone_number']);
                                            
                 }
             });
       });
    
});
    

