// Document is ready
$(document).ready(function () {

    $('#from_date').change(function(){
        let fromDate = $(this).val();
        $('#to_date').attr('min', fromDate);
    });

    $('#fees_collection_table_view_btn').click(function(){
        let feesFromDate = $('#from_date').val();
        let feesToDate = $('#to_date').val();

        if(feesFromDate !='' && feesToDate !=''){
            $.ajax({
                type: 'POST',
                data: {"feesFromDate": feesFromDate, "feesToDate": feesToDate},
                url: 'reports/fees_details_report/dailyFeesCollectionList.php',
                success: function(response){
                    $('#listCard').show();
                    $('#showStudentDailyFeesCollectionList').empty();
                    $('#showStudentDailyFeesCollectionList').html(response);
                }
            })
        }else{
            $('#showStudentDailyFeesCollectionList').empty();
            $('#listCard').hide();
            alert("Kindly select All Fields!");
        }
    });

}); //Document END//
