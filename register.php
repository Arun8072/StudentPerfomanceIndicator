<?php
include 'check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>SPI-Student Performance Indicator</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
<style type="text/CSS">
/*enable for testing purpose
*{
box-shadow:1px 0px 3px orange;
}*/
@font-face {
 font-family:Ubuntu-Regular;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Regular.ttf");
}
*,input{
    font-family: Ubuntu-Regular;
}
#li{
 width: 100%;
}
body {
 background: url("images/bg_add.jpg") no-repeat center fixed;
 background-color: #ffffff;
  background-size: cover; /* Resize the background image to cover the entire container */
}

.jumbotron{
opacity: 1.0;
 /* filter:  alpha(opacity=60);*/
  background-color: #ffffff;
 border-radius:7px;
  }
#submit{
border-radius:5px;
}
#ru{
position:relative;
}
#delacc{
position:absolute;
right:0px;
color:grey;
}

</style>
 </head>
<body>
 <div class="container">
  <br>
  <div class="jumbotron">
  <strong><center><h4 id="hd" >Student Details</h4></center></strong>
<form id="fg" class="form-horizontal" role="form" method="POST"  >
  <div class="form-group">
<div class="row"> 
  <span class="col-1 mt-3"><i class="material-icons">person_outline</i></span>
<span class="col-10"><input id="nm" type="text" class="form-control form-control cnt" name="Name" pattern="[a-zA-Z\s.]{5,30}" title="enter only text" placeholder="Enter Student Name" data-length="30" required></span>
</div>
<div class="row"> 
<span class="col-1 mt-3"><i class="material-icons">dialpad</i></span>
<span class="col-10"><input type="number" id="rg" class="form-control form-control cnt" name="Reg" pattern="[0-9]{12}" placeholder="Enter Register Number" data-length="12" required></span>
</div><!--row-->
<h6>Batch</h6>
<!-- Grid row -->
<div class="row"> 
  <!-- Grid column --> 
<div class="col-4"> 
   <div class="md-form mt-0"> 
  <input type="number" class="form-control cnt" name="bts" placeholder="First year" data-length="4">
    </div> 
</div> <!-- Grid column -->
 <!-- Grid column -->
  <div class="col-4">
   <!-- Material input -->
     <div class="md-form mt-0"> 
    <input type="number" class="form-control cnt" name="btl" placeholder="Last year" data-length="4"> 
     </div> 
  </div> <!-- Grid column --> 
<div class="col-4">
    <select name="sec">
<option value="" disabled selected hidden>Select Section</option>
   <optgroup label="CSE">
<option  value="CSE-A">CSE-A</option>
<option  value="CSE-B">CSE-B</option>
      </optgroup>
      <optgroup label="ECE">
<option value="ECE-A">ECE-A</option>
<option value="ECE-B">ECE-B</option>
      </optgroup>
    <optgroup label="EEE">
<option value="EEE-A">EEE-A</option>
<option value="EEE-B">EEE-B</option>
      </optgroup>
      <optgroup label="MECH">
<option value="MECH-A">MECH-A</option>
<option value="MECH-B">MECH-B</option>
   </optgroup>
      <optgroup label="CIVIL">
<option value="CIVIL-A">CIVIL-A</option>
<option value="CIVIL-B">CIVIL-B</option>
    </optgroup>
 <optgroup label="MBA">
<option value="MBA-A">MBA-A</option>
<option value="MBA-B">MBA-B</option>
      </optgroup>
    </select>
 </div> <!-- Grid column -->
 </div> <!-- Grid row -->
  <h6>Indicator and Score</h6>
<!-- Grid row -->
<div class="row"> 
  <!-- Grid column --> 
  <span class="col-6"> 
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
  <span class="col-6">
     <!-- Material input -->
  ​<select name="slot">
  <option value="" disabled selected hidden>Slot</option>
 <option value="slot1">Slot1</option>
 <option value="slot2">Slot2</option>
 <option value="slot3">Slot3</option>
</select>
  </span> <!-- Grid column --> 
<div class="col-6 md-form mt-0"> 
  <!-- Material input -->
