<?php
if(!isset($_COOKIE['studreg'])){
   die(header("location:index.php"));
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>SPI-Student Performance Indicator</title>

    <!-- Bootstrap CDN commands -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
      <!-- Compiled and minified materialize CSS CDN commands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--materialize CSS icons-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--including Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<style>
/*enable for testing purpose
*{
box-shadow:1px 0px 3px orange;
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
@font-face {
 font-family:Ubuntu-MediumItalic;
  src: url("vendor/fonts/Ubuntu/Ubuntu-MediumItalic.ttf");
}
@font-face {
 font-family:Ubuntu-Bold;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Bold.ttf");
}
.sidenav{
    font-family: Ubuntu-Regular;
}
.nav-extended,#sch,.umd{
font-family: Ubuntu-Medium;
}
.mitl{
font-family:Ubuntu-MediumItalic;
}
.itl,#tfs{
font-family:Ubuntu-Italic;
}
.flex-container {
  display: flex;
  justify-content: space-around;
  flex-direction: row;
  flex-flow: row wrap;
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
 text-align:center;
 right: 0%;
 float:right
 top:0%
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
.flrc{float:right;}
#tfs{
 overflow:auto;
 overflow-x:scroll;
 max-height:33px;
 display:flex;
 flex-flow: column wrap;
}
.chip{
margin:1px;
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
  width: 250px;
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
  background-color:#dddddd;
  color: black;
  transform: rotateY(180deg);
}
#tlm{
font-family:Ubuntu-Bold;
font-size:22px;
}
a{text-decoration:none;}
</style>
</head>
<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a style="text-decoration:none;" class="brand-logo"> <i class="material-icons">school</i>SPI</a>
      <a href="#menu" data-target="mobile-sidenav" class="sidenav-trigger" style="text-decoration:none;"><i class="material-icons">menu</i></a>
 
<div id="searchf" class="row hide small"> <input id="sch" type="search" class="form-control input-field " name="Name" pattern="[a-zA-Z0-9\s.]{30}" placeholder="Enter Student Name" required> <i id="close" class="material-icons tiny">close</i>
</div><!--row--> <i id="searchi" style="float:right" class="material-icons small">search</i>
  </div><!--nav-wrap-->
  
        <ul id="nav-mobile" class="right hide-on-med-and-down">
         <li> <a class="log" href="index.php" class="blue-text">Sign Out</a> </li>
      </ul>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li id="t1" class="tab"><a class="active" href="#student" style="text-decoration:none;"><i class="small material-icons">contacts</i></a></li>
      	<li id="t2" class="tab"><a href="#college" style="text-decoration:none;"> <i class="small material-icons">dashboard</i></a></li>
        <li id="t3" class="tab"><a href="#rpt" style="text-decoration:none;"> <i class="small material-icons">event_note</i></a></li>
        <li id="t4" class="tab"><a href="#chrt_tab" style="text-decoration:none;" ><i class="small material-icons">data_usage</i></a></li>
      </ul>
    </div>
     </nav>

  <ul class="sidenav" id="mobile-sidenav">
    <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
<h6 class="white-text" ><?php echo $_COOKIE['studreg']; ?></h6>  
     <a class="log" href="index.php" class="blue-text">Sign Out</a>
 </div>   
<div class="row"> 
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
<span id="dft" class="waves-effect" ><a href="view.php">Set Default</a></span>
  </span> <!-- Grid column -->
  </div> 
  </ul>

  <div id="student" class="col s12">
<br> <ul id="cl" class="collapsible popout">
 
  </ul>
  </div>
  
  <div id="college" class="col s12"> 
<br><ul id="clg" class="collapsible popout">

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
   <div class="card text-center shadow bg-white rounded waves-effect" style="height:25px; width:70px; min-width:52px; border:none;">
        <p class="card-text" dept="" yr="4" >4thyear</p>
    </div> 
 </div>

    <div class="fixed-action-btn"> <a class="btn-floating red"> <i class=" material-icons">today</i> </a> <ul> <li class="dep" value="CSE" ><a class="btn-floating pink"><i class="material-icons">laptop_mac</i></a></li> <li class="dep" value="ECE" ><a class="btn-floating orange darken-1"><i class="material-icons">memory</i></a></li> <li class="dep" value="EEE" ><a class="btn-floating teal "><i class="material-icons">power</i></a></li> <li class="dep" value="MECH" ><a class="btn-floating blue darken-1"><i class="material-icons">settings</i></a></li>
<li class="dep" value="CIVIL" ><a class="btn-floating yellow darken-1"><i class="material-icons">home</i></a></li></ul> </div> 
  </div>
  
<div id="rpt" class="col s12"><br>
<center><div id="report">

</div></center>
</div>
 
 <div id="chrt_tab" class="col s12"><br>
<center><div id="chrt">

</div></center>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- google chart -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
$(document).ready(function(){

//try loads for every click makes seen updates instantly 
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{a:"sview"},
    success: function(data){
      $("#cl").html(data);
    }//suc
    });//aj
      

$("#t2").click(function(){
 $.ajax({
    type: "POST",
    url: 'view_backend.php',
    data:{dept:"all",a:"fview"},
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
    
$(".dep").click(function(){
var dept = $(this).attr("value");
 $.ajax({
    type: "POST",
    url: 'sort.php',
    data:{dept:dept,a:"dview"},
    success: function(data){
      $("#clg").html(data);
 $(".card-text").attr("dept",dept);
 
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
 $("#report").append("<div class="+"flip-card value="+d.AB12+"> <div class="+"flip-card-inner"+"> <div class="+"flip-card-front"+"> <h4>"+d.AB12+"</h4> <h5>"+d.dep+"</h5> </div> <div class="+"flip-card-back col"+"> <div class="+"row"+"> <div class="+"col"+"> <p>1st year (<span>"+d.AB1+"</span>)</p> <p>A : <span>"+d.A1+"</span></p> <p>B : <span>"+d.B1+"</span></p> </div> <div class="+"col"+"> <p>2nd year (<span>"+d.AB2+"</span>)</p> <p>A : <span>"+d.A2+"</span></p> <p>B : <span>"+d.B2+"</span></p> </div> <div class="+"col"+"> <p>3rd year (<span>"+d.AB3+"</span>)</p> <p>A : <span>"+d.A3+"</span></p> <p>B : <span>"+d.B3+"</span></p> </div> </div><!--row--> </div><!--fcb--> </div><!--fci--> </div><!--fc--><br>");
}
$("#t3").click(function(){
  $("#report").text("");
  $.ajax({
    type: "POST",
    url: 'report.php',
    data:{an:"report"},
    success: function(data){
    data=JSON.parse(data); 
 //   $("#report").html(data);
 srbrd(data.dep0);
 srbrd(data.dep1);
 srbrd(data.dep2);
 srbrd(data.dep3);
 srbrd(data.dep4);
	}//suc
  });//aj
}); //clk

$("#t4").click(function(){
 $.ajax({
    type: "POST",
    url: 'report.php',
    data:{an:"report"},
    success: function(data){
      
      data=JSON.parse(data); 
    $("#chrt").html(data);

    }//suc
 });//aj
});//clk

$(".log").click(function(){
 $.ajax({
    type: "POST",
    url: 'cookie.php', 
    data:{cnm:"studreg",cvl:"",cki:"y"},
    });//aj
 $.ajax({
    type: "POST",
    url: 'cookie.php', 
    data:{cnm:"tname",cvl:"",cki:"y"},
   success: function(){
    window.location="index.php";
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
    alert(data);
	}//suc
  });//aj
});//clk

$("#sch").keyup(function(){
var txt=$(this).val().toLowerCase();
$("#clg li").filter(function(){
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

});//doc
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
      <script src="js/bootstrap.min.js"></script>
 
  <!--side nav activation-->
 <script> document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
  });
</script>
 
</body>
</html>
