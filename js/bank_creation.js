// Document is ready
$(document).ready(function () {

    //VendorCode Generate
     $.ajax({
       url: "ajaxgetbankcode.php",
       data: {},
       cache: false,
       type: "post",
       dataType: "json",
      success: function (data) {
       $("#bankcode").val(data);
      }
      });
   
   // Validate bankname
       $('#banknamecheck').hide();	
       let banknameError = true;
       $('#bankname').keyup(function () {	
       var bankname=$("#bankname").val();
       $("#ledgername").val(bankname);
       validatebankname();
       });
       
       function validatebankname() {
       let banknameValue = $('#bankname').val();	
       if (banknameValue.length == '') {
       $('#banknamecheck').show();
       banknameError = false;
           return false;
       }
       else {
           $('#banknamecheck').hide();
           banknameError = true;	
       }
       }
   
   // Validate accountno
   $('#accountnocheck').hide();	
   let accountnoError = true;
   $('#accountno').keyup(function () {	
   validateaccountno();
   });
   
   function validateaccountno() {
   let accountnoValue = $('#accountno').val();	
   if (accountnoValue.length == '') {
   $('#accountnocheck').show();
   accountnoError = false;
       return false;
   }
   else {
       $('#accountnocheck').hide();
       accountnoError = true;	
   }
   }
   
   
   
   // Validate Branch Name
   $('#branchnamecheck').hide();	
   let branchnameError = true;
   $('#branchname').keyup(function () {	
   validatebranchname();
   });
   
   function validatebranchname() {
   let branchnameValue = $('#branchname').val();	
   if (branchnameValue.length == '') {
   $('#branchnamecheck').show();
   branchnameError = false;
       return false;
   }
   else {
       $('#branchnamecheck').hide();
       branchnameError = true;	
   }
   }
   
   // Validate Short Form
   $('#shortformcheck').hide();	
   let shortformError = true;
   $('#shortform').keyup(function () {	
   validateshortform();
   });
   
   function validateshortform() {
   let shortformValue = $('#shortform').val();	
   if (shortformValue.length == '') {
   $('#shortformcheck').show();
   shortformError = false;
       return false;
   }
   else {
       $('#shortformcheck').hide();
       shortformError = true;	
   }
   }
   
   
   // Validate purpose
   $('#purposecheck').hide();	
   let purposeError = true;
   $('#purpose').change(function () {	
   validatepurpose();
   });
   
   function validatepurpose() {
   let purposeValue = $('#purpose').val();	
   if (purposeValue.length == '') {
   $('#purposecheck').show();
   purposeError = false;
       return false;
   }
   else {
       $('#purposecheck').hide();
       purposeError = true;	
   }
   }
   
   
   // Validate accounttype
   $('#accounttypecheck').hide();
   $('#bankextrafield').hide();	
   let accounttypeError = true;
   $('#accounttype').change(function () {
   var accounttype = $('#accounttype').val();
   
   if(accounttype != 'normalaccounts'){
   $('#bankextrafield').show();
   $("#subgrouptype").val('13').trigger("chosen:updated").change();
   }
   
   else if(accounttype == 'normalaccounts' || accounttype.length == '')
   {
   $('#bankextrafield').hide();
   $("#subgrouptype").val('17').trigger("chosen:updated").change();
   }
   
   if(accounttype != 'normalaccounts'){
   $('#ubankextrafield').show();
   }
   else if(accounttype == 'normalaccounts' || accounttype.length == '')
   {
   $('#ubankextrafield').hide();
   }
   validateaccounttype();
   });
   
   
   
   function resetextrafield(){
   
   $("#duedate").val('');
   $("#loanamount").val('');
   $("#emi").val('');
   $("#restofinterest").val('');
   }
   
   $('#toperiod').change(function () {	
   var fromperiod = $("#fromperiod").val();
   var toperiod = $("#toperiod").val();
   
   if(new Date(toperiod) < new Date(fromperiod)){
       alert("To Period cannot less than from period");
       $("#toperiod").val('')
       return false;
   }
   });
   
   
   function validateaccounttype() {
   let accounttypeValue = $('#accounttype').val();	
   if (accounttypeValue.length == '') {
   $('#accounttypecheck').show();
   accounttypeError = false;
   return false;
   }
   else {
       $('#accounttypecheck').hide();
       accounttypeError = true;	
   }
   }
   
   // Validate subgrouptype
   $('#undersubgroupcheck').hide();	
   let subgrouptypeError = true;
   $('#subgrouptype').change(function () {	
   var subgroup=$("#subgrouptype").val();
       $.ajax({
              url: "getvendorgroup.php",
              data: {"subgroup":subgroup},
              cache: false,
              type: "post",
              dataType: "json",
              success: function (data) {
              $("#group").val(data["accountsname"]);
              $("#bankgrouprefid").val(data["id"]);
             }
       });
   validatesubgrouptype();
   });
   
   function validatesubgrouptype() {
   let subgrouptypeValue = $('#subgrouptype').val();	
   if (subgrouptypeValue.length == '') {
   $('#undersubgroupcheck').show();
   subgrouptypeError = false;
       return false;
   }
   else {
       $('#undersubgroupcheck').hide();
       subgrouptypeError = true;	
   }
   }
   
   // Validate contactnocheck
   
   $('#contactnocheck').hide();	
   let contactnoError = true;
   $('#contactno').keyup(function () {			
       validatecontactno();
   });
   function validatecontactno() {
       let contactnoValue = $('#contactno').val();
   
       var letters = /^[0-9]+$/;
       if(!(contactnoValue.match(letters)) || contactnoValue.length>10 || contactnoValue.length<10)
       {
       
               $('#contactnocheck').show();
               contactnoError = false;
                   return false;
       }	
       else {
           $('#contactnocheck').hide();
           contactnoError = true;
       
       }
   }
   
   // var email=document.getElementById('email').value;
   // var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+(?:\.[a-zA-Z0-9-]+)*$/;
   
   // Validate email
   $('#emailcheck').hide();	
   let emailError = true;
   $('#email').keyup(function () {			
       validateemail();
   });
   function validateemail() {
   
   var $email = $('form input[name="email'); //change form to id or containment selector
   var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
   if ($email.val() == '' || !re.test($email.val()))
   {
   
       $('#emailcheck').show();
       emailError = false;
       return false;
   }
   else
   {
       $('#emailcheck').hide();
       emailError = true;
   }	
   }
   

   // Validate micrcode
   $('#micrcodecheck').hide();	
   let micrcodeError = true;
   $('#micrcode').keyup(function () {			
       validatemicrcode();
   });
   function validatemicrcode() {
   
   var micrcode = $('#micrcode').val(); 
   
   if(micrcode.length<9)
   {
       $('#micrcodecheck').show();
       micrcodeError = false;
       return false;
   }
   else if(ifsccode.length == ''){
       $('#micrcodecheck').hide();
       micrcodeError = true;
   }
   else
   {
       $('#micrcodecheck').hide();
       micrcodeError = true;
   }	
   }
   
   //Modal
   $("#purposenamecheck").hide();
           $(document).on("click", "#submitpurposebtn", function () {
           var purposename=$("#purposename").val();
       var purposeid=$("#purposeid").val();
           if(purposename!=""){
               $.ajax({
               url: 'bankfiles/ajaxinsertpurpose.php',
               type: 'POST',
               data: {"purposename":purposename,"purposeid":purposeid},
               cache: false,
               success:function(response){
                   var insresult = response.includes("Exists");
                   var updresult = response.includes("Updated");
                   if(insresult){
                   $('#purposeinsertnotok').show();	
                   setTimeout(function() {
                   $('#purposeinsertnotok').fadeOut('fast');
                   }, 2000);
                   }else if(updresult){
                   $('#purposeupdateok').show();	
                   setTimeout(function() {
                   $('#purposeupdateok').fadeOut('fast');
                   }, 2000);
                   $("#starttable").remove();
                   resettable();
                   $("#purposename").val('');
                   $("#purposeid").val('');
                   }
                   else{
                   $('#purposeinsertok').show();	
                   setTimeout(function() {
                   $('#purposeinsertok').fadeOut('fast');
                   }, 2000);
                 $("#starttable").remove();
                   resettable();
                   $("#purposename").val('');
                   $("#purposeid").val('');
                   }
               }
               });
           }
       else{
           $("#purposenamecheck").show();
       }
       });
   
           $("#purposename").keyup(function(){
           var pval = $("#purposename").val();
           if(pval.length == ''){
               $("#purposenamecheck").show();
               return false;
           }else{
               $("#purposenamecheck").hide();
           }
       });
   
    function resettable(){
       $.ajax({
            url: 'bankfiles/getpurposetable.php',
            type: 'POST',
            data: {},
            cache: false,
            success:function(html){
                $("#updatedpurposetable").html(html);
            }
        });
    }
   
       $("body").on("click","#deletepurpose", function(){
           var isok=confirm("Do you want delete purpose?");
           if(isok==false){
               return false;
           }else{
           var purposeid=$(this).attr('value');
           var c_obj = $(this).parents("tr");
           $.ajax({
               url: 'bankfiles/ajaxdeletepurpose.php',
               type: 'POST',
               data: {"purposeid":purposeid},
               cache: false,
               success:function(response){
                   var delresult = response.includes("Rights");
                   if(delresult){
                   $('#purposedeletenotok').show();	
                   setTimeout(function() {
                   $('#purposedeletenotok').fadeOut('fast');
                   }, 2000);
                   }
                   else{
                   c_obj.remove();
                   $('#purposedeleteok').show();	
                   setTimeout(function() {
                   $('#purposedeleteok').fadeOut('fast');
                   }, 2000);
                   }
               }
               });
           }
       });
   
       $("body").on("click","#editpurpose",function(){
           var purposeid=$(this).attr('value');
           $("#purposeid").val(purposeid);
            $.ajax({
               url: 'bankfiles/ajaxeditpurpose.php',
               type: 'POST',
               data: {"purposeid":purposeid},
               cache: false,
               success:function(response){
                   $("#purposename").val(response);
           }
               });
       });
   $(function(){
         $('#starttable').DataTable({
           'iDisplayLength': 5,
           "language": {
             "lengthMenu": "Display _MENU_ Records Per Page",
             "info": "Showing Page _PAGE_ of _PAGES_",
           }
         });
   });
   //Bulk Upload
   // Bulk upload
         $("#insertsuccess").hide();
         $("#notinsertsuccess").hide();
         $("#submitbankbulkbtn").click(function(){
   
           var file_data = $('#file').prop('files')[0];   
           var bankbulk = new FormData();                  
           bankbulk.append('file', file_data);
   
           if(file.files.length == 0 ){
             alert("Please Select Excel File");
             return false;
           }
   
            $.ajax({
             type: 'POST',
             url: 'bankfiles/ajaxbankbulkupload.php',
             data: bankbulk,
             dataType: 'json',
             contentType: false,
             cache: false,
             processData:false,
             beforeSend: function(){
             $('#file').attr("disabled",  true);
                       $('#submitbankbulkbtn').attr("disabled", true);
                       },
             success: function(data){
             if(data == 0){
               $("#notinsertsuccess").hide();
               $("#insertsuccess").show();
               $("#file").val('');
             }else if(data == 1){
               $("#insertsuccess").hide();
               $("#notinsertsuccess").show();
               $("#file").val('');
             }
             },
             complete: function(){
             $('#file').attr("disabled",  false);
             $('#submitbankbulkbtn').attr("disabled", false);         
             }
            });
           });
   
   
   //Submit Button Onclick
       $('#submitbankbtn').click(function () {
           validatebankname();		
           validateaccountno();	
           validatebranchname();
           validateshortform();	
           validatepurpose();			
           validateaccounttype();		
           validatesubgrouptype();	
           validatemicrcode();
       
       
           if (banknameError == true && accountnoError == true  && branchnameError == true 
               && shortformError == true && purposeError == true && accounttypeError == true 
               && subgrouptypeError == true && micrcodeError == true) 
             {	
               return true;
             } 
             else 
             {
               return false;
             }
       });
       
       $('#downloadbank').click(function () {
           window.location.href='uploads/downloadfiles/bankbulksample.xlsx'
       });
   });
       
    function DropDownpurpose(){
        $.ajax({
            url: 'bankfiles/ajaxgetpurposedropdown.php',
            type: 'post',
            data: {},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#purpose").empty();
                $("#purpose").append("<option value=''>"+'Select Purpose'+"</option>");
                for(var i = 0; i<len; i++){
                    var purposeid = response[i]['purposeid'];
                    var purposename = response[i]['purposename'];
                    $("#purpose").append("<option value='"+purposename+"'>"+purposename+"</option>");
                }
            }
        });
    }
   
   
   