​<select name="mode">
  <option value="" disabled selected hidden>Mode</option>
  <option value="Internal">Internal</option>
  <option value="External">External</option>
  <option value="Salem">Salem</option>
  <option value="Outer">Outer</option>
  <option value="Online">Online</option>
  <option value="Offline">Offline</option>
  <option value="Tamizh">Tamizh</option>
  <option value="English">English</option>
  <option value="Life Skill">Life Skill</option>
</select>
</div> <!-- Grid column -->
   <div class="col-6 md-form mt-0"> 
  <!-- Material input -->
​<select name="level">
  <option value="" disabled selected hidden>Level</option>
  <option value="Participated" >Participated</option>
 <option value="Winner">Winner</option>
  <option value="One_day">One_day</option>
  <option value="More_than_1d" >More_than_1day</option>
  <option value="Applied">Applied</option>
  <option value="Published" >Published</option>
  <option value="Level1">Level1</option> 
  <option value="Level2">Level2</option>
  <option value="Trainer">Trainer</option>
  <option value="Less_than_4d" >Less_than_4d</option>
  <option value="Less_than_8d" >Less_than_8d</option>
  <option value="More_than_7d" >More_than_7d</option>
</select>
</div> <!-- Grid column -->
  <!-- Grid column --> 
<div class="col-8 md-form mt-0"> 
  <!-- Material input -->
​<select  name="indicator">
  <option value="" disabled selected hidden>Select Indicator</option>
 <option value="Paper presentation">Paper presentation</option>
 <option value="Workshop">Workshop</option> 
  <option value="Technical Event">Technical Event</option>
  <option value="Technical Seminar">Technical Seminar</option>
  <option value="Implant Training">Implant Training</option>
  <option value="Industrial visit">Industrial visit</option>
  <option value="Project">Project</option>
  <option value="Certified Course">Certified Course</option>
  <option value="Training">Training</option>
  <option value="Journal">Journal</option>
  <option value="Guest lecture">Guest lecture</option>
  <option value="Pattern">Pattern</option>
</select>
</div> <!-- Grid column -->
 <!-- Grid column -->
  <div class="col md-form mt-4">
   <!-- Material input -->
  <input type="number" class="form-control cnt" name="score" placeholder="Score" data-length="3" > 
  </div> <!-- Grid column --> 
</div> <!-- Grid row -->
        <!-- btn-primary -->
   <button id="submit" type="submit" class="btn "  value="Submit">Submit</button>
             </div><!--frmgrp-->
         </form>
     </div><!--jmb-->
 </div><!--con-->

<!--side Nav -->
  <ul id="slide-out" class="sidenav fixed ">
 <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
 <h5 class="white-text" >User: <?php echo $_SESSION['spiusername']; ?></h5> 
  <div id="ru" class="row"> <p><a class="log" href="index.php" class="blue-text">Sign Out</a> </p>  <p id="delacc">Delete Account</p>
</div>
 </div>
<li class="nav-item"> <a class="nav-link " href="view.php"><i class="material-icons">developer_board</i>View</a> </li> 
<li class="nav-item active"> <a class="nav-link disabled" href="register.php"><i class="material-icons">person_add</i>Register</a> </li> 
<li class="nav-item"> <a class="nav-link " href="add.php"><i class="material-icons">edit</i>Entry</a> </li>
 </ul><!--col acc-->


<script>

