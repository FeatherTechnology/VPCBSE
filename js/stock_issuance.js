$(document).ready(function () {


  //GRN Code Generate
$.ajax({
  url: "getstockissuancecodeFetch.php",
  data: {},
  cache: false,
  type: "post",
  dataType: "json",
 success: function (data) { 
  $("#si_number").val(data);
 }
 });

$("#mhepurchaseform").keypress(function(e) {
  if (e.which == 13) {
    return false;
  }
});



// //Vendor Check
//   $("#vendorcheck").hide();
//   let vendorError = true;
//   $("#vendor").change(function () {
//     validatevendor();
//   });

//   function validatevendor() {
//     let vendorValue = $("#vendor").val();
//     if ((vendorValue.length == "")) {
//       $("#vendorcheck").show();
//       vendorError = false;
//       return false;
//     } else {
//       $("#vendorcheck").hide();
//       vendorError = true;
//     }
//   }

  $('#po_item_check').hide();	
  let po_check = true;
  function validate_po_item(){
    var currentrow = $("#purchasetable tr").last();
    if (currentrow.find("#item_code").val() == '' || currentrow.find("#qty").val() == '' || currentrow.find("#rate").val() == '') {
        $('#po_item_check').show();
          po_check = false;
          return false;
    }else{
      $('#po_item_check').hide();
      po_check = true;	
      return true;
    }
  }

  $("#submitpurchaseorder").click(function () {

    validatevendor();
    validate_po_item();

    if(vendorError == true && po_check == true){
      return true;
    }
    else
    {
      return false;
    }
  });

  markup = "<option value=''>Select an Item</option>";
  $.ajax({
    url: "purchaseorderfiles/getItem.php",
    cache: false,
    type: "post",
    dataType: "json",
    success: function (data) {
      for (var i = 0; i <= data["item_id"].length - 1; i++) {
        markup += "<option value=" + data["item_id"][i] + ">" + data["description"][i] + " " + "-" + " " + data["item_code"][i] + "</option>";
      }
      $('#purchasetable').find('tbody').html('');
      var appendTxt =
        "<tr><td><select id='item_code' tabindex='11' name='item_code[]' class='item_code chosen-select form-control'>" + markup + " </select><input type='hidden' id='partnumbertext' name='partnumbertext[]'></td>" +
        "<td><input type='text' tabindex='12' class='form-control col-xs-12 col-sm-12 description' readonly id='description' name='description[]' /></td>" +
        "<td><input type='text' tabindex='15' class='form-control rate' name='rate[]' id='rate' placeholder='0.0' /></td>" +
        "<td><span class='del icon-trash-2'></span></td>" +
        "</tr>";
      $('#purchasetable').find('tbody').append(appendTxt);
      markup = "<option value=''>Select an Item</option>";
    }
  });
  
  // Calculate total value (totval) and sum quantities and rates
  $(document).on('keyup', '.rate', function () {
  
    var unitAmountSum = 0;
  
    $('#purchasetable tbody tr').each(function () {
      var row = $(this);
      var rate = parseFloat(row.find('.rate').val()) || 0;
      var totval =rate;
  
      row.find('.totval').val(totval.toFixed(2));
  
      unitAmountSum += rate;
    });
  
    // Set the sums in their respective fields
    $('#unit_amount').val(unitAmountSum.toFixed(2));
  });
  
  // Delete row and recalculate sums
  $(document).on('click', '.del', function () {
    $(this).closest('tr').remove();
    recalculateSums();
  });
  
  // Function to recalculate the sums
  function recalculateSums() {
    var subQuantitySum = 0;
    var unitAmountSum = 0;
    var totalAmountSum = 0;
  
    $('#purchasetable tbody tr').each(function () {
      var row = $(this);
      var qty = parseFloat(row.find('.qty').val()) || 0;
      var rate = parseFloat(row.find('.rate').val()) || 0;
      var totval = qty * rate;
  
      row.find('.totval').val(totval.toFixed(2));
  
      subQuantitySum += qty;
      unitAmountSum += rate;
      totalAmountSum += totval;
    });
  
    // Set the sums in their respective fields
    $('#sub_quantity').val(subQuantitySum.toFixed(2));
    $('#unit_amount').val(unitAmountSum.toFixed(2));
    $('#total_amount').val(totalAmountSum.toFixed(2));
  }
  

  
  

  // UNIT PRICE
  $(document).on("keydown", '.rate', function (e) { 
    if(e.keyCode == 13) {
      e.preventDefault();
    }

    var rate = $(".rate").val();
    if(parseInt(rate)<0){
      alert("Rate cannot be less than 0");
      $(".rate").val('');
      return false;
    }

    var currentrow = $(this).closest('tr');
    var key1 = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

    var markup1 = "<option value=''>Select a Item</option>";

    if (key1 == 13 && $(this).closest("tr").is(":last-child")) {
    e.preventDefault();
    var ok = validate_po_item();
    if(ok == true){
      $.ajax({
        url: "purchaseorderfiles/getItem.php",
        cache: false,
        type: "post",
        dataType: "json",
        success: function (data) {   
          
          for(i=0; i<=data["item_id"].length-1; i++){
              markup1 += "<option value=" + data["item_id"][i] + ">"+data["description"][i]+" "+"-"+" "+data["item_code"][i]+"</option>";
          }

          var appendTxt = "<tr><td><select id='item_code' tabindex='11' name='item_code[]' class='item_code chosen-select form-control'>" + markup1 + " </select><input type='hidden' id='partnumbertext' name='partnumbertext[]'></td>" +
          "<td><input type='text' tabindex='12' class='form-control col-xs-12 col-sm-12 description' readonly id='description' name='description[]' /></td>" +
         "<td><input type='text' tabindex='15' class='form-control rate' name='rate[]' id='rate' placeholder='0.0' /></td>" +
          "<td><span class='del icon-trash-2'></span></td>"+
          "</tr>";

          $('#purchasetable').find('tbody').append(appendTxt);
          markup1="<option value=''>Select a Item</option>";
        }
      });
      }else{
        $('#po_item_check').show();
        po_check = false;
        return false;
      }
    }
  });


  $(document).on('change', '.item_code', function (e) {
    // validate_po_item();
    var currentrow = $(this).closest('tr');
    var partnumberval = $(this).val();
    currentrow.find("#partnumbertext").val(partnumberval);

    var productarray = document.getElementsByName("item_code[]");
    var choosen = 0;
    for(var i=0; i<productarray.length; i++){
      if(partnumberval == productarray[i].value){
      choosen++;
      }
    }

    if(choosen <= 1){
      $.ajax({
        url: "purchaseorderfiles/getPurchaseItemdetails.php",
        data: {"item_id":partnumberval},
        cache: false,
        type: "post",
        dataType: "json",
        success: function (response) { 
          currentrow.find(".description").val(response["description"]);
          currentrow.find(".maxquantity").val(response["maxquantity"]);
          // currentrow.find(".rate").val(response["rate"]);
          
          var rate = response["rate"];
          currentrow.find(".qty").val('1');
          var totval = 1 * parseFloat(rate);
          
          currentrow.find(".totval").val(totval);
          
        }
      });
    }else{
      alert("Already choosen this Item");
      reset(this);
      return false;
    }
  });



  function reset(obj){
    $(obj).parent().parent().find(".item_code").prop("selectedIndex", 0).val();
    $(obj).parent().parent().find(".description").val('');
    $(obj).parent().parent().find(".maxquantity").val('');
    $(obj).parent().parent().find(".rate").val('');
    $(obj).parent().parent().find(".totval").val('');
    $(obj).parent().parent().find(".qty").val('');
    
  }

  $(document).on("keyup", '.rate', function (e) { 
    var  Objunitprice = $(this).val();
    if(parseInt(Objunitprice)<0){
        alert("Rate cannot be less than 0");
        $(this).val('');
        return false;
    }
  });


$(document).on("click", '.del', function () {
  $(this).parent().parent().remove();
  
});

setTimeout(function(){
  $('#purchaseinsertok').fadeOut('slow');
}, 3000);

});

