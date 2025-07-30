$(document).ready(function(){

    $('#general_comment').keyup(function() {
        $('#char_count').val(this.value.length)
    });

    $('#selectAll').click(function(){
        var isChecked = $(this).is(":checked");
        $(".staffchkbx").prop("checked", !isChecked).prop("checked", isChecked);
        getSelectCheckbox();
    });

    $('.staffchkbx').click(function(){
        getSelectCheckbox();
    });

    $('#templatetype').change(function(){
        var temType = $('option:selected', this).attr('data-id');
        $('#general_comment').text(temType);
    });

    $('#submit_staff_general_message').click(function(){
        event.preventDefault();
        let contanctNumber = $('#selectedContanctNo').val();

        if(contanctNumber !=''){
            let  TemplateId = $('#templatetype').val();
            let  generalContent = $('#general_comment').val();
            let  No = $('#selectedContanctNo').val();
            console.log(generalContent);
            console.log(No);
            return;
            $.ajax({
                type: 'POST',
                data: {'content': generalContent, 'studentNo': No, 'TemplateId': TemplateId},
                dataType: 'json',
                url: 'ajaxFiles/ajaxSendSMS.php',
                success: function (response) { 
                    if(response.status == "200"){
                        alert('Message sent Successfully. '+ response.message)
                    }else{
                        alert("Message Failed!");
                    }

                }, error: function (xhr, status, error) {
                    console.log(error);
                }    
            });
        }else{
            alert('Kindly select the person to send message!');
        }
    });

}); //Document END.

$(function(){
    getTemplateDetails();
});

function getSelectCheckbox(){
    // Get all checkboxes with the class .staffchkbx
    var checkboxes = document.querySelectorAll('.staffchkbx');
        
    // Filter and map checked checkboxes to get their values
    var checkedValues = Array.from(checkboxes)
        .filter(function(checkbox) {
            return checkbox.checked;
        })
        .map(function(checkbox) {
            return checkbox.value;
        });

        $.ajax({
            type: 'POST',
            data: {'checkedValue': checkedValues},
            url: 'ajaxFiles/getSelectedStaffNo.php',
            dataType: 'json',
            success: function (response) {  
                let staffNos='';
                for(let i=0; i< response.length; i++){
                    staffNos += response[i]['contactNO'];
                    // Append comma as a separator, except for the last item
                    if(i < response.length - 1) {
                        staffNos += ', ';
                    }
                }
                $('#selectedContanctNo').val(staffNos);
            },
            error: function (xhr, status, error) {
                console.error("Error occurred:", error);
                // Handle error, e.g., show an error message to the user
            }
        })
    // Set the collected values in the input field
    document.getElementById('selectedValues').value = checkedValues.join(', ');
}

function getTemplateDetails(){
    $.ajax({
        type: 'POST',
        data: {},
        url: 'ajaxFiles/getTemplateDetails.php',
        dataType: 'json',
        success: function(response){
            $('#templatetype').empty();
            $('#templatetype').append("<option value=''>--Select Template--</option>");
            
            for(let i=0; i<response.length; i++){
                $('#templatetype').append("<option value='"+response[i]['template_id']+"' data-id='"+response[i]['template'] +"'>"+response[i]['template_name']+"</option>");
            }
        }
    })
}