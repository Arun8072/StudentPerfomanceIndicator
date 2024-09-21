<?php 
session_start();
   $Error="";
  if(isset($_COOKIE['studreg'])){
 header("location:StudentView.php");
     }
 if(isset($_SESSION['spiusername'])){
 header("location:view.php");
     }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
//if session not working at new device set session only once $_SESSION['spiusername'] = "afdr" and destroy it $_SESSION['spiusername'] = "";
      if(isset($_POST['username'])){
        $user =$_POST['username'];
        $pass =$_POST['password'];
        $pass=MD5(trim($pass));
      }else{
        $user =" ";
        $pass =" ";
      }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spi";

// Create connection
$conn = new  mysqli($servername, $username, $password,$dbname);

 // Check connection
if ($conn->connect_error) {
   die("Connection failed: "  . $conn->connect_error);
}
   
   $sql = "SELECT username,password  FROM Staff";
$result = $conn->query($sql);

if ($result==true && $result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){
     if($row["username"]==$user){
        if($row["password"]==$pass){
   		if(!isset($_SESSION['spiusername'])){
   		 $_SESSION['spiusername'] = $user;
         $_SESSION['spipassword'] = $pass;
         }
        $conn->close();
 exit(header("location:view.php"));
       }//p if
       else{
      $Error="Username/Password may be incorrect";
      }
         
     }//u if
      else{
      $Error="Username / Password may be incorrect";
      }if(isset($_SESSION['spipassword'])){
     if($_SESSION['spipassword']!==$row["username"]){
$ses=True;
        }} 
    }//wh
    if(isset($ses) && $ses==True){
echo $_SESSION['spiusername'].
      "<h2><a href = \"logout.php\">Please Sign Out</a></h2>";
        }
    }//res
 $conn->close();
   }//post if
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SPI Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			
  <ul id="nv" class="nav nav-tabs bg-transparent nav-pills justify-content-center" role="tablist">
	  <li class="nav-item">
<a id="lgn1" class="nav-link" data-toggle="tab" href="#S-login">S-Login</a>
    </li>
    <li class="nav-item">
<a id="lgn2" class="nav-link" data-toggle="tab" href="#T-login">T-Login</a>
    </li>
   <li class="nav-item">
    <a id="lgn3" class="nav-link" data-toggle="tab" href="#C-user">Sign Up</a></li>
  </ul>
  
<span class="tab-content">
 <div id="S-login" class="container tab-pane fade" style="word-break: break-all;">
 <span class="login100-form-title p-b-37"> Student's Login</span>
<form id="form1" class="login100-form validate-form" method="POST" action="<?php echo htmlentities('student_verification.php'); ?>" >   
		<div class="wrap-input100 validate-input m-b-20" data-validate="Enter Name">
	<input class="input100" type="text" name="studname" placeholder="Name">
					<span class="focus-input100"></span>
				</div>              

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter RegisterNumber">
					<input class="input100" type="number" name="studreg" placeholder="RegisterNumber">
					<span class="focus-input100"></span>
				</div>     
                  


				<div class="container-login100-form-btn">
					<button id="slogin" type="submit" value="submit" class="login100-form-btn">
						Login
					</button>
				</div>


							
			</form>
                 <div class="container-login100-form-btn "> 
 <p id="err"></p>   
    </div>
    </div>
    
    <div id="T-login" class="container tab-pane fade" style="word-break: break-all;">
 <span class="login100-form-title p-b-37"> Teacher's Login</span>  
<form id="form2" class="login100-form validate-form1" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >  
					<div class="wrap-input100 validate-input1 m-b-20" data-validate="Enter Username ">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
				</div>              

				<div class="wrap-input100 validate-input1 m-b-25" data-validate = "Enter Password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>     
                  


				<div class="container-login100-form-btn">
					<button id="tlogin" type="submit" value="submit" class="login100-form-btn">
						Login
					</button>
				</div>


							
			</form>
                 <div class="container-login100-form-btn "> 
            <p><?php echo $Error; ?></p>              
			</div>
    			</div>

   <div id="C-user" class="container tab-pane fade" style="word-break: break-all;">
 <span class="login100-form-title p-b-37">Create User</span>
		<form id="form3" class="login100-form validate-form2" method="POST">                      
                                     
							<div  class="wrap-input100 validate-input2 m-b-20" data-validate="Enter Username ">
					<input class="input100" type="text" name="CreateUser" placeholder="Username">
					<span class="focus-input100"></span>
				</div>              

				<div class="wrap-input100 validate-input2 m-b-25" data-validate = "Enter Password">
					<input class="input100" type="password" name="CreatePass" placeholder="password">
<span class="focus-input100"></span>				</div> 
             
<div class="wrap-input100 validate-input2 m-b-20" >
					<input class="input100" type="text" name="cc" placeholder="Your class as a CC "><span class="focus-input100"></span>				</div> <small class="form-text text-muted"> Example:2017-2021-CSE-A</small>
				
<div class="wrap-input100 validate-input2 m-b-20" >
					<input class="input100" type="text" name="class1" placeholder="Your class as a mentor ">
					<span class="focus-input100"></span>
				</div> 
				
	<div class="wrap-input100 validate-input2 m-b-25" >
					<input class="input100" type="password" name="unqid" placeholder="Unique Password">
					<span class="focus-input100"></span>
				</div> 
				
<div class="container-login100-form-btn">
		<button id="create" type="submit" value="submit" class="login100-form-btn cr-al" style="float:left">
						Sign Up
					</button>
			<button id="alter" type="submit" value="submit" class="login100-social-item cr-al" style="float:right">Alter</button>					
				</div>


							
			</form>
<div class="container-login100-form-btn "> 
            <p id="error"></p>              
			</div>
		</div>
</span>
                        

		</div>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/main.js"></script>
<script>
$(document).ready(function() { 
var i=0;
 $(".cr-al").click(function(e){   
   e.preventDefault();
var user =$('[name=CreateUser]').val();
var pass =$('[name=CreatePass]').val();
var id =$('[name=unqid]').val();
if (user.length>5 && pass.length>5 && id.length==12){
var cc =$('[name=cc]').val();
var class1 =$('[name=class1]').val();
var si =$(this).attr("id");
 $.ajax({
    type: "POST",
    url: 'register_backend.php',
    data:{spiuser:user,spipass:pass,cc:cc,class1:class1,unqid:id,a:si},
    
    success: function(data){
    if (data !=="") {
        $("#error").html(data);
          i++;
        if(i>2){
        window.location="index.php";
       }
     }
    if (data =="") {
    //header location
     $("#lgn2").trigger("click");
       $("input").val("");
       alert("Successfully Created");
     }
    }//suc
    });//aj
    }//if
  });//clk
  
});//doc
</script>
</body>
</html>
