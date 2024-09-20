<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  date_default_timezone_set("Asia/Kolkata");
  session_start();
//MySQLi Object-oriented(php with mysql) is used here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spi";
//first create database in phpmyadmin  so that you can connect here

// Create connection
$conn = new  mysqli($servername, $username, $password,$dbname);

 // Check connection
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}

if("insert"==$_POST['a']){
$Name= $_POST['Name'];
$Name=stripslashes($Name);
$Name=trim($Name);//remove empty space from left and right
$ZName=htmlspecialchars($Name);
$Name=strip_tags($ZName);
 $Name = preg_replace('/[^A-Za-z.\s]/', '', $Name);
if($ZName!==$Name){
//if any tags present in post of name it exit
die("#_#");
exit();
}
 $reg= $_POST['reg'];
//die first year>last year
if(intval(substr($_POST['tname'],0,4))>intval(substr($_POST['tname'],4,4))){die("Invalid batch");}
//Strip all characters but letters and numbers from a PHP string
 $tname = preg_replace("/[^A-Z0-9]/", "", $_POST['tname']);
 $ind= $_POST['indct'];
 $mode= $_POST['mode'];
 $level= $_POST['level'];
 $slot= $_POST['slot'];
 $scr= $_POST['scr'];
 $mnt=$_SESSION['spiusername'];

if(strlen($Name) >3 &&  isset($_POST['reg']) &&  strlen($reg)==12 && strlen($tname)<15){

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS {$tname} (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, RegisterNumber VARCHAR(12) NOT NULL, Name VARCHAR(30) NOT NULL,Indicator VARCHAR(20) NOT NULL,Mode VARCHAR(10),Level VARCHAR(12),Slot VARCHAR(9),Score VARCHAR(3) NOT NULL,Mentor VARCHAR(25) NOT NULL )";

if ($conn->query($sql) ===FALSE) {
   echo "<br>Error creating table: " . $conn->error;
}

$sqlt = "INSERT INTO {$tname} (RegisterNumber,Name,Indicator,Mode,Level,Slot,Score,Mentor)VALUES ('$reg','$Name','$ind','$mode','$level','$slot','$scr','$mnt') ";

if (isset($_POST['Name']) && $conn->query($sqlt) ===FALSE ) {
    echo "\nInsert Error: " ;
  // echo $conn->error;   
}

}//ins if

elseif($_POST['Name']=="" && $_POST['tname']=="" && $_POST['reg']=="") {
 echo "\nNULL VALUES NOT PROCESSED";
}
elseif($_POST['Name']=="") {

echo "\nName field is empty";
echo "\nNULL VALUES NOT PROCESSED";

}
elseif($_POST['sec']=="") {
echo "\nDepartment field is not selected";
echo "\nNULL VALUES NOT PROCESSED";
}
elseif($_POST['reg']=="") {
echo "\nRegister number field is not filled";
echo "\nNULL VALUES NOT PROCESSED";
}
elseif(strlen($_POST['bs'])!==4 || strlen($_POST['bl'])!==4 ) {
echo "\nEnter a valid year ";
}
elseif($_POST['bs']>=$_POST['bl'] ) {
echo "\nLast year should be greater than first year ";
}else{
echo "Check out the form";
}

}//cr if
  
if("last"==$_POST['a']){
$tname = preg_replace("/[^A-Z0-9]/", "",$_POST['tname']);
$mnt= $_POST['mnt'];

if(strlen($tname)>11) { 
$sql = "SELECT * FROM {$tname} WHERE mentor='{$mnt}' ORDER BY ID DESC LIMIT 5";

$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }

if ($result==true && $result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
 echo "<hr>Name: ".$row["Name"] . "<br>RegNumber: ".$row["RegisterNumber"]."<br>Sem_Slot: " .$row["Slot"]."<br>Mode: ".$row["Mode"]."<br>Level: " .$row["Level"]."<br>Indicator: ".$row["Indicator"]."<br>Score: ".$row["Score"]."<br>Mentor: ".$row["Mentor"];
    }
  } else {
    echo "0 results";
     }

}//if
}//lt if

