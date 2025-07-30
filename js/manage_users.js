$(document).ready(function(){

    //full name autogenerate
    $('#first_name, #last_name').keyup(function(){
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        $('#full_name').val(first_name +' '+last_name);  
    });

    //username autocomplete
    $('#email_id').keyup(function(){
        $('#user_name').val($(this).val());
    });

    $("#password").on("input", function() {
        const password = this.value;
    
        // Regular expressions to check for presence of at least one number, special character, and uppercase letter
        const hasNumber = /\d/.test(password);
        const hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password);
        const hasUpperCase = /[A-Z]/.test(password);
    
        // Validation checks
        if (hasNumber && hasSpecialChar && hasUpperCase && password.length >= 8){
            $(".password_validation").text('');
            
        } else if(password.length =='') {
            $(".password_validation").text('*Password is required');
            
        } else{
            $(".password_validation").text('*Password must have atleast one number,special character, upper case letter and eight character.');    
        }
    });
    
    $('#confirmpassword').on('input', function () {
        const  password = $('#password').val();
        const confirmPassword = $('#confirmpassword').val();
        
        if(password != confirmPassword){
            $(".confirmpassword_validation").text('*Password do not match.');    
            
        }else{
            $(".confirmpassword_validation").text('');    

        }
    });

    // admin module enable disable
    $("#administration_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".admin-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });
    
    // master module enable disable
    var masterCheckbox = document.getElementById("master_module");
    masterCheckbox.addEventListener("change", function() { 
        $(".master-checkbox").prop("disabled", !masterCheckbox.checked).prop("checked", masterCheckbox.checked);
        $(".master-syllabus-checkbox").prop("disabled", !masterCheckbox.checked).prop("checked", false);
        $(".syllabus-sub-checkbox").prop("disabled", !masterCheckbox.checked).prop("checked", false);
    });
    
    $("#syllabus_sub_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".syllabus-sub-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });

    //staff creation module
    $("#staff_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".staff-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });
    
    // student creation module
    var studentCheckbox = document.getElementById("student_module");
    studentCheckbox.addEventListener("change", function() {
        $(".student-sub-checkbox").prop("disabled", !studentCheckbox.checked).prop("checked", studentCheckbox.checked);
        $(".student-certificate-checkbox").prop("disabled", !studentCheckbox.checked).prop("checked", false);
        $(".certificate-sub-checkbox").prop("disabled", !studentCheckbox.checked).prop("checked", false);
    });
    
    $("#certificate_sub_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".certificate-sub-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });
    
    //collection module
    $("#collection_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".collection-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });

    //SMS module
    $("#sms_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".sms-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });
    
    // Report module enable disable
    var reportCheckbox = document.getElementById("report_module");
    reportCheckbox.addEventListener("change", function() {
        $(".report-sub-checkbox").prop("disabled", !reportCheckbox.checked).prop("checked", false);
        $(".studentreport-sub-checkbox").prop("disabled", !reportCheckbox.checked).prop("checked", false);
        $(".feedetailsreport-sub-checkbox").prop("disabled", !reportCheckbox.checked).prop("checked", false);
    });

    //student Report enable Disable
    $("#student_report_sub_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".studentreport-sub-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });

    //fee details report
    $("#fee_details_sub_module").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".feedetailsreport-sub-checkbox").prop("disabled", !isChecked).prop("checked", isChecked);
    });

});//ready state end

$(function(){
    getSchoolName();

    // Check  the Module Menu are checked or not, If Checked then Remove Disabled for sub-Menu using checkbox function in below.
    var user_id = $('#manage_user_id').val();
    if(user_id > 0){
        var adminmodule = document.getElementById('administration_module');
        var mastermodule = document.getElementById('master_module');
        var syllabusSubModule = document.getElementById('syllabus_sub_module');
        var staffSubModule = document.getElementById('staff_module');
        var studentSubModule = document.getElementById('student_module');
        var certificateSubModule = document.getElementById('certificate_sub_module');
        var collectionModule = document.getElementById('collection_module');
        var smsModule = document.getElementById('sms_module');
        var reportModule = document.getElementById('report_module');
        var studentReportSubModule = document.getElementById('student_report_sub_module');
        var feeDetailssubModule = document.getElementById('fee_details_sub_module');

        if(adminmodule.checked){const checkboxesToEnable = document.querySelectorAll("input.admin-checkbox"); checkbox(checkboxesToEnable,adminmodule);}
        if(mastermodule.checked){const checkboxesToEnable = document.querySelectorAll("input.master-checkbox"); checkbox(checkboxesToEnable,mastermodule);
            const syllabuscheckbox = document.querySelectorAll("input.master-syllabus-checkbox"); checkbox(syllabuscheckbox, mastermodule);}
        if(syllabusSubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.syllabus-sub-checkbox");checkbox(checkboxesToEnable,syllabusSubModule);}
        if(staffSubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.staff-checkbox"); checkbox(checkboxesToEnable,staffSubModule);}
        if(studentSubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.student-sub-checkbox"); checkbox(checkboxesToEnable,studentSubModule);
        const certifiactecheckbox = document.querySelectorAll("input.student-certificate-checkbox"); checkbox(certifiactecheckbox, studentSubModule);}
        if(certificateSubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.certificate-sub-checkbox"); checkbox(checkboxesToEnable,certificateSubModule);}
        if(collectionModule.checked){const checkboxesToEnable = document.querySelectorAll("input.collection-checkbox");checkbox(checkboxesToEnable,collectionModule);}
        if(smsModule.checked){const checkboxesToEnable = document.querySelectorAll("input.sms-checkbox");checkbox(checkboxesToEnable,smsModule);}
        if(reportModule.checked){const checkboxesToEnable = document.querySelectorAll("input.report-sub-checkbox");checkbox(checkboxesToEnable,reportModule);}
        if(studentReportSubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.studentreport-sub-checkbox");checkbox(checkboxesToEnable,studentReportSubModule);}
        if(feeDetailssubModule.checked){const checkboxesToEnable = document.querySelectorAll("input.feedetailsreport-sub-checkbox");checkbox(checkboxesToEnable,feeDetailssubModule);}
    }
});


function checkbox(checkboxesToEnable,module){
    if (module.checked) {
        checkboxesToEnable.forEach(function(checkbox) {
            checkbox.disabled = false;
        });
    } else {
        checkboxesToEnable.forEach(function(checkbox) {
            checkbox.disabled = true;
            checkbox.checked = false;
        });
    }
}

function getSchoolName(){
    $.ajax({
        type: 'POST',
        url: 'ajaxFiles/getSchoolNames.php',
        dataType: 'json',
        success:function(response){
            $('#school_name').empty();
            $('#school_name').append("<option value='0'>Select School Name</option>");
            let schoolid = $('#school_id').val();
            let selected = '';
            
            for(let i=0; i<response.length; i++){
                if(schoolid == response[i]['school_id']){
                    selected = 'selected';
                }
                $('#school_name').append("<option value='"+response[i]['school_id']+"' "+selected+">"+response[i]['school_name']+"</option>");
            }
        }
    })
}