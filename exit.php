 <?php
 session_start();
  //  to logout
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    exit(session_destroy());
    header("location:index.php");
}
if ($_POST["exit"]=="logout"){echo "logedout"; exit(session_destroy());}
//to delete account
if("delaccount"==$_POST['exit']){
 $user=$_SESSION['spiusername'];
 $pass=$_SESSION['spipassword'];
 $sql = "DELETE FROM Staff WHERE username='{$user}' AND password='{$pass}' ";
if($conn->query($sql)==TRUE){
session_destroy();
 }
}// del if 

?>