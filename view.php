<?php
//tue31-6:30-10:30 ,wed1/2020mrng- 11:00-12:00,1:00-2:00,3:15-4:50,6:00-7:30,8:30-12:00,3fri7:00-10-30,7:30-8:30,9:00-11:00,11:30-12:20,sat,sun,mon,thu7:30-10:00,10fri8:30-11:50
 include 'check.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>SPI-Student Performance Indicator</title>

    <!-- Bootstrap CDN commands -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
      <!-- Compiled and minified materialize CSS CDN commands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--materialize CSS icons-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
/*enable for testing purpose
*{
box-shadow:0px 0px 4px orange;
}*/
@font-face {
 font-family:Ubuntu-Regular;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Regular.ttf");
}
@font-face {
 font-family:Ubuntu-Medium;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Medium.ttf");
}
@font-face {
 font-family:Ubuntu-Italic;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Italic.ttf");
}
.sidenav{
    font-family: Ubuntu-Regular;
}
/*body{
background-color:grey;
}
.collapsible-body{
background-color:grey;
}*/
.flex-container {
  display: flex;
  justify-content: space-around;
  flex-direction: row;
  flex-flow: row wrap;
}
.nav-extended,#sch {
font-family: Ubuntu-Medium;
}
.tp{
position:relative;
width:100%;
height:37px;
/*font-size:17px; 
text-align:left;
top:0%;
left:0%;*/
}
.tpl{
font-weight:bold;
font-family: Ubuntu-Medium;
font-size:15px; 
text-align:left;
top:0%;
left:0%;
/*color:dodgerblue;*/
}
.btm{
position:absolute ;
 font-size:11px; 
 text-align:left;
 bottom: 0%;
 left:0%;
 color:grey;
}
.btc{
position:absolute ;
 font-size:10px; 
 text-align:right;
 right: 0%;
 float:right;
 top:0%;
/* color:orange; */
}
.sd{
 position:absolute ;
 font-size:10px; 
 text-align:right;
 float:right;
 right:0%;
 bottom:0%;
 opacity:0.5;
}
.flr{
 text-align:right;
 float:right;
 bottom: 0%;
 right:0%;
 /*color:white;*/
}
.itl{
font-style:italic;
font-family:Ubuntu-Italic;
/*color:white;*/
}
.ttl{
/*color:dodgerblue;*/
font-family:Ubuntu-Medium;
}
.tls{
/*color:dodgerblue;*/
font-family:Ubuntu-Medium;
}
#dft{
text-align:center;
 display:inline-block;
 padding: 15px;
 border-radius:10px;
}
#sch{
width:70%;
}
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 140px;
  border: 1px solid #f1f1f1; 
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
  border-radius:7px;
  font-family: Ubuntu-Medium;
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
  border-radius:7px;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}
/* Position the front and back side*/
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  border-radius:7px;
}
/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: dodgerblue;
  color: white;
}
/* Style the back side */
.flip-card-back {
  background-color: #dddddd ;
  color: black;
  transform: rotateY(180deg);
}
#ru{
position:relative;
}
#delacc{
position:absolute;
right:0px;
color:grey;
}
#sch{
color:white;
}
/*
@media screen and (min-width: 800px) {
  .nav-link > i {
    visibility: hidden;
  }
}
*/

/* Style the popup container */
.popup-container {
  position: fixed; 
  top: 0; 
  left: 0;
  width: 100%;
  height: 100%; 
  display: flex; 
  justify-content: center; 
  align-items: center; 
  background-color: rgba(0, 0, 0, 0.5); 
}

/* Style the popup itself */
.popup {
  background-color: white; 
  padding: 20px; 
  border-radius: 10px; 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
}

/* Hide the popup by default */
.popup-container {
  display: none; /* Hide the popup */
}

/* Show the popup when needed */
.show-popup {
  display: flex; /* Show the popup */
}

</style>
</head>
<body>
<nav class="nav-extended center">
    <div class="nav-wrapper">
 <a class="brand-logo center" style="text-decoration:none;"> <i class="material-icons">school</i>SPI</a>
      <a href="#menu" data-target="mobile-sidenav" class="sidenav-trigger" style="text-decoration:none;" ><i class="material-icons">menu</i></a>
      
