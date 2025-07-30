<?php $current_page = isset($_GET['page']) ? $_GET['page'] : null; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/moment.js"></script>
<!-- Slimscrolls -->
<script src="vendor/slimscroll/slimscroll.min.js"></script>
<script src="vendor/slimscroll/custom-scrollbar.js"></script>
<!-- Datepickers -->
<script src="vendor/datepicker/js/picker.js"></script>
<script src="vendor/datepicker/js/picker.date.js"></script>
<script src="vendor/datepicker/js/custom-picker.js"></script>
<!-- Daterange -->
<script src="vendor/daterange/daterange.js"></script>
<script src="vendor/daterange/custom-daterange.js"></script>

<!-- Bootstrap Select JS -->
<script src="vendor/bs-select/bs-select.min.js"></script>
<script src="js/main.js"></script>


<?php
if($current_page == 'company') { ?>
<script src="js/companycreation.js"></script>
<?php  }

if($current_page == 'customer') { ?>
<script src="js/customer.js"></script>
<?php } 

if($current_page == 'branch') { ?>
<script src="js/branchcreation.js"></script>
<?php  } 

if($current_page == 'vendorcreation') { ?>
<script src="js/vendorcreation.js"></script>
<?php } 

if($current_page == 'bidder') { ?>
<script src="js/biddercreation.js"></script>
<?php } ?>

<script type="text/javascript">
function stateget() {
    var state = $("#state").val();
    $.ajax({
        url: 'ajaxgettaxdetails.php',
        type: 'post',
        data: {
            "state": state
        },
        dataType: 'json',
        success: function(response) {

            $("#gst").val(response["gst"]);
            $("#pfno").val(response["pfno"]);
            $("#esicno").val(response["esicno"]);

            if (response["state"] == 'Tamil Nadu') {
                $('#gst').attr('readonly', true);
                $('#pfno').attr('readonly', true);
                $('#esicno').attr('readonly', true);
            } else {
                $('#gst').attr('readonly', false);
                $('#pfno').attr('readonly', false);
                $('#esicno').attr('readonly', false);
            }
        }
    });
}

</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="jsd/datatables.min.js"></script>

<!-- Main JS -->