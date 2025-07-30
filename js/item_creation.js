// Document is ready
$(document).ready(function () {

//GRN Code Generate
$.ajax({
    url: "getItemcodeFetch.php",
    data: {},
    cache: false,
    type: "post",
    dataType: "json",
   success: function (data) { 
    $("#item_code").val(data);
   }
   });

     // Validate item_code
     $('#item_codecheck').hide();	
     let item_codeError = true;
     $('#item_code').keyup(function () {	
     var item_code=$("#item_code").val();
     $("#ledgername").val(item_code);
     validateitem_code();
     });
     
     function validateitem_code() {
     let item_codeValue = $('#item_code').val();	
     if (item_codeValue.length == '') {
     $('#item_codecheck').show();
     item_codeError = false;
         return false;
     }
     else {
         $('#item_codecheck').hide();
         item_codeError = true;	
     }
     }
    
const input1 = document.getElementById("quantity");
const input2 = document.getElementById("rate");
const result = document.getElementById("result");

input1.addEventListener("input", calculate);
input2.addEventListener("input", calculate);

function calculate() {
  const sum = Number(input1.value) * Number(input2.value);
  result.value = sum;
}

   // Modal Box for Department Name
    $("#departmentnameCheck").hide();
    $(document).on("click", "#submitDepartmentBtn", function () {
        var grp_classification_id=$("#grp_classification_id").val();
        var grp_classification_name=$("#grp_classification_name").val();
        if(grp_classification_name!=""){
            $.ajax({
                url: 'GrpClassificationFile/ajaxInsertClassification.php',
                type: 'POST',
                data: {"grp_classification_name":grp_classification_name,"grp_classification_id":grp_classification_id},
                cache: false,
                success:function(response){
                    var insresult = response.includes("Exists");
                    var updresult = response.includes("Updated");
                    if(insresult){
                        $('#departmentInsertNotOk').show(); 
                        setTimeout(function() {
                            $('#departmentInsertNotOk').fadeOut('fast');
                        }, 2000);
                    }else if(updresult){
                        $('#departmentUpdateOk').show();  
                        setTimeout(function() {
                            $('#departmentUpdateOk').fadeOut('fast');
                        }, 2000);
                        $("#departmentTable").remove();
                        resetdepartmentTable();
                        $("#grp_classification_name").val('');
                        $("#grp_classification_id").val('');
                    }
                    else{
                        $('#departmentInsertOk').show();  
                        setTimeout(function() {
                            $('#departmentInsertOk').fadeOut('fast');
                        }, 2000);
                        $("#departmentTable").remove();
                        resetdepartmentTable();
                        $("#grp_classification_name").val('');
                        $("#grp_classification_id").val('');
                    }
                }
            });
        }
        else{
        $("#departmentnameCheck").show();
        }
    });
 

    function resetdepartmentTable(){
    $.ajax({
        url: 'GrpClassificationFile/ajaxResetClassificationTable.php',
        type: 'POST',
        data: {},
        cache: false,
        success:function(html){
            $("#updateddepartmentTable").empty();
            $("#updateddepartmentTable").html(html);
        }
    });
    }
   
     $("#grp_classification_name").keyup(function(){
         var CTval = $("#grp_classification_name").val();
         if(CTval.length == ''){
         $("#departmentnameCheck").show();
         return false;
         }else{
         $("#departmentnameCheck").hide();
         }
     });

     $("body").on("click","#edit_department",function(){  
         var grp_classification_id=$(this).attr('value');  
         $("#grp_classification_id").val(grp_classification_id); 
         $.ajax({
                 url: 'GrpClassificationFile/ajaxEditClassification.php',
                 type: 'POST',
                 data: {"grp_classification_id":grp_classification_id}, 
                 cache: false,
                 success:function(response){
                 $("#grp_classification_name").val(response);
             }
         });
     });
 
   $("body").on("click","#delete_department", function(){
     var isok=confirm("Do you want delete Department?");
     if(isok==false){
       return false;
     }else{
         var grp_classification_id=$(this).attr('value');
         var c_obj = $(this).parents("tr");
         $.ajax({
             url: 'GrpClassificationFile/ajaxDeleteClassification.php',
             type: 'POST',
             data: {"grp_classification_id":grp_classification_id},
             cache: false,
             success:function(response){
                 var delresult = response.includes("Rights");
                 if(delresult){
                 $('#departmentDeleteNotOk').show(); 
                 setTimeout(function() {
                 $('#departmentDeleteNotOk').fadeOut('fast');
                 }, 2000);
                 }
                 else{
                 c_obj.remove();
                 $('#departmentDeleteOk').show();  
                 setTimeout(function() {
                 $('#departmentDeleteOk').fadeOut('fast');
                 }, 2000);
                 }
             }
         });
     }
   });
   
   $(function(){
     $('#departmentTable').DataTable({
       'iDisplayLength': 5,
       "language": {
         "lengthMenu": "Display _MENU_ Records Per Page",
         "info": "Showing Page _PAGE_ of _PAGES_",
       }
     });
   });
    

    // Create new bidder
     $("#submititem_creation").click(function(){ 

        validateitem_code();
       
    

        if(item_codeError == true  ){
            return true;
        }else{
            return false;
        }
    });
    

});

 function DropDownStock(){ 
        $.ajax({
            url: 'GrpClassificationFile/ajaxgetClassificationdropdown.php',
            type: 'post',
            data: {},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#grp_classification").empty();
                $("#grp_classification").append("<option value=''>"+'Select Classification'+"</option>");
                for(var i = 0; i<len; i++){
                    var grp_classification_id = response[i]['grp_classification_id'];
                    var grp_classification_name = response[i]['grp_classification_name'];
                    $("#grp_classification").append("<option value='"+grp_classification_id+"'>"+grp_classification_name+"</option>");
                }
            }
        });
    }