<div id="searchf" class="row hide"> <input id="sch" type="search" class="form-control input-field " name="Name" pattern="[a-zA-Z0-9\s.]{30}" placeholder="Enter Student Name" required> <i id="close" class="material-icons tiny">close</i>
</div><!--row--> <i id="searchi" style="float:right" class="material-icons small">search</i>
  </div><!--nav-wrap-->

   <ul id="nav-mobile" class="right hide-on-med-and-down">
<li class="nav-item active"><a class="nav-link disabled" href="view.php"><i class="material-icons d-lg-none d-xl-none">developer_board</i>View</a></li> 
<li class="nav-item "> <a class="nav-link " href="register.php"><i class="material-icons d-lg-none d-xl-none">person_add</i>Register</a> </li> 
<li class="nav-item"> <a class="nav-link " href="add.php"><i class="material-icons d-lg-none d-xl-none">edit</i>Entry</a> </li>
<li class="nav-item"> <a class="nav-link log blue-text" href="index.php" >Sign Out</a> </li>
<div class="row md-form" role="form"> 

      </ul> 
    
    <div class="" lass="nav-content ">
      <ul class="tabs center tabs-transparent">
        <li id="t1" class="tab"><a class="active" href="#class1" style="text-decoration:none;">Class 1 </a></li>
        <li id="t2" class="tab"><a href="#class2" style="text-decoration:none;">Class 2</a></li>
        <li id="t3" class="tab"><a href="#college" style="text-decoration:none;" >College</a></li>
        <li id="t4" class="tab"><a href="#rpt" style="text-decoration:none;" >Report</a></li>
        <li id="t5" class="tab"><a href="#chrt_tab" style="text-decoration:none;" >Chart</a></li>
      </ul>
    </div>
     </nav>

  <ul class="sidenav" id="mobile-sidenav">
    <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
<h5 class="white-text" >User: <?php echo $_SESSION['spiusername']; ?></h5>  
  <div id="ru" class="row"> <p><a class="log" href="index.php" class="blue-text">Sign Out</a> </p>
<p id="delacc">Delete Account</p>
</div>
 </div>
   <li class="nav-item active"> <a class="nav-link disabled" href="view.php"><i class="material-icons">developer_board</i>View</a> </li> 
<li class="nav-item "> <a class="nav-link " href="register.php"><i class="material-icons">person_add</i>Register</a> </li> 
<li class="nav-item"> <a class="nav-link " href="add.php"><i class="material-icons">edit</i>Entry</a> </li> 
<div class="row md-form" role="form"> 
  <!-- Grid column --> 
  <span class="col-4"> 
   <!-- Material input -->
  ​<select name="sem">
  <option value="" disabled selected hidden>Semester</option>
  <option value="sem1">Sem1</option>
  <option value="sem2">Sem2</option>
  <option value="sem3">Sem3</option>
  <option value="sem4">Sem4</option>
  <option value="sem5">Sem5</option>
  <option value="sem6">Sem6</option>
  <option value="sem7">Sem7</option>
  <option value="sem8">Sem8</option>
</select>
</span> <!-- Grid column -->
 <!-- Grid column -->
  <span class="col-4">
     <!-- Material input -->
  ​<select name="slot">
  <option value="" disabled selected hidden>Slot</option>
 <option value="slot1">Slot1</option>
 <option value="slot2">Slot2</option>
 <option value="slot3">Slot3</option>
 <option value="clr">Clear</option>
</select>
  </span> <!-- Grid column -->
   <span class="col-4">
<span id="dft" class="waves-effect small" ><a>Set Default </a>
<?php if (isset($_COOKIE["slot"])){
echo '<span class="small">'.ucfirst($_COOKIE["slot"]).'</span>'; 
} ?>
</span> </span> <!-- Grid column -->
  </div> 
  </ul>

  <div id="class1" class="col s12">
 <br> <ul id="cl" class="collapsible popout">
 
  </ul>
  <div class="flex-container">
  <div id="ord" name="cc" ><i class="small material-icons">publish</i></div>
  <div id="ccsd"><i class="small material-icons">data_usage</i></div>
  <div id="aly1"><i class="small material-icons">dashboard</i></div>
  <div id="avg1"><i class="small material-icons">equalizer</i></div>
</div>
  </div>
  
  <div id="class2" class="col s12">
<br><ul id="cla" class="collapsible popout">

  </ul>
  <div class="flex-container">
  <div id="ordr" ><i class="small material-icons">publish</i></div>
    <div id="aly2"><i class="small material-icons">dashboard</i></div>
 <div id="avg2"><i class="small material-icons">equalizer</i></div>
