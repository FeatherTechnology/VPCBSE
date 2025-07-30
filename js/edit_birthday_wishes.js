$(document).ready(function(){
    $("#birthday_details").on('click', '#smsTostudent', function () {
        let currentRow = $(this).closest('tr');
        let studentName = currentRow.find('td:eq(0)' ).text();
        let studentNo = currentRow.find('td:eq(2)' ).text();
        let  birthDayComment = "Dear student "+ studentName +", today is a special day for you. wish you a 'Happy Birthday' by Vidhya Parthi Higher Secondary School, Dindigul.-VPHSS";
        let TemplateId	= '1707171446357407764'; //FROM DLT PORTAL. VPHSS BW
        
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

    // $("#birthday_details").on('click', '#smsTostudent', function () {
    //     let currentRow = $(this).closest('tr');
    //     let studentName = currentRow.find('td:eq(0)' ).text();
    //     let studentNo = currentRow.find('td:eq(2)' ).text();
    //     let  birthDayComment = "Dear student "+ studentName +", today is a special day for you. wish you a 'Happy Birthday' by Vidhya Parthi Higher Secondary School, Dindigul.-VPHSS";
    //     let TemplateId	= '1707171446357407764'; //FROM DLT PORTAL. VPHSS BW
    //     $.ajax({
    //         type: 'POST',
    //         data: {'content': birthDayComment, 'studentNo': studentNo, 'TemplateId': TemplateId},
    //         url: 'ajaxFiles/ajaxSendSMS.php',
    //         // dataType: 'json',
    //         success: function (response) { 

    //             if(response.status == 200){
    //                 alert('Message sent Successfully. '+ response.message);
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

            $('#birthday_details').DataTable({
                'order': [0, 'desc'],
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