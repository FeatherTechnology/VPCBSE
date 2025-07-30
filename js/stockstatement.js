$(document).ready(function (){ 



	$("#enddate").change(function(){ 
		var startdate = new Date($("#startdate").val());
		var enddate = new Date($("#enddate").val());
		if(enddate<startdate){
			alert("End date cannot less than startdate");
			$("#startdate").val('');
		    $("#enddate").val('');
			return false;
		}
	});


	$("#getsohbtn").click(function(){ 
		
			var startdate = $("#startdate").val();
			var enddate   = $("#enddate").val();

				$.ajax({
					url:"ajaxgetmultipledatestock.php",
					method:"post",
					data:{"startdate":startdate, "enddate":enddate},
					success:function(html){
						$("#stockinfotable").empty();
						$("#stockinfotable").html(html);
					}
				});
			});
		});