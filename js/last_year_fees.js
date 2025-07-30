// Document is ready
$(document).ready(function(){

  $("#cash_payment").show();

        $('input[name="collection_info"]').click(function(){
          var value = $(this).val();
          
          if(value == "Cash Payment"){
            $("#cash_payment").show();
            $("#cheque_payment").hide();
            $("#neft_payment").hide();

          } else if(value == "Cheque"){
            $("#cash_payment").hide();
            $("#cheque_payment").show();
            $("#neft_payment").hide();
          }
          else if(value == "NEFT"){
            $("#cash_payment").hide();
            $("#cheque_payment").hide();
            $("#neft_payment").show();
          }
        });
   
        $(document).on("keyup", '.unit', function(){ 
          var qty = $(this).parents('tr').find('td .qty').val();
          var unit = $(this).parents('tr').find('td .unit').val();
          if(unit == ''){ 
            // var amount = parseInt(qty)*parseInt(unit);
            var process = $(this).parents('tr').find('td .amount').val('0');
            fnAlltotal();
        }else{
          var amount = parseInt(qty)*parseInt(unit);
          var process = $(this).parents('tr').find('td .amount').val(amount);
          fnAlltotal();
        }
        
        });
        
        function fnAlltotal(){
          var total=0
          var event_fee = $("#event_fee").val();
        
          $(".amount").each(function(){
               total += parseFloat($(this).val()||0);
          });
          $(".result").val(total);
          $("#balance").val(total-event_fee);
        }
      
    });

   

	