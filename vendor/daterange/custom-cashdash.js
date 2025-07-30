// Daterange
$(function() {
	var start = moment();
	var end = moment();
	function cb(start, end) {
		$('#cashreportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
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
    data: [5000, 8000, 7000, 8000, 5000, 3000, 4000]
  }],
  grid: {
    row: {
      colors: ['transparent'], // takes an array which will be repeated on columns
      opacity: 0.2
    },
  },
  xaxis: {
    type: 'day',
    categories: [],                
  },
  colors: ['#af772b', '#fdcb78', '#af7729', '#434950', '#63686f', '#868a90'],
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

var chart = new ApexCharts(
  document.querySelector("#daybook"),
  options
);

chart.render();
}
    });
  }
	$('#cashreportrange').daterangepicker({
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