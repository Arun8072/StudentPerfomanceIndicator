<?php 
session_start();
if(!isset($_SESSION['spiusername'])){
  die(header("location:index.php"));
}
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
   $sql = "SELECT username,password  FROM Staff";
$result = $conn->query($sql);
 $user= $_SESSION['spiusername'];
 $pass= $_SESSION['spipassword'];
if ($result==true && $result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){
     if($row["username"]==$user){
        if($row["password"]==$pass){
  $c=True;
   break;
       }//p if
       else{
    $c=False;
      }
     }//u if
      else{
   $c=False;
      }		
    }//wh
 if($c==False){
    if(session_destroy()) {
  die(header("Location:index.php"));
   }//if
     }//if
    }//res
 $conn->close();
?>