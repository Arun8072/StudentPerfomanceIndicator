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
@font-face {
 font-family:Ubuntu-Medium;
  src: url("vendor/fonts/Ubuntu/Ubuntu-Medium.ttf");
}
*{
    font-family: Ubuntu-Regular;
}
#li{
 font-size:10px;
 margin-top: 35px;
bottom: 0px;
}
body {
 background: url("images/bg_add.jpg") no-repeat center fixed;
 background-color: #ffffff;
  background-size: cover; /* Resize the background image to cover the entire jumbotron */
}
.container{
  background-color: #ffffff;
 border-radius:7px;
 padding-top:5px;
 padding-bottom: 5px;
 margin-top: 30px;
 min-height:800px;
  }

#upd{
overflow:scroll;
overflow-x:auto;
max-height:225px;
margin-left:22px;
margin-right:22px;
}
#fg{
  min-height:300px;
}
.one{
text-align:right;
background-color: #ffffff;
border-right: 6px solid blue;
font-family:Ubuntu-Medium;
}
.btn{
border-radius:5px;
}
.font-weight-bold{
font-size:13px;
}

#ru{
position:relative;
}
#delacc{
position:absolute;
right:0px;
color:grey;
}
header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
</style>
 </head>
<body>
<main>
  <div class="container">
<form id="fg" class="form-horizontal" role="form" method="POST">
  <h5><b>Batch</b></h5>
<div class="form-group">
<div id="upd" class="" >
</div>
<div id="updt" >
<div class="row"> <!-- Grid row -->
  <!-- Grid column --> 
<div class="col-12"> 
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
</div> <!-- Grid column -->
 <!-- Grid column -->
  <div class="col-12">
     <!-- Material input -->
  ​<select name="slot">
  <option value="" disabled selected hidden>Slot</option>
 <option value="slot1">Slot1</option>
 <option value="slot2">Slot2</option>
 <option value="slot3">Slot3</option>
</select>
  </div> <!-- Grid column --> 
  <div class="col-12 mt-5">
<div id="up" class="btn col-4">List</div>
  </div>
 </div><!--row-->
</div><!--upd-->
</div><!--frmgrp-->
</form> 



<form class="form-horizontal" role="form" method="POST">
 <h5><b>Indicator and Score</b></h5>
<div class="row"> <!-- Grid row -->
  <!-- Grid column --> 
<div class="col-12 md-form mt-0"> 
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
   <div class="col-12 md-form mt-0"> 
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
<div class="col-12 md-form mt-0"> 
  <!-- Material input -->
​<select name="indicator">
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
  <div class="col-12 md-form mt-4">
   <!-- Material input -->
  <input type="number" class="form-control" name="score" placeholder="Score" > 
  </div> <!-- Grid column --> 
</div> <!-- Grid row -->
<div class="col-12">
        <!-- btn-primary -->
  <button id="submit" type="submit" class="btn col-4"  value="Submit">Submit</button>

 </div>
 <!-- Modal Trigger -->
  <button id="li" class="waves-effect waves-light btn col-12 modal-trigger" href="#modal1">Last inserted</button>
  </div><!--frmgrp-->
         </form>
</div>  <!-- jumbotron -->

</main>
<!--side Nav -->
  <ul id="slide-out" class="sidenav sidenav-fixed">
 <div class="user-view">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
 <h5 class="white-text" >User: <?php echo $_SESSION['spiusername']; ?></h5> 
 <div id="ru" class="row"> <p><a class="log" href="index.php" class="blue-text">Sign Out</a> </p>  <p id="delacc">Delete Account</p>
</div>
 </div>
<li class="nav-item"> <a class="nav-link " href="view.php"><i class="material-icons">developer_board</i>View</a> </li> 
<li class="nav-item"> <a class="nav-link " href="register.php"><i class="material-icons">person_add</i>Register</a> </li> 
<li class="nav-item active"> <a class="nav-link disabled " href="add.php"><i class="material-icons">edit</i>Entry</a> </li>
 </ul><!--col acc-->
<script>
$(document).ready(function() { 

 $("#up").click(function(){
var slt=$('[name=sem]').val().concat($('[name=slot]').val());
if(slt.length==9){
 $.ajax({
    type: "POST",
    url: 'register_backend.php',
    data:{a:"update"},
    success: function(data){
    if(""!==data){
     $("#updt").hide();
      $("#upd").html(data);
      
$(".card-header").click(function(){
   $(this).addClass("one");
  });//clk
    }//if
   
    }//suc
    });//aj
}//if
});//clk
 
 $("#submit").click(function(e){
   e.preventDefault();
if($('[name=score]').val().length>0 && $('[name=score]').val().length<4){
  $(".one").each(function(){
var zn =$(this).attr("name");
var zr =$(this).attr("reg");
var tname =$(this).attr("sec");
var ind =$('[name=indicator]').val();
var sr =$('[name=score]').val();
var md =$('[name=mode]').val();
var lvl =$('[name=level]').val();
var slt=$('[name=sem]').val().concat($('[name=slot]').val());
 $.ajax({
    type: "POST",
    url: 'register_backend.php',
    data:{Name:zn,reg:zr,tname:tname,indct:ind,mode:md,level:lvl,slot:slt,scr:sr,a:"insert"},
    success: function(data){
 if(""!==data){
     alert(data);
      }
    }//suc
    });//aj
    });//ech     
 M.toast({html:'Successfully Sent'})
}//if
   $("#up").trigger("click");
  // $(".card-header").removeClass("one");
    $('[name=score]').val("");
  });//clk
  
 $("#li").click(function(){
var tname =$(".card-header").attr("sec");
var mnt="<?php echo $_SESSION['spiusername']; ?>";
if (tname!=undefined){
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
}//if
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
      header("location:index.php");
    }//suc
    });//aj
});//clk

});//doc


</script>


 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

 <script>
 document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      toolbarEnabled: true
    });
  });

</script>
   <!-- btn-primary -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Recent records</h4>
      <span id="rc">Enter Batch</span>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
     
</body>
<script>
//after loading
/* $.ajax({
    type: "POST",
    url: 'logout.php',
    data:{logout:"check"},
    success: function(data){
    if("False"==data){
     document.write("Refresh");
    }
    //redirect
    }//suc
    });//aj*/
</script>
</html>
