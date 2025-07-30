$(document).ready(function(){
    $('#BC').change(function () {
        if (this.checked) {
            $('.hidebc').show();
        } else {
            $('.hidebc').hide();
        }
    });
    $('#MBC').change(function () {
        if (this.checked) {
            $('.hidembc').show();
        } else {
            $('.hidembc').hide();
        }
    });
    $('#SC').change(function () {
        if (this.checked) {
            $('.hidesc').show();
        } else {
            $('.hidesc').hide();
        }
    });
    $('#ST').change(function () {
        if (this.checked) {
            $('.hidest').show();
        } else {
            $('.hidest').hide();
        }
    });
    $('#OBC').change(function () {
        if (this.checked) {
            $('.hideobc').show();
        } else {
            $('.hideobc').hide();
        }
    });
    $('#DNC').change(function () {
        if (this.checked) {
            $('.hidednc').show();
        } else {
            $('.hidednc').hide();
        }
    });
    $('#BCM').change(function () {
        if (this.checked) {
            $('.hidebcm').show();
        } else {
            $('.hidebcm').hide();
        }
    });

}); //Document END////

$(function(){
    getStudentCasteDetails();

    setTimeout(() => {
        $('#getStdCasteReport').DataTable({
            order: [[0, "asc"]],
            columnDefs: [
                { type: 'natural', targets: 0 }
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            sort: false
        });
    }, 1000);

});


function getStudentCasteDetails(){
    $.ajax({
        type: 'POST',
        data: {},
        url: 'reports/caste_report/getStudentCasteDetails.php',
        success: function(response){
            $('#studentCasteDetailsTBODY').empty();
            $('#studentCasteDetailsTBODY').html(response);
            hideElements();
        }
    })
};

function hideElements(){
    $('.hidebc, .hidembc, .hidesc, .hidest, .hideobc, .hidednc, .hidebcm').hide();
}