if("update"==$_POST['a']){
 $mnt=$user=$_SESSION['spiusername'];
  $pass=$_SESSION['spipassword'];
 $sql = "SELECT CC,class1 FROM Staff WHERE username='$user' AND password='$pass' ";
$result = $conn->query($sql);

if ($result ===FALSE) {
 echo "<br>Select-User-Error : " .$conn->error;
  }

if ($result==true && $result->num_rows > 0) {
    // output data of each row
  $rows = $result->fetch_assoc();
  $tnm[0]=$rows["CC"];
  $tnm[1]=$rows["class1"];
  $act[0]="active";
  $act[1]="";

 echo '<ul  class="nav nav-tabs" role="tablist">
     <li id="" class="nav-item active">
      <a class="nav-link active" data-toggle="tab" href="#c0">'.$tnm[0].'</a>
    </li>
    <li id="" class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#c1">'.$tnm[1].'</a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">';
   
 for($i=0;$i<2;$i++) {
echo ' <div id="c'.$i.'" class=" tab-pane  '.$act[$i].'">';
     
$sql = "SELECT RegisterNumber,Name,SUM(Score) FROM {$tnm[$i]} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$tnm[$i]} WHERE Mentor='{$mnt}') GROUP BY RegisterNumber,Name";

$result = $conn->query($sql);
if ($result===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }

if ($result==true && $result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  '<div class="card-header" reg="'. $row["RegisterNumber"].'" name="'.$row["Name"].'" sec="'.$tnm[$i].'" >'.$row["Name"]."______".$row["SUM(Score)"].'</div>';
    }
  } else {
    echo "0 results";
     }
   echo '</div> ';
    }//for
      echo  '</div>';
  }//if

  
}//upd

if("create"==$_POST['a']){
$Name= $_POST['spiuser'];
$ZName=trim($Name);//remove empty space from left and right
$Name = preg_replace('/[^A-Za-z0-9.\s]/', '', $ZName);
if($ZName!==$Name){
//if any tags present in post of name it exit
die("#_#");
exit();
}
 $pass=MD5(trim($_POST['spipass']));
 $cc=preg_replace('/[^A-Z0-9 ]/',"",trim($_POST['cc']));
 $class1=preg_replace('/[^A-Z0-9 ]/',"",trim($_POST['class1']));
 $id=intval($_POST['unqid']);
 $uid=intval("620117104010");
//Strip all characters but letters and numbers from a PHP string
if(strlen($cc)!==12 && strlen($cc)!==0) {exit("Invalid Class");}
if(strlen($class1)!==12 && strlen($class1)!==0) {exit("Invalid Class");}

if($id===$uid){

if(strlen($Name)>6 && strlen($pass)>6){

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Staff (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(20) UNIQUE NOT NULL,password VARCHAR(35) NOT NULL,CC VARCHAR(14),class1 VARCHAR(14))";

if ($conn->query($sql) ===FALSE) {
   echo "<br>Error Creating table: " . $conn->error;
}

$sqlt = "INSERT INTO Staff (username,password,CC,class1)VALUES ('$Name','$pass','$cc','$class1') ";

if (isset($_POST['spiuser']) && $conn->query($sqlt) ===FALSE ) {
    echo "\nInsert Error: " . $sqlt . $conn->error;   
}

}//len if

elseif($_POST['spiuser']=="" || $_POST['spipass']=="") {
 echo "\nNULL VALUES NOT PROCESSED";
}

elseif($_POST['spiuser']<6 || $_POST['spipass']<6) {
 echo "Username and Password must be more than 6 characters\n";
}

}//unq
else{
echo "Unique ID is invalid";
}

}//cr if 
if("alter"==$_POST['a']){
$Name= $_POST['spiuser'];
$ZName=trim($Name);//remove empty space from left and right
$Name = preg_replace('/[^A-Za-z0-9.\s]/', '', $ZName);
if($ZName!==$Name){
//if any tags present in post of name it exit
die("#_#");
exit();
}
 $pass=MD5(trim($_POST['spipass']));
 $cc=preg_replace('/[^A-Z0-9 ]/',"",trim($_POST['cc']));
 $class1=preg_replace('/[^A-Z0-9 ]/',"",trim($_POST['class1']));
 $id=intval($_POST['unqid']);
 $uid=intval("620117104010");
//Strip all characters but letters and numbers from a PHP string
if(strlen($cc)!==12 && strlen($cc)!==0) {exit("Invalid Class");}
if(strlen($class1)!==12 && strlen($class1)!==0) {exit("Invalid Class");}

if($id===$uid){

if(strlen($Name)>6 && strlen($pass)>6){

$sqlt="UPDATE Staff SET CC='{$cc}',class1='{$class1}' WHERE username='{$Name}' AND password='{$pass}' ";

if (isset($_POST['spiuser']) && $conn->query($sqlt) ===FALSE ) {
    echo "\nAlter Error: " . $sqlt . $conn->error;   
}

}//len if

elseif($_POST['spiuser']=="" || $_POST['spipass']=="") {
 echo "\nNULL VALUES NOT PROCESSED";
}

elseif($_POST['spiuser']<6 || $_POST['spipass']<6) {
 echo "Username and Password must be more than 6 characters\n";
}

}//unq
else{
echo "Unique ID is invalid";
}

}//al if  

if (!$conn->connect_error) {
   $conn->close();
}
}//if
?>