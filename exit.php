 <?php
  if ($_POST["exit"]=="logout"){ exit(session_destroy()); }

if("delaccount"==$_POST['exit']){
 $user=$_SESSION['spiusername'];
 $pass=$_SESSION['spipassword'];
 $sql = "DELETE FROM Staff WHERE username='{$user}' AND password='{$pass}' ";
if($conn->query($sql)==TRUE){
session_destroy();
 }
}// del if 

?>