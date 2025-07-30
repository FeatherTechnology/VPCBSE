// Document is ready
$(document).ready(function () {

    $('#singledate, #multipledate').change(function(){
        let dateType = $(this).val();

        if(dateType =='singledate'){
            $('.single').show();
            $('.multiple').hide();
        }else{
            $('.single').hide();
            $('.multiple').show();
        }
    });

    $('#from_date').change(function(){
        let fromDate = $(this).val();
        $('#to_date').attr('min', fromDate);
    });

    $('#day_end_report_view_btn').click(function(){
        let feeType = $('#fee_type').val();
        let dateSelect = $('input[name=dateSelect]:checked').val();
        let singleDate = $('#single_date').val();
        let feesFromDate = $('#from_date').val();
        let feesToDate = $('#to_date').val();

        if(feeType !='0'){
            $.ajax({
                type: 'POST',
                data: {"feeType": feeType, "dateSelect": dateSelect, "singleDate": singleDate, "feesFromDate": feesFromDate, "feesToDate": feesToDate},
                url: 'reports/fees_details_report/dayEndReport.php',
                success: function(response){
                    $('#listCard').show();
                    $('#showDayEndReportList').empty();
                    $('#showDayEndReportList').html(response);
                }
            })
        }else{
            $('#showDayEndReportList').empty();
            $('#listCard').hide();
            alert("Kindly select All Fields!");
        }
    });

}); //Document END//
