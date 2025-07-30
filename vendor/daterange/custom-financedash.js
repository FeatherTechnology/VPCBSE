// Daterange
$(function() {
	var start = moment();
	var end = moment();
	function cb(start, end) {
		$('#financereportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
    var sd = start.format('MMM D, YYYY'); 
    var ed = end.format('MMM D, YYYY'); 

    $.ajax({
      url:"ajaxcashdashboard.php",
      method:"post",
      data:{"sd":sd, "ed":ed},
      dataType: 'json',
      success:function(data){
        $("#newcustomers").html(data["newcustomers"]);
        $("#purchasecount").html(data["purchasecount"]);
        $("#posinvoicecount").html(data["posinvoicecount"]);
        $("#cashsale").html(data["cashsale"]);
        $("#creditsale").html(data["creditsale"]);
        $("#remainingpayment").html(data["remainingpayment"]);

        //Monthly Income Chart
document.querySelector("#income").innerHTML = "";

        var january    =    data["january"];
        var february   =    data["february"];
        var march      =    data["march"];
        var aipril     =    data["aipril"];
        var may        =    data["may"];
        var june       =    data["june"];
        var july       =    data["july"];
        var august     =    data["august"];
        var september  =    data["september"];
        var october    =    data["october"];
        var november   =    data["november"];
        var december   =    data["december"];
  document.querySelector("#income").innerHTML = "";
  var options = {
  chart: {
    height: 300,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth',
    width: 3
  },
  series: [{
    name: 'Overall Income',
    data: [january, february, march, aipril, may, june, july, august, september, october, november, december]
  }],
  grid: {
    row: {
      colors: ['transparent'], // takes an array which will be repeated on columns
      opacity: 0.2
    },
  },
  xaxis: {
    type: 'month',
    categories: ["January", "February", "March", "Aipril", "May", "June", "July", "August", "September", "October", "November", "December"],                
  },
  colors: ['#af772b', '#fdcb78', '#af7729', '#434950', '#63686f', '#868a90','#af772b', '#fdcb78', '#af7729', '#434950', '#63686f', '#868a90'],
  markers: {
    size: 5,
    colors: ["#af772b"],
    strokeColor: "#fff",
    strokeWidth: 2,
    hover: {
      size: 7,
    }
  },
}

var chart = new ApexCharts(document.querySelector("#income"),options);
chart.render();

}
    });
  }
	$('#financereportrange').daterangepicker({
		opens: 'left',
		startDate: start,
		endDate: end,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		}
	}, cb);
	cb(start, end);
});