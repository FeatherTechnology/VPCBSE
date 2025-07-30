// Document is ready
$(document).ready(function () {
    
    // Validate username
    $('#trust_namecheck').hide(); 
    let trust_name_error = true;
    $('#trust_name').keyup(function () {     
    validatetrust_name();
    });
     
    function validatetrust_name() {
        let trust_nameValue = $('#trust_name').val();  
        if (trust_nameValue.length == '') {
        $('#trust_namecheck').show();
        trust_name_error = false;
            return false; 
        }
        else {
            $('#trust_namecheck').hide();
            trust_name_error = true;   
        }
    }

      // Validate contact person
    $('#contact_personcheck').hide(); 
    let contact_person_error = true;
    $('#contact_person').keyup(function () {     
    validatecontact_person();
    });
    
    function validatecontact_person() {
        let contact_personValue = $('#contact_person').val();  
        if (contact_personValue.length == '') {
        $('#contact_personcheck').show();
        contact_person_error = false;
            return false;
        }
        else {
            $('#contact_personcheck').hide();
            contact_person_error = true;   
        }
    }


    // Validate contact number
    $('#contact_numbercheck').hide();  
    let contact_number_error = true;
    $('#contact_number').keyup(function () {
        validatecontact_number();
    })
 function validatecontact_number(){
        var contact_number = $('#contact_number').val(); 
        if(contact_number.length < 10){
            $('#contact_numbercheck').show();
            contact_number_error = false;
            return false;
        }
        else
        {
            $('#contact_numbercheck').hide();
                contact_number_error = true;
        
            }
            }
       

   // Validate Address1
    $('#address1check').hide(); 
    let address1_error = true;
    $('#address1').keyup(function () {     
    validateaddress1();
    });
    
    function validateaddress1() {
        let address1Value = $('#address1').val();  
        if (address1Value.length == '') {
        $('#address1check').show();
        address1_error = false;
            return false;
        }
        else {
            $('#address1check').hide();
            address1_error = true;   
        }
    }
 

    // Validate Place
    $('#placecheck').hide();    
    let place_error = true;
    $('#place').change(function () {    
        validateplace();
    });

    function validateplace() {
        let placeValue = $('#place').val(); 
        if (placeValue.length == '') {
            $('#placecheck').show();
            place_error = false;
            return false;
        }
        else {
            $('#placecheck').hide();
            place_error = true;  
        }
    }


    // Validation Pincode
    $("#pincodecheck").hide();
    var pincode_error = true;
    $("#pincode").keyup(function () {
        validatepincode();
    });
    function validatepincode() {
        let pincodeValue = $("#pincode").val();
        if(pincodeValue == ''){
            $("#pincodecheck").show();
            pincode_error = true;
        }
        else if(pincodeValue.length != 6){
            $("#pincodecheck").show();
            pincode_error = false;
            return false;
        }
        else{
            $("#pincodecheck").hide();
            pincode_error = true;
        }
    }


    $("#website").keyup(function() {
        validatewebsite();
    });
    $("#pan_number").keyup(function() {
        validatepan_number();
    });
    $("#tanno").keyup(function() {
        validatetan_number();
    });
    

    // Create new bidder
     $("#submittrust_creation").click(function(){ 

        validatetrust_name();
        validatecontact_person();
        validatecontact_number();
        validateaddress1();
        // validateaddress2();
        // validateaddress3();
        validateplace();
        validatepincode();
        // validateemail_id();
        validatewebsite();
        validatepan_number();
        validatetan_number();
    

        if(trust_name_error == true && contact_person_error == true && contact_number_error == true &&
         address1_error == true  && place_error == true
         && pincode_error == true ){ 
            return true;
        }else{
            return false;
        }
    });
    // function validatewebsite() {
    //     var websiteName = $("#website").val();
    //     var regex = /^(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/;
    //     // var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    //     if (regex.test(websiteName)) {
           
    //         $('#websitecheck').text('');
    //         $('#submittrust_creation').prop('disabled', false);
    //     } else {
            
    //         $('#websitecheck').text('Enter Valid Website URL');
    //         $('#submittrust_creation').prop('disabled', true);

    //     }
    // }
    function validatewebsite(){
        var websiteName = $("#website").val();
        if (websiteName.length == '0') {
            $('#websitecheck').text('');
            $('#submittrust_creation').prop('disabled', false);
           }
           else{
            var regex = /^(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/;
            if (regex.test(websiteName)) {
               
                $('#websitecheck').text('');
                $('#submittrust_creation').prop('disabled', false);
            } else {
                
                $('#websitecheck').text('Enter Valid Website URL');
                $('#submittrust_creation').prop('disabled', true);
    
            }
           }  
    }

    // function validatepan_number() {
    //     var panNumber  = $("#pan_number").val();

    //     var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    //     if (regex.test(panNumber )) {
           
    //         $('#pan_numbercheck').text('');
    //         $('#submittrust_creation').prop('disabled', false);
    //     } else {
            
    //         $('#pan_numbercheck').text('Enter Pan Number (ABCDE1234F)');
    //         $('#submittrust_creation').prop('disabled', true);

    //     }
    // }
    function validatepan_number(){
        var panNumber = $("#pan_number").val();
        if (panNumber.length == '0') {
            $('#pan_numbercheck').text('');
            $('#submittrust_creation').prop('disabled', false);
           }
           else{
            var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            if (regex.test(panNumber )) {
               
                $('#pan_numbercheck').text('');
                $('#submittrust_creation').prop('disabled', false);
            } else {
                
                $('#pan_numbercheck').text('Enter Pan Number (ABCDE1234F)');
                $('#submittrust_creation').prop('disabled', true);
    
            }
           }  
    }

    function validatetan_number() {
        var tanNumber  = $("#tanno").val();
        if (tanNumber.length == '0') {
                $('#tan_numbercheck').text('');
                $('#submittrust_creation').prop('disabled', false);
           }
        else{
            var regex = /^[A-Z]{4}\d{5}[A-Z]{1}$/;
                if (regex.test(tanNumber)){
                    
                    $('#tan_numbercheck').text('');
                    $('#submittrust_creation').prop('disabled', false);
                }else{
                    
                    $('#tan_numbercheck').text('Enter Valid TAN Number(ABCD12345E)');
                    $('#submittrust_creation').prop('disabled', true);

                }
        }
    }
});

