// Daterange
$(function() {
	var start = moment();
	var end = moment();
	function cb(start, end) {
		$('#adminreportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
		var sd = start.format('MMM D, YYYY'); 
		var ed = end.format('MMM D, YYYY'); 
		$.ajax({
			url:"ajaxgetdashboarddetails.php",
			method:"post",
			data:{"sd":sd, "ed":ed},
			dataType: 'json',
			success:function(data){
				$("#purchasecount").html(data["purchasecount"]);
				$("#posinvoicecount").html(data["posinvoicecount"]);
      

//Mode wise sale
document.querySelector("#modewisesales").innerHTML = "";
var totalmodesale   = data["totalmodesale"];
var totalmodeincome = data["totalmodeincome"];

  var options = {
  series: [{
    name: 'Sales',
    type: 'area',
    data: [0, totalmodesale]
  }, {
    name: 'Income',
    type: 'line',
    data: [0, totalmodeincome]
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: [],
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  
  yaxis: [{
  }, {
    opposite: true,
  }]
};
var chart = new ApexCharts(document.querySelector("#modewisesales"), options);
chart.render();

//Mode wise sale
document.querySelector("#modewisesales1").innerHTML = "";
var totalmodesale   = data["totalmodesale"];
var totalmodeincome = data["totalmodeincome"];

  var options = {
  series: [{
    name: 'Sales',
    type: 'area',
    data: [0, totalmodesale]
  }, {
    name: 'Income',
    type: 'line',
    data: [0, totalmodeincome]
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: [],
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  
  yaxis: [{
  }, {
    opposite: true,
  }]
};
var chart = new ApexCharts(document.querySelector("#modewisesales1"), options);
chart.render();

//Mode wise sale
document.querySelector("#modewisesales2").innerHTML = "";
var totalmodesale   = data["totalmodesale"];
var totalmodeincome = data["totalmodeincome"];

  var options = {
  series: [{
    name: 'Sales',
    type: 'area',
    data: [0, totalmodesale]
  }, {
    name: 'Income',
    type: 'line',
    data: [0, totalmodeincome]
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: [],
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  
  yaxis: [{
  }, {
    opposite: true,
  }]
};
var chart = new ApexCharts(document.querySelector("#modewisesales2"), options);
chart.render();

//Mode wise sale
document.querySelector("#modewisesales3").innerHTML = "";
var totalmodesale   = data["totalmodesale"];
var totalmodeincome = data["totalmodeincome"];

  var options = {
  series: [{
    name: 'Sales',
    type: 'area',
    data: [0, totalmodesale]
  }, {
    name: 'Income',
    type: 'line',
    data: [0, totalmodeincome]
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: [],
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  
  yaxis: [{
  }, {
    opposite: true,
  }]
};
var chart = new ApexCharts(document.querySelector("#modewisesales3"), options);
chart.render();


//Mode wise sale
document.querySelector("#modewisesales4").innerHTML = "";
var totalmodesale   = data["totalmodesale"];
var totalmodeincome = data["totalmodeincome"];

  var options = {
  series: [{
    name: 'Sales',
    type: 'area',
    data: [0, totalmodesale]
  }, {
    name: 'Income',
    type: 'line',
    data: [0, totalmodeincome]
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: [],
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  
  yaxis: [{
  }, {
    opposite: true,
  }]
};
var chart = new ApexCharts(document.querySelector("#modewisesales4"), options);
chart.render();



// Item Wise Sale
document.querySelector("#itemwisesale").innerHTML = "";
var subitems = data["subitems"];
var subquantity = data["subquantity"];
var subexitprice = data["subexitprice"];

var options = {
  series: [{
    name: 'Quantity',
    type: 'area',
    data: subquantity
  }, {
    name: 'Price',
    type: 'line',
    data: subexitprice
  }],
  chart: {
    height: 300,
    type: 'area',
    zoom: {
      enabled: false
    },
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: [0, 4],
    curve: 'smooth',
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: subitems,
  colors: ['#da9d46', '#af772b', '#80c3ee', '#f23f3f'],
  xaxis: {
    type: 'day'
  },
  yaxis: [{
  }, {
    opposite: true,
  }]
};

var chart = new ApexCharts(document.querySelector("#itemwisesale"), options);
chart.render();








var minpartnumber = data["minpartnumber"];
var minitemname   = data["minitemname"];
var minnoofgmpcs  = data["minnoofgmpcs"];

var maxpartnumber = data["maxpartnumber"];
var maxitemname   = data["maxitemname"];
var maxnoofgmpcs  = data["maxnoofgmpcs"];

// document.getElementById("stockreorderlevel").innerHTML = "";
// if(!minpartnumber && !maxpartnumber){
//   nostock = "<div class='activity-log-list'><div class='sts'></div><div class='log green'>No Stock reached minimum level</div><div class='log-time green'></div></div>";
//   document.getElementById("stockreorderlevel").innerHTML = nostock;
// }
// else
// {
// document.getElementById("stockreorderlevel").innerHTML = "";
// var minstock = "";
// for(var i=0; i<=minpartnumber.length-1; i++){
// minstock = minstock + "<div class='activity-log-list'><div class='sts'></div><div class='log red'>"+minpartnumber[i]+" "+minitemname[i]+" Has reached minimum stock level"+"</div><div class='log-time red'>"+minnoofgmpcs[i]+"</div></div>";
// }
// maxstock = "";
// for(var j=0; j<=maxpartnumber.length-1;j++){
// maxstock = maxstock + "<div class='activity-log-list'><div class='sts'></div><div class='log blue'>"+maxpartnumber[j]+" "+maxitemname[j]+" Has reached maximum stock level"+"</div><div class='log-time blue'>"+maxnoofgmpcs[j]+"</div></div>";
// }
// stockreorder = minstock + maxstock;
// document.getElementById("stockreorderlevel").innerHTML = stockreorder;
// }


//Damage Expiry
document.getElementById("damageexpiry").innerHTML = "";
var damaged = data["damage"];
var expiry = data["expiry"];

var options = {
  chart: {
    height: 220,
    type: 'bar',
    toolbar: {
      show: false
    },
  },
  plotOptions: {
    bar: {
      columnWidth: '50%',
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 12,
    colors: ['transparent']
  },
  series: [{
    name: 'Damage',
    data: [damaged]
  }, {
    name: 'Expiry',
    data: [expiry]
  }],
  xaxis: {
    categories: ['Q1'],
  },
  fill: {
    opacity: 1
  },
  grid: {
    row: {
      colors: ['transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  colors: ['#aaaaaa', '#af772b', '#80c3ee', '#f23f3f'],
}
var chart = new ApexCharts(
  document.querySelector("#damageexpiry"),
  options
);
chart.render();


var ordercount = data["pocount"] +" "+"Purchase Order";
var customercount = data["customercount"]+" "+"Customers";
var vendorcount = data["vendorcount"] +" "+ "Vendors";
var itemcount = data["itemcount"] +" "+ "Items";
var employeecount = data["employeecount"] +" "+ "Employees";

$("#ordercount").text(ordercount);
$("#customercount").text(customercount);
$("#vendorcount").text(vendorcount);
$("#itemcount").text(itemcount);
$("#employeecount").text(employeecount);

}
});
}

$('#adminreportrange').daterangepicker({
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

