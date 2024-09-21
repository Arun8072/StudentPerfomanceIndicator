<?php 
session_start();
if(isset($_COOKIE['studreg']) || $_SERVER["REQUEST_METHOD"] == "GET"){
  session_destroy();
 exit(header("location:index.php"));
    } //ses

   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
function search($reg,$tname,$name){
if(30<substr($reg,10,2)){ 
$ord="ORDER BY RegisterNumber DESC";
}else{ $ord="";}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SPI";

// Create connection
$conn = new  mysqli($servername, $username, $password,$dbname);

 // Check connection
if ($conn->connect_error) {
   die("Connection failed: "  . $conn->connect_error);
}
   
   $sql = "SELECT RegisterNumber,Name FROM {$tname} {$ord} LIMIT 35";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

if($row["RegisterNumber"]==$reg){
if(strtolower($row["Name"])==strtolower($name)){
   	if(!isset($_SESSION['studreg'])){
     
     $cookie_name ="studreg";
  $cookie_value = $reg;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
     
    $cookie_name = "tname";
  $cookie_value = $tname;
   setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
  
           }
         $fnd=True;
       }//p if
       else{
     //header("location:index.php");
   //   $Error="Username/Password may be incorrect";
     $fnd=False;
      }
     }//u if
      else{
  // header("location:index.php");
  //    $Error="Username / Password may be incorrect";
    $fnd=False;
      }		
    }//wh
  return $fnd;
    }//res
      $conn->close();
}//func

 //username and password sent from form 
 if(isset($_POST['studreg']) && isset($_POST['studname'])){
$reg=htmlentities($_POST['studreg']);
$name=htmlentities($_POST['studname']);
if(preg_replace('/[^A-Za-z0-9.\s]/','',$name)!==$_POST['studname']){
exit(header("location:index.php"));
}
if(preg_replace('/[^0-9]/','',$reg)!==$_POST['studreg']){
exit(header("location:index.php"));
}
if(strlen($reg)!==12){
exit(header("location:index.php"));
}
if("6201"!==substr($reg,0,4)){
exit(header("location:index.php"));
}

switch(substr($reg,6,3)){
case"104": $cl="CSE"; break;
case"106": $cl="ECE"; break;
case"105": $cl="EEE"; break;
case"114": $cl="MECH"; break;
case"103": $cl="CIVIL"; break;
default:exit(header("location:index.php"));
}

 $tname="20".substr($reg,4,2)."20".(substr($reg,4,2)+4).$cl."A";
if(search($reg,$tname,$name)){
header("location:StudentView.php");
}else{
 $tname="20".substr($reg,4,2)."20".(substr($reg,4,2)+4).$cl."B";
	if(search($reg,$tname,$name)){
header("location:StudentView.php");
	}else{
exit(header("location:index.php"));
   }
}
      }else{ 
exit(header("location:index.php"));
      }
   }//post if

?>