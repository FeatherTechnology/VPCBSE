$(document).ready(function(){
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawColColors);

  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

}); //Document END..//

$(function(){
  getConcessionApprovalTable();
});

function drawColColors() {

  $.ajax({
    type: 'POST',
    url: 'ajaxFiles/getDetailsForDashboard.php',
    dataType: 'json',
    success:function(response){
      let boyscnt = parseInt(response.boysCount);
      let girlscnt = parseInt(response.girlsCount);
      let teachingstaffCount = parseInt(response.teachingstaffCount);
      let nonteachingstaffCount = parseInt(response.nonteachingstaffCount) + parseInt(response.driverCount);

      //student Bar chart.
      var data = new google.visualization.DataTable();
      var data = google.visualization.arrayToDataTable([
        ['Element', 'Total', { role: 'style' }, { role: 'annotation' } ],
        ['Boys',boyscnt , '#33a199', boyscnt ],
        ['Girls', girlscnt, '#F8B9D4', girlscnt ]
      ]);
  
      var studentOptions = {
        title: 'Student Details',
        colors: ['#9575cd', '#33ac71'],
        legend: {position:'none'}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('studentchart'));
      chart.draw(data, studentOptions);

      //staff Bar chart.
      var data = google.visualization.arrayToDataTable([
        ['Element', 'Total', { role: 'style' }, { role: 'annotation' } ],
        ['Teaching Staff', teachingstaffCount, '#3366CC', teachingstaffCount ],
        ['Non-teaching staff', nonteachingstaffCount, 'color: #DC3912', nonteachingstaffCount ]
      ]);
  
      var staffOptions = {
        title: 'Staff Details',
        colors: ['#9575cd', '#33ac71'],
        legend: {position:'none'}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('staffchart'));
      chart.draw(data, staffOptions);

    }
  });
}


function drawChart() {
  $.ajax({
    type: 'POST',
    url: 'ajaxFiles/getFeeDetailsForDashboard.php',
    dataType: 'json',
    success:function(response){
      let totalFees = parseInt(response.totalFee) || 0;
      let paidFees = parseInt(response.paidFee) || 0;
      let todayFeecollected = parseInt(response.todayscollection) || 0;
      let pendingFees = totalFees - paidFees;

      // Replace zero values with a small non-zero value
      // totalFees = totalFees === 0 ? 0.1 : totalFees;
      // pendingFees = pendingFees === 0 ? 0.1 : pendingFees;
      // paidFees = paidFees === 0 ? 0.1 : paidFees;
      // todayFeecollected = todayFeecollected === 0 ? 0.1 : todayFeecollected;

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Count'],
          ['Total Fee', totalFees],
          ['Pending Fee', pendingFees],
          ['Total Fee Collected', paidFees],
          ['Today Fee Collected', todayFeecollected]
        ]);

        
        var studentFeeOptions = {
          title: 'Overall Fee Details',
          is3D: true, //3d chart
          // pieHole: 0.4, //donut chart
          pieSliceText: 'value', //to show value instead of percentage
          sliceVisibilityThreshold: 0, //to show task if its count is zero because if value is 0 then  it will not be shown in the donut chart
          colors: ['#619e71', '#FF69B4','#0091D5', '#D32D41'],
          tooltip: {text: 'value'} // show only the value in the tooltip
        };
        
        var chart = new google.visualization.PieChart(document.getElementById('studentFeeschart'));
        chart.draw(data, studentFeeOptions);

    }//Success.
  });
}


function getConcessionApprovalTable(){
  $.ajax({
    type: 'POST',
    url: 'ajaxFiles/getConcessionApprovalDetails.php',
    success: function(response){
      $('#studentConcessionApprovalTable').empty();
      $('#studentConcessionApprovalTable').html(response);
    }
  })
}