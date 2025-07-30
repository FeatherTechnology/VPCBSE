$(document).ready(function(){
    $("#tamil_birthday_details").on('click', '#smsTostudent', function () {
        let currentRow = $(this).closest('tr');
        let studentName = currentRow.find('td:eq(0)' ).text();
        let studentNo = currentRow.find('td:eq(2)' ).text();
        let  birthDayComment = "அன்புள்ள "+ studentName +", இன்று உங்களுக்கு இனிய நாளாக அமைய வாழ்த்துகள், வித்யா பார்த்தி மேல்நிலைப்பள்ளி சார்பாக இனிய பிறந்தநாள் வாழ்த்துக்கள் . -VPHSS"; 
        let TemplateId	= '1707171445738535179'; //FROM DLT PORTAL. From VPHSS TBW

        $('#birthday_comment').text(birthDayComment);
        $('#birthday_templateid').val(TemplateId);
        $('#student_mobile_no').val(studentNo);

        var length1 = birthDayComment.length;
        $("#char_count").val(length1);

        if (length1 == 0) {
            $("#sms_count").text("Number of SMS : 0");
        }
        else if (length1 > 0 && length1 <= 160) {
            $("#sms_count").text("Number of SMS : 1");
        }
        else if (length1 > 160 && length1 <= 300) {
            $("#sms_count").text("Number of SMS : 2");
        }
        else {
            $("#sms_count").text("Number of SMS : 3 or More");
        }
    });
    
    // $("#tamil_birthday_details").on('click', '#smsTostudent', function () {
    //     let currentRow = $(this).closest('tr');
    //     let studentName = currentRow.find('td:eq(0)' ).text();
    //     let studentNo = currentRow.find('td:eq(2)' ).text();
    //     let  birthDayComment = 'அன்புள்ள '+ studentName +', இனிய பிறந்தநாள் வாழ்த்துக்கள்! மகிழ்ச்சி, சிரிப்பு மற்றும் அற்புதமான நினைவுகள் நிறைந்த நாளாக அமைய வாழ்த்துக்கள். இந்த ஆண்டு உங்களுக்கு வெற்றி, மகிழ்ச்சி மற்றும் உங்கள் இதயம் விரும்பும் அனைத்தையும் தரட்டும். -வித்யா பார்த்தி மேல்நிலைப்பள்ளி திண்டுக்கல்.-VPHSS';
    //     let TemplateId	= '1707171402058885308'; //FROM DLT PORTAL.
    //     $.ajax({
    //         type: 'POST',
    //         data: {'content': birthDayComment, 'studentNo': studentNo, 'TemplateId': TemplateId},
    //         url: 'ajaxFiles/ajaxSendSMS.php',
    //         success: function (response) { 
    //             if(response.status == 200){
    //                 alert('Message sent Successfully. '+ response.message)
    //             }else{
    //                 alert("Message Failed!");
    //             }

    //         }, error: function (xhr, status, error) {
    //             console.log(error);
    //         }    
    //     })
    // });
});

$(function(){
    getBirthdayDetails();
});


function getBirthdayDetails(){
    $.ajax({
        type: 'POST',
        data: {},
        url: 'SMSFiles/getBirthdayDetail.php',
        success:function(response){
            $('#birthday_info').empty();
            $('#birthday_info').html(response);

            $('#tamil_birthday_details').DataTable({
                'order': [0,'desc'],
                'processing': true,
                'iDisplayLength': 10,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                // dom: 'lBfrtip',
                // buttons: [
                //     {
                //         extend: 'csv',
                //         exportOptions: {
                //             columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                //         }
                //     }
                // ],
            });
        }
    })
} 