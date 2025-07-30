$(document).ready(function () {



// billing settings
  $("#Model1").click(function(){
    $("#viewbill1").show();
    $("#viewbill2").hide();
    $("#viewbill3").hide();
    $("#viewbill4").hide();
    $("#feesmodel2field").hide();
	$("#feesmodel3field").hide();
	$("#feesmodel4field").hide();

  });

  $("#Model2").click(function(){
    $("#viewbill2").show();
    $("#viewbill1").hide();
	$("#viewbill3").hide();
    $("#viewbill4").hide();
    $("#feesmodel1field").hide();
    $("#feesmodel3field").hide();
    $("#feesmodel4field").hide();
  });

  $("#Model3").click(function(){
    $("#viewbill2").hide();
    $("#viewbill1").hide();
	$("#viewbill3").show();
    $("#viewbill4").hide();
	$("#feesmodel1field").hide();
	$("#feesmodel2field").hide();
	$("#feesmodel4field").hide();



  });
  $("#Model4").click(function(){
    $("#viewbill2").hide();
    $("#viewbill1").hide();
	$("#viewbill3").hide();
    $("#viewbill4").show();
    $("#feesmodel1field").hide();
	$("#feesmodel2field").hide();
    $("#feesmodel3field").hide();

  });


$("#othersb1").click(function(){
    $("#igsttableb1").show();
    $("#billstableb1").hide();
  });
$("#tamilnadub1").click(function(){
    $("#billstableb1").show();
    $("#igsttableb1").hide();
  });


  $("#viewbill1").click(function(){
	  $("#feesmodel1field").show();
	  $("#feesmodel2field").hide();
	  $("#feesmodel3field").hide();
	  $("#feesmodel4field").hide();
  });

$("#viewbill2").click(function(){
	$("#feesmodel2field").show();
    $("#feesmodel1field").hide();
    $("#feesmodel3field").hide();
    $("#feesmodel4field").hide();
});

$("#viewbill3").click(function(){
  $("#feesmodel3field").show();
  $("#feesmodel1field").hide();
  $("#feesmodel2field").hide();
  $("#feesmodel4field").hide();
});

$("#viewbill4").click(function(){
	$("#feesmodel4field").show();
    $("#feesmodel1field").hide();
    $("#feesmodel2field").hide();
	$("#feesmodel3field").hide();
});

$("#table_view").click(function(){ 
	$("#subject_details").show();
});

$("#standard1").change(function(){
	$("#subject_details2").show();

});

$("#standard6").change(function(){
	$("#subject_details3").show();

});

$("#table_view5").click(function(){ 
	$("#subject_details1").show();
});
// First Fees Model Datatable 

$(function(){
	$('#groupTable').DataTable({
	  'iDisplayLength': 4,
	  "language": {
		"lengthMenu": "Display _MENU_ Records Per Page",
		"info": "Showing Page _PAGE_ of _PAGES_",
	  }
	});
  });
  $(function(){
	$('#extra_curricularTable').DataTable({
	  'iDisplayLength': 5,
	  "language": {
		"lengthMenu": "Display _MENU_ Records Per Page",
		"info": "Showing Page _PAGE_ of _PAGES_",
	  }
	});
  });
  $(function(){
	$('#amenityTable').DataTable({
	  'iDisplayLength': 5,
	  "language": {
		"lengthMenu": "Display _MENU_ Records Per Page",
		"info": "Showing Page _PAGE_ of _PAGES_",
	  }
	});
  });

// Second Fees Moddel Datatable
$(function(){
	$('#TermIITable').DataTable({
	  'iDisplayLength': 4,
	  "language": {
		"lengthMenu": "Display _MENU_ Records Per Page",
		"info": "Showing Page _PAGE_ of _PAGES_",
	  }
	});
  });
  
  $(function(){
	$('#TermIIITable').DataTable({
	  'iDisplayLength': 4,
	  "language": {
		"lengthMenu": "Display _MENU_ Records Per Page",
		"info": "Showing Page _PAGE_ of _PAGES_",
	  }
	});
  });

	$('#submitbillingconfigurationbtn1, #submitbillingconfigurationbtn2, #submitbillingconfigurationbtn3, #submitbillingconfigurationbtn4').click(function () {
		var model = $('input[name="Model"]:checked').val();

		$.ajax({
			url: 'ajaxupdatebillingconfiguration.php',
			type: 'post',
			data: {model: model},
			dataType: 'json',

			success:function(response){
				var insresult = response.includes("Exists");
				if(insresult){
					$('#billingupdatenotok').show();
					setTimeout(function() {
						$('#billingupdatenotok').fadeOut('slow');
					}, 3000);
				} else {
					$('#billingupdateok').show();
					setTimeout(function() {
						$('#billingupdateok').fadeOut('slow');
					}, 2000);
					location.href = "configurationsetting";    
				}
			}
		});
	});

});

 function openConfiguration(evt, ConfigurationName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(ConfigurationName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultopen").click();


function openConfigurationinner(evt, ConfigurationName){
  var i, tabcontentin;
  tabcontentin = document.getElementsByClassName("tabcontentin");
  for (i = 0; i < tabcontentin.length; i++) {
    tabcontentin[i].style.display = "none";
  }
  
  document.getElementById(ConfigurationName).style.display = "block";
  evt.currentTarget.className += " active";
}

