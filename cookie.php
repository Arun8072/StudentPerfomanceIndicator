<?php
if("y"==$_POST['cki']){
   $cookie_name = $_POST['cnm'];
  $cookie_value = $_POST['cvl'];
  if(strlen($cookie_value)<9){
  $cookie_value = "";
 setcookie($cookie_name, $cookie_value, time()- 60, "/","", 0);
echo  $_COOKIE[$cookie_name]."as a default is cleared";
}else{
    setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
   echo  $cookie_value." is set to default";
   }
}//cki
?>