</div>
</div>
  
  <div id="college" class="col s12"> 

 <ul id="clg" class="collapsible popout">

    </ul>
     
     <div class="row p-2 flex-container">
  <div class="card text-center shadow  bg-white rounded waves-effect" style="height:25px; width:70px; min-width:52px; border:none;">
        <p class="card-text" dept="" yr="1" >1styear</p>
      </div>
  <div class="card text-center shadow  bg-white rounded waves-effect" style="height:25px; width:70px; min-width:52px; border:none;">
        <p class="card-text" dept="" yr="2">2ndyear</p>
      </div>   
  <div class="card text-center shadow  bg-white rounded waves-effect" style="height:25px; width:70px; min-width:52px; border:none;">
        <p class="card-text" dept="" yr="3">3rdyear</p>
      </div> 
   <div class="card text-center shadow  bg-white rounded waves-effect" style="height:25px; width:70px; min-width:52px; border:none;">
        <p class="card-text" dept="" yr="4" >4thyear</p>
    </div> 
 </div>

    <div class="fixed-action-btn"> <a class="btn-floating red"> <i class=" material-icons">today</i> </a> <ul> <li class="dep" value="CSE" ><a class="btn-floating red"><i class="material-icons">laptop_mac</i></a></li> <li class="dep" value="ECE" ><a class="btn-floating yellow darken-1"><i class="material-icons">memory</i></a></li> <li class="dep" value="EEE" ><a class="btn-floating green"><i class="material-icons">power</i></a></li> <li class="dep" value="MECH" ><a class="btn-floating blue"><i class="material-icons">settings</i></a></li>
<li class="dep" value="CIVIL" ><a class="btn-floating yellow darken-1"><i class="material-icons">home</i></a></li></ul> </div> 
  </div>

<div id="rpt" class="col s12"><br>
<center><div id="report">

</div></center>
</div>

<div id="chrt_tab" class="col s9"><br>
<center><div id="chrt">

 <!--Table and divs that hold the pie charts-->
    <table class="col s7">
      <tr>
        <td><div id="barchart_dep" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_cse" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_ece" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_eee" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_mech" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="piechart_civil" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>

</div></center>
</div>



<!-- The popup container -->
<div class="popup-container">
  <!-- The popup itself -->
  <div class="popup">
    <!-- The alert message -->
    <p id="alert-message">This is a small alert message !</p>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- google chart -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
$(document).ready(function(){
/*
if ($(window).width() > 900) {
  alert();
  $( ".nav-item > i" ).remove();
}
*/

//try loads for every click makes seen updates instantly 
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"cc",ord:"n",a:"view"},
    success: function(data){
      $("#cl").html(data);
    }//suc
    });//aj
      
$("#ccsd").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"ccsd",ord:"n",a:"view"},
    success: function(data){
      $("#cl").html(data);
  $("#ord").attr("name","ccsd");
    }//suc
    });//aj
});//clk
 
function avg(a){
var a=0;
$("#cl li").each(function(){
  if($(this).val()<=680 & $(this).val()>240){
  // alert($(this).val());
 $(this).children().children("i").text("person");
 $(this).children().children("i").css("color","lime");
a++;
//$(this).insertBefore("<hr>");
//end-break
     }
  });//ech 
var avg="avg count- "+a;
showPopUp(avg);
}//fu

$("#ord").click(function(){
var cl= $(this).attr("name");
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:cl,ord:"y",a:"view"},
    success: function(data){
      $("#cl").html(data);
  avg();
    }//suc
    });//aj
});//clk

$("#aly1").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"cc",ord:" ",a:"iview"},
    success: function(data){
      $("#cl").html(data);
    }//suc
    });//aj
});//clk

$("#avg1").click(function(){
var i=0,j=0;
$("#cl li").each(function(){
i+=$(this).val();
j+=1;
 });//ech
var avg=i/j;
var avg= "Average = "+avg;
showPopUp(avg);

});//clk

//try to make load once not for every click

$("#t2").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"c1",ord:" ",a:"view"},
    success: function(data){
      $("#cla").html(data);
    }//suc
    });//aj
});//clk

$("#ordr").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"c1",ord:"y",a:"view"},
    success: function(data){
      $("#cla").html(data);
   avg();
    }//suc
    });//aj
});//clk

$("#aly2").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{class:"c1",ord:"",a:"iview"},
    success: function(data){
      $("#cla").html(data);
    }//suc
    });//aj
});//clk