$(document).ready(function() { 

 $("#submit").click(function(e){
   e.preventDefault();
var zn =$('[name=Name]').val();
var zd =$('[name=sec]').val();
var zr =$('[name=Reg]').val();
var bts =$('[name=bts]').val();
var btl =$('[name=btl]').val();
var ind =$('[name=indicator]').val();
var sr =$('[name=score]').val();
var md =$('[name=mode]').val();
var lvl =$('[name=level]').val();
var slt=$('[name=sem]').val().concat($('[name=slot]').val());
if(zd.length<8 && bts.length==4 && btl.length==4 && slt.length==9 && bts<btl){
var tname=bts.concat(btl,zd);
 $.ajax({
    type: "POST",
    url: 'register_backend.php',
    data:{Name:zn,reg:zr,tname:tname,indct:ind,mode:md,level:lvl,slot:slt,scr:sr,a:"insert"},
    
    success: function(data){
    if (data !=="") {
        alert(data);
     }
     if (data =="") {
	$('[name=Name]').val("");
	$('[name=Reg]').val("");
	$('[name=indicator]').val("");
	$('[name=score]').val("");
 	$('[name=level]').val("");
 	$('[name=mode]').val("");
//reset html form value 
    M.toast({html: 'Successfully Sent'})
     }
    }//suc
    });//aj
}//if
  });//clk
  
 $("#li").click(function(){
var zd =$('[name=sec]').val();
var bts =$('[name=bts]').val();
var btl =$('[name=btl]').val();
var tname=bts.concat(btl,zd);
var mnt="<?php echo $_SESSION['spiusername']; ?>";
 $.ajax({
    type: "POST",
    url: 'register_backend.php',
    data:{tname:tname,mnt:mnt,a:"last"},
    success: function(data){
    if(""!==data){
      $("#rc").html(data);
    }
    }//suc
    });//aj
  });//clk
  
$("[name=indicator],[name=mode],[name=level]").change(function(){
switch($('[name=indicator]').val()){
case"Paper presentation": var ind=1; break;
case"Workshop": var ind=2; break;
case"Technical Event": var ind=3; break;
case"Technical Seminar": var ind=4; break;
case"Implant Training": var ind=5; break;
case"Industrial visit": var ind=6; break;
case"Project": var ind=7; break;
case"Certified Course": var ind=8; break;
case"Training": var ind=9; break;
case"Journal": var ind=10; break;
case"Guest lecture": var ind=11; break;
case"Pattern": var ind=12; break;
default: var ind=0; break;
 }//s
switch($('[name=mode]').val()){
case"Internal": var md=1; break;
case"External": var md=2; break;
case"Salem": var md=3; break;
case"Outer": var md=4; break;
case"Online": var md=5; break;
case"Offline": var md=6; break;
case"Tamizh": var md=7; break;
case"English": var md=8; break;
case"Life Skill": var md=9; break;
default: var md=0; break;
 }//s
switch($('[name=level]').val()){
case"Participated": var lv=1; break;
case"Winner": var lv=2; break;
case"One_day": var lv=3; break;
case"More_than_1d": var lv=4; break;
case"Applied": var lv=5; break;
case"Published": var lv=6; break;
case"Level1": var lv=7; break;
case"Level2": var lv=8; break;
case"Trainer": var lv=9; break;
case"Less_than_4d": var lv=10; break;
case"Less_than_8d": var lv=11; break;
case"More_than_7d": var lv=12; break;
default: var lv=0; break;
 }//s
var sr=[
[0],[[0],[0,25,50],[0,50,75]],
[[0],[0,1,2,25,50],[0,1,2,75,150]],
[[0],[0,25,50],[0,50,75]],
[[0],[0,1,2,25,50],[0,1,2,75,150],3,4,5,6,[25],[50]],
[0,1,2,[100],[200]],
[[50]],
[[0,1,2,3,4,5,6,150,300]],
[0,1,2,3,"Er",[0,1,2,3,4,5,6,7,8,9,[50],[100],[150]],[0,1,2,3,4,5,6,7,8,9,75,150,150],7,8,[25]],
[0,1,2,3,4,5,[0,25,150,3,4,5,6,7,8,150]],
[[0,1,2,3,4,150,300]],
[0,[0,1,2,25,50]],
[[0,1,2,3,4,200,400]]
];
$('[name=score]').val(sr[ind][md][lv]);
 });//cng
  
 $(".log").click(function(){
 $.ajax({
    type: "POST",
    url: 'exit.php',
    data:{exit:"logout"},
     success: function(data){
    }//suc
    });//aj
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
 
$(".cnt").focus(function() { $(".cnt").characterCounter(); });

});//doc

</script>


 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

 <script>
 document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
  });

</script>


   <!-- btn-primary -->

<!-- Modal Trigger -->
  <button id="li" class="waves-effect waves-light btn modal-trigger btn-lg btn-block" href="#modal1">Last inserted</button>

  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Recent records</h4>
      <span id="rc">Enter Batch</span>
    </div>
    <div class="modal-footer">
      <p class="modal-close waves-effect btn-flat">Close</p>
    </div>
  </div>
     
</body>
</html>
