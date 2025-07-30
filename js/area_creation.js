$(document).ready(function() {
  $('#no_of_terms').change(function() {
    var selectedNumber = $(this).val();
    var tranamount = $('#transport_amount').val();
    console.log("selectedNumber",tranamount);
    var divamountbymonth = Math.round(parseInt(tranamount) / parseInt(selectedNumber));
    var inputField = '';
    for (var i = 1; i <= selectedNumber; i++) {
      inputField += '<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"><input class="form-control" placeholder="Particulars" type="text" name="item_details[]" required></div></div> <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"><input class="form-control" placeholder="Amount" type="number" name="due_amount[]" value="'+divamountbymonth+'" required ></div></div> <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"><div class="form-group"><input class="form-control" type="date" name="due_date[]" required></div></div> <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"><div class="form-group"></div></div><br><br>';
    }
    $('#input-container').html(inputField);
  });
  
});                                     