$("#t3").click(function(){
 $.ajax({
    type: "POST",
    url: 'sort.php',
    data:{year:"",dept:"all",a:"fview"},
    success: function(data){
      $("#clg").html(data);
      
 var i=1;
while(i!==0){
i=1; //mandatory
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh
      
    }//suc
 });//aj
});//clk
   
    
$(".dep").click(function(){
var dept = $(this).attr("value");
 $.ajax({
    type: "POST",
    url: 'sort.php',
    data:{year:"",dept:dept,a:"dview"},
    success: function(data){
      $("#clg").html(data);
 $(".card-text").attr("dept",dept);
 
  //sorting
 var i=1;
while(i!==0){
i=1; //mandatory
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh
  //sorting
  
    }//suc
    });// aj
});//clk

$(".card-text").click(function(){
var year = $(this).attr("yr");
var dept = $(this).attr("dept");

 $.ajax({
    type: "POST",
    url: 'sort.php',
    data:{year:year,dept: dept,a:"dview"},
    success: function(data){
      $("#clg").html(data);
    
 var i=1;
while(i!==0){
i=1;
$("#clg li").each(function(){
if($(this).val()<$(this).next().val()){
$(this).insertAfter($(this).next());
  i++;
  }//if
 });//ech
 if(i==1){break;}
}//wh

    }//suc
    });//aj
});//clk

function srbrd(d){
 $("#report").append("<div class="+"flip-card value="+d.AB03+"> <div class="+"flip-card-inner"+"> <div class="+"flip-card-front"+"> <h4>"+d.AB03+"</h4> <h5>"+d.dep+"</h5> </div> <div class="+"flip-card-back col"+"> <div class="+"row"+"> <div class="+"col"+"> <p>1st year (<span>"+d.AB0+"</span>)</p> <p>A : <span>"+d.A0+"</span></p> <p>B : <span>"+d.B0+"</span></p> </div> <div class="+"col"+"> <p>2nd year (<span>"+d.AB1+"</span>)</p> <p>A : <span>"+d.A1+"</span></p> <p>B : <span>"+d.B1+"</span></p> </div> <div class="+"col"+"> <p>3rd year (<span>"+d.AB2+"</span>)</p> <p>A : <span>"+d.A2+"</span></p> <p>B : <span>"+d.B2+"</span></p> </div> <div class="+"col"+"> <p>4th year (<span>"+d.AB3+"</span>)</p> <p>A : <span>"+d.A3+"</span></p> <p>B : <span>"+d.B3+"</span></p> </div>  </div><!--row--> </div><!--fcb--> </div><!--fci--> </div><!--fc--><br>");
}
$("#t4").click(function(){
  $("#report").text("");
  $.ajax({
    type: "POST",
    url: 'report.php',
    data:{an:"report"},
    success: function(data){
    data=JSON.parse(data); 
   /// $("#report").html(data);
 srbrd(data.dep.cse);
 srbrd(data.dep.ece);
 srbrd(data.dep.eee);
 srbrd(data.dep.mech);
 srbrd(data.dep.civil);

/* var i=1;
while(i!==0){
i=1;
$("#report .flip-card").each(function(){
if($(this).attr("value")<$(this).next().attr("value")){
$(this).insertAfter($(this).next());
  i++;
  }//if
  alert($(this).attr("value"));
 });//ech
 if(i==1){break;}
}//wh */
	}//suc
  });//aj
});//clk

function gl_var(data,type){

 if(type=="set"){
  jsonData=data;
  //console.log(jsonData);
 }
 if(type=="get"){
  return jsonData;
 }
}

$("#t5").click(function(){
 $.ajax({
    type: "POST",
    url: 'report.php',
    data:{an:"report"},

    success: function(data){
      
       js_data=JSON.parse(data);
       
        gl_var(js_data.dep,"set");
      //$("#chrt").html(data.dep1.AB12);

      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        //getting value from out of the function
        jsonData=gl_var("nothing","get");

         //for all department
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');
      
        data.addRows([
          [jsonData.cse.dep, jsonData.cse.AB03],
          [jsonData.ece.dep, jsonData.ece.AB03],
          [jsonData.eee.dep, jsonData.eee.AB03],
          [jsonData.mech.dep, jsonData.mech.AB03],
          [jsonData.civil.dep, jsonData.civil.AB03]
        ]);

        var barchart_options = {title:'Barchart: For All Departments',
                       width:400,
                       height:300,
                       legend: 'none'};
        var barchart = new google.visualization.ColumnChart(document.getElementById('barchart_dep'));
        barchart.draw(data, barchart_options);

       //for cse department
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');

        data.addRows([
          ["year 1", jsonData.cse.AB0],
          ["year 2", jsonData.cse.AB1],
          ["year 3", jsonData.cse.AB2],
          ["year 4", jsonData.cse.AB3],
        ]);

        var piechart_options = {title:'Pie Chart: For CSE Departments',
                       width:400,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_cse'));
        piechart.draw(data, piechart_options);

        //for ece department
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');
        
        data.addRows([
          ["year 1", jsonData.ece.AB0],
          ["year 2", jsonData.ece.AB1],
          ["year 3", jsonData.ece.AB2],
          ["year 4", jsonData.ece.AB3],
        ]);

        var piechart_options = {title:'Pie Chart: For ECE Departments',
                       width:400,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_ece'));
        piechart.draw(data, piechart_options);

        //for eee department
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');
        
        data.addRows([
          ["year 1", jsonData.eee.AB0],
          ["year 2", jsonData.eee.AB1],
          ["year 3", jsonData.eee.AB2],
          ["year 4", jsonData.eee.AB3],
        ]);

        var piechart_options = {title:'Pie Chart: For EEE Departments',
                       width:400,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_eee'));
        piechart.draw(data, piechart_options);

        //for mech department
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');
        
        data.addRows([
          ["year 1", jsonData.mech.AB0],
          ["year 2", jsonData.mech.AB1],
          ["year 3", jsonData.mech.AB2],
          ["year 4", jsonData.mech.AB3],
        ]);

        var piechart_options = {title:'Pie Chart: For MECH Departments',
                       width:400,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_mech'));
        piechart.draw(data, piechart_options);

        //for civil department
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Class');
        data.addColumn('number', 'Score');
        
        data.addRows([
          ["year 1", jsonData.civil.AB0],
          ["year 2", jsonData.civil.AB1],
          ["year 3", jsonData.civil.AB2],
          ["year 4", jsonData.civil.AB3],
        ]);

        var piechart_options = {title:'Pie Chart: For CIVIL Departments',
                       width:400,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_civil'));
        piechart.draw(data, piechart_options);

      }
   
    }//suc
 });//aj
});//clk


$(".log").click(function(){
 $.ajax({
    type: "POST",
    url: 'exit.php',
    data:{exit:"logout"},
    success: function(data){
    }//suc
    });//aj
 });//clk
 
$("#dft").click(function(){
 var slt=$('[name=sem]').val().concat($('[name=slot]').val());
 $.ajax({
    type: "POST",
    url: 'cookie.php',
    data:{cnm:"slot",cvl:slt,cki:"y"},
    success: function(data){
    showPopUp(data);
    window.location="view.php";
	}//suc
  });//aj
});//clk

//filter-type searching
$("#sch").keyup(function(){
var txt=$(this).val().toLowerCase();
$("#clg li").filter(function(){
 $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 }); 
 $("#cla li").filter(function(){
  $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 });
 $("#cl li").filter(function(){
  $(this).toggle($(this).text().toLowerCase().indexOf(txt)>-1);
 });
});//kyp

$("#searchi").click(function(){
 $(".brand-logo").hide();
 $("#searchf").removeClass("hide");
  $("#searchf").show();
  $(this).hide();
});//clk

$("#close").click(function(){
 $("#searchi").show();
 $("#searchf").hide();
 $(".brand-logo").show();
});//clk

$("#delacc").click(function(e){
 $.ajax({
    type: "POST",
    url: 'exit.php',
    data:{exit:"delaccount"},
    success: function(data){
    window.location="index.php";
    }//suc 
    });//aj
});//cl

function showPopUp(message){
  //add show class
document.querySelector('.popup-container').classList.add('show-popup');
//write message
$("#alert-message").text(message);
//close
document.querySelector('.popup').addEventListener('click', function() {
 document.querySelector('.popup-container').classList.remove('show-popup');
});

} //showPopUp

});//doc
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
      <!-- <script src="js/bootstrap.min.js"></script> -->
 
  <!--side nav activation-->
 <script> document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
  });

/* var sll=$('[name=slot]').val();
 var stt=$('[name=sem]').val();
 let slt=stt.concat(sll);
*/
</script>
 
</body>
</html>
