function mybarchart (xVal,yVal,title) {
	
var xValues = xVal;
var yValues = yVal;
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("barchart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: title
    },
    scales: {
  //    xAxes: [{ticks: {min: 10, max:60}}]
    }
    
  }
});

}

$(".depart").click(function(){
 let depart = $(this).attr("value");

 $.ajax({
    type: "POST",
   
    url: 'demo.php',
    data:{an:"chart",depart: depart},
    success: function(data){
    var data = JSON.parse(data);
    var xVal = data[0];
    var yVal = data[1];
	 mybarchart(xVal,yVal,depart);

    }//suc
 });//aj

 // var xVal = ["Italy", "France", "Spain", "USA", "Argentina"];
//  var yVal = [55, 49, 44, 24, 15];

 // mybarchart(xVal,yVal);
});//clk
