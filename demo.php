<?php session_start();
if("yes"==$_POST["logout"] || $_SERVER["REQUEST_METHOD"] == "GET"){
exit(session_destroy());
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  date_default_timezone_set("Asia/Kolkata");
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
//										//

if("view"==$_POST['a']){
$slot=$_COOKIE["slot"];
  $user=$_SESSION['spiusername'];
  $pass=$_SESSION['spipassword'];
 $sql = "SELECT CC,class1 FROM Staff WHERE username='$user' AND password='$pass' ";
$result = $conn->query($sql);

/*if ($result ===FALSE) {
 echo "<br>Select-User-Error : " .$conn->error;
  }*/

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
  $cc=$row["CC"];
  $class1=$row["class1"];
//  $class2=$row["class2"];
 // $class3=$row["class3"];
    }
  }

if("cc"==$_POST['class']){
$cls=$cc;
if("y"==$_POST['ord']){
$ord='ORDER BY SUM(Score) DESC ';
}else{
$ord="";
}
$sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls}) AND Slot='{$slot}'  GROUP BY RegisterNumber {$ord}";
}//Cc if

if("ccsd"==$_POST['class']){
$cls=$cc;
if("y"==$_POST['ord']){
$ord='ORDER BY SUM(Score) DESC ';
}else{
$ord="";
}
$sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} WHERE Mentor='{$user}') AND Slot='{$slot}' GROUP BY RegisterNumber {$ord}";
}//Cc if

if("c1"==$_POST['class']){
$cls=$class1;
if("y"==$_POST['ord']){
$ord='ORDER BY SUM(Score) DESC ';
}else{
$ord="";
}
$sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} WHERE Mentor='{$user}') AND Slot='{$slot}' GROUP BY RegisterNumber {$ord}";
}

$result = $conn->query($sqtl);

/*if ($result===FALSE) {
 echo "<br>Select-Error : ";
//echo $conn->error;
  }*/
  
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
$reg=$row["RegisterNumber"];
 $tl=$row["SUM(Score)"];
  echo '<li value="'.$tl.'"><div class="collapsible-header"><i class="material-icons ib">person_outline</i><span class="tp" ><span class="tpl">'.$row["Name"].'</span><span class="btm" >'.$reg.'</span><span class="btc">'.$row["COUNT(Indicator)"].'</span><span class="sd text-muted" >'.$cls.'</span></span></div>';
   echo '<div class="collapsible-body">';
$sql = "SELECT Indicator,Score FROM {$cls} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
$resl = $conn->query($sql);
if ($conn->query($sql) ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($resl->num_rows > 0) {
    // output data of each row
  while($rows = $resl->fetch_assoc()) {
 echo '<span class="itl">'.$rows["Indicator"].'</span><span class="flr itl">'.$rows["Score"].'</span><hr>';
// $tl+=$rows["Score"];
}//wh
}//if
echo '<span class="ttl">'."Total".'</span> <span class="flr tls">'.$tl.'</span>';
//$tl=0;
 echo ' </div> ';
echo '</li>';
  
}}

}//vi if

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
$sql = "CREATE TABLE IF NOT EXISTS {$tname} (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, RegisterNumber VARCHAR(12) NOT NULL, Name VARCHAR(30) NOT NULL,Indicator VARCHAR(40) NOT NULL,Mode VARCHAR(8),Level VARCHAR(12),Slot VARCHAR(9),Score VARCHAR(3) NOT NULL,Mentor VARCHAR(20) NOT NULL )";

if ($conn->query($sql) ===FALSE) {
   echo "<br>Error creating table: " . $conn->error;
}

$sqlt = "INSERT INTO {$tname} (RegisterNumber,Name,Indicator,Mode,Level,Slot,Score,Mentor)VALUES ('$reg','$Name','$ind','$mode','$level','$slot','$scr','$mnt') ";

if (isset($_POST['Name']) && $conn->query($sqlt) ===FALSE ) {
    echo "\nInsert Error: " ;
  // echo $conn->error;   
}

}//ins if

elseif($_POST['Name']=="" && $_POST['sec']=="" && $_POST['reg']=="") {
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

if("iview"==$_POST['a']){
$slot=$_COOKIE["slot"];
  $user=$_SESSION['spiusername'];
  $pass=$_SESSION['spipassword'];

 $sql = "SELECT CC,class1 FROM Staff WHERE username='$user' AND password='$pass' ";
$result = $conn->query($sql);

if ($conn->query($sql) ===FALSE) {
 echo "<br>Select-User-Error : " .$conn->error;
  }

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
  $cc=$row["CC"];
  $class1=$row["class1"]; 
    }
  }

if("cc"==$_POST['class']){
$cls=$cc; 
}//Cc if
if("c1"==$_POST['class']){
$cls=$class1;
}
$sqtl = "SELECT DISTINCT Indicator FROM {$cls} WHERE Mentor='{$user}' AND Slot='{$slot}' ";
$result = $conn->query($sqtl);

if ($result===FALSE) {
 echo "<br>Select-Error : ";
// echo $conn->error;
  }
  
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
  echo '<li><div class="collapsible-header"><i class="material-icons">person_outline</i><span class="tp" > <span class="tpl">'.$row["Indicator"].'</span> <span class="sd text-muted">'.$cls.'</span></span></div>';
   echo '<div class="collapsible-body">';
$sql = "SELECT DISTINCT Name FROM {$cls} WHERE Indicator='{$row["Indicator"]}' AND Mentor='{$user}' AND Slot='{$slot}'  ";
$resl = $conn->query($sql);
if ($resl ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($resl->num_rows > 0) {
    // output data of each row
  while($rows = $resl->fetch_assoc()) {
  $sqln = "SELECT COUNT(Indicator) FROM {$cls} WHERE Name='{$rows["Name"]}' AND Indicator='{$row["Indicator"]}' AND Mentor='{$user}' AND Slot='{$slot}'";
$reslt = $conn->query($sqln);
/*if ($reslt===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
if ($reslt->num_rows > 0) {
    // output data of each row
  while($ro=$reslt->fetch_assoc()) {
 $re=$ro["COUNT(Indicator)"];
}//wh
}//if
  
 echo '<span class="itl">'.$rows["Name"].'</span><span class="flr itl">'.$re.'</span><hr>';
}//wh
}//if
 echo ' </div> ';
echo '</li>';
  
}}

}//i vi if

if("dview"==$_POST['a']){
 $dept=$_POST['dept'];
$slot=$_COOKIE["slot"];
if(date("m")>=06){
$Y=date("Y");
}else{
$Y=date("Y")-1;
}
$fi=$Y.$Y+4;
$tw=($Y-1).($Y-1)+4;
$th=($Y-2).($Y-2)+4;
$fo=($Y-3).($Y-3)+4;
 $tnm=[
$fi.$dept."A",
$fi.$dept."B",
$tw.$dept."A",
$tw.$dept."B",
$th.$dept."A",
$th.$dept."B",
$fo.$dept."A",
$fo.$dept."B",
];
$j=2;
$k=5;
$l=5;
if("1"==$_POST['year']){
$j=0;
$k=1;
$l=10;
}
if("2"==$_POST['year']){
$j=2;
$k=3;
$l=10;
}
if("3"==$_POST['year']){
$j=4;
$k=5;
$l=10;
}
if("4"==$_POST['year']){
$j=6;
$k=7;
$l=10;
}
if(""==$_POST['dept']){
exit("<center><h6>Select Department</h6></center>");
}
for($i=$j;$i<=$k;$i++){
   $cls=$tnm[$i];
$sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} ) AND Slot='{$slot}' GROUP BY RegisterNumber ORDER BY SUM(Score) DESC LIMIT {$l} ";

$result = $conn->query($sqtl);

/*if ($result===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
  
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
$reg=$row["RegisterNumber"];
$tl=$row["SUM(Score)"];
 echo '<li value="'.$tl.'"><div class="collapsible-header"><i class="material-icons">person_outline</i><span class="tp"><span class="tpl">'.$row["Name"].'</span><span class="btm" >'.$reg.'</span><span class="btc">'.$row["COUNT(Indicator)"].'</span><span class="sd text-muted">'.$cls.'</span></span></div>';
   echo '<div class="collapsible-body">';
$sql = "SELECT Indicator,Score FROM {$cls} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
$resl = $conn->query($sql);
/*if ($resl===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
if ($resl->num_rows > 0) {
    // output data of each row
  while($rows = $resl->fetch_assoc()) {
 echo '<span class="itl">'.$rows["Indicator"].'</span><span class="flr itl">'.$rows["Score"].'</span><hr>';
 //$tl+=$rows["Score"];
}//wh
}//if
echo '<span class="ttl">'."Total".'</span> <span class="flr tls">'.$tl.'</span>';
//$tl=0;
 echo ' </div> ';
echo '</li>';
}}//wh if
//echo '<br>';
}//for

}//dv if

if("fview"==$_POST['a']){
$slot=$_COOKIE["slot"];
$dep=["CSE","ECE","EEE","MECH","CIVIL"];
if(date("m")>=06){
$Y=date("Y");
}else{
$Y=date("Y")-1;
}
$fi=$Y.$Y+4;
$tw=($Y-1).($Y-1)+4;
$th=($Y-2).($Y-2)+4;
$fo=($Y-3).($Y-3)+4;

for($a=0;$a<=4;$a++){
   $dept=$dep[$a];
 $tnm=[
$fi.$dept."A",
$fi.$dept."B",
$tw.$dept."A",
$tw.$dept."B",
$th.$dept."A",
$th.$dept."B",
$fo.$dept."A",
$fo.$dept."B",
];

for($i=0;$i<=7;$i++){
   $cls=$tnm[$i];
$sqtl ="SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM  {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} ) AND Slot='{$slot}' GROUP BY RegisterNumber ORDER BY SUM(Score) DESC LIMIT 2 ";
$result = $conn->query($sqtl);

/*if ($result===FALSE) {
 echo "<br>Select-Error : ";
// echo $conn->error;
  }*/
  
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
$reg=$row["RegisterNumber"];
$tl=$row["SUM(Score)"];
  echo '<li value="'.$tl.'"><div class="collapsible-header"><i class="material-icons">person_outline</i><span class="tp"><span class="tpl">'.$row["Name"].'</span><span class="btm" >'.$reg.'</span><span class="btc">'.$row["COUNT(Indicator)"].'</span><span class="sd text-muted">'.$cls.'</span></span></div>';
   echo '<div class="collapsible-body">';
$sql = "SELECT Indicator,Score FROM {$cls} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
$resl = $conn->query($sql);
/*if ($resl ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
if ($resl->num_rows > 0) {
    // output data of each row
  while($rows = $resl->fetch_assoc()) {
 echo '<span class="itl">'.$rows["Indicator"].'</span><span class="flr itl">'.$rows["Score"].'</span><hr>';
 //$tl+=$rows["Score"];
}//wh
}//if
echo '<span class="ttl">'."Total".'</span> <span class="flr tls">'.$tl.'</span>';
//$tl=0;
 echo ' </div> ';
echo '</li>';
}}

}//for
//echo '<br>';
}//for
}//fv if


  
if("last"==$_POST['a']){
$tname = preg_replace("/[^A-Z0-9]/", "",$_POST['tname']);
$mnt= $_POST['mnt'];

if(strlen($tname)>11) { 
$sql = "SELECT * FROM {$tname} WHERE mentor='{$mnt}' ORDER BY ID DESC LIMIT 5";

$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }

if ($result->num_rows > 0) {
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

if ($result->num_rows > 0) {
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

if ($result->num_rows > 0) {
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

if("check"==$_POST["logout"]){
//session_start();

  $user =$_SESSION['spiusername'];
  $pass =$_SESSION['spipassword'];

   $sql = "SELECT username,password  FROM Staff";
$result = $conn->query($sql);

if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
  
if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){
     if($row["username"]==$user){
        if($row["password"]==$pass){
		  $chkd="True";
		break;
       }else{$chkd="False";}//ps
     }else{$chkd="False";}//u if
    }//wh
	if("False"==$chkd){
	session_destroy();
	 }
    echo $chkd;
    }//res
}//ch if

if("sview"==$_POST['a']){
  $slot=$_COOKIE['slot'];
  $reg=$_COOKIE['studreg'];
  $tname=$_COOKIE['tname'];
  
  $sql = "SELECT Indicator, COUNT(Indicator) FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' GROUP BY Indicator ORDER BY COUNT(Indicator) DESC";
$result = $conn->query($sql);
/*if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
  
if ($result->num_rows > 0) {
echo '<div id="tfs">';
    while($row = $result->fetch_assoc()){
echo '<p class="chip grey lighten-2">'.$row["Indicator"]." ".$row["COUNT(Indicator)"].'</p>';
}
 echo '</div><br>';
}//if

 $sql = "SELECT * FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
$result = $conn->query($sql);

/*if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
  
if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()){

echo' <li>
      <div class="collapsible-header umd"><i class="material-icons">note</i>'.$row["Indicator"].'</div>
      <div class="collapsible-body"><span class="mitl">Mode</span><span class="flrc itl">'.$row["Mode"].'</span><hr><span class="mitl">Level</span><span class="flrc itl">'.$row["Level"].'</span><hr><span class="mitl">Score</span><span class="flrc itl">'.$row["Score"].'</span><hr><span class="mitl">Slot</span><span class="flrc itl">'.$row["Slot"].'</span><hr><span class="mitl">Mentor</span><span class="flrc itl">'.$row["Mentor"].'</span></div>
    </li>';
}//wh
}//if
 $sql = "SELECT SUM(Score) FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
echo '<br><center><i class="small material-icons">flag</i><b id="tlm">'.$row["SUM(Score)"].'</b></center>';
}//if
  }//sv if
  
if("report"==$_POST['an']){
$dep=["CSE","ECE","EEE","MECH","CIVIL"];
if(date("m")>=06){
$Y=date("Y");
}else{
$Y=date("Y")-1;
}
$fi=$Y.$Y+4;
$tw=($Y-1).($Y-1)+4;
$th=($Y-2).($Y-2)+4;
$fo=($Y-3).($Y-3)+4;
for($a=0;$a<=4;$a++){
   $dept=$dep[$a];
 $tnm=[
$fi.$dept."A",
$fi.$dept."B",
$tw.$dept."A",
$tw.$dept."B",
$th.$dept."A",
$th.$dept."B",
//$fo.$dept."A",
//$fo.$dept."B",
];
$tl[$a]["dep"]=$dept;
for($i=0;$i<=5;$i++){
    $cls=$tnm[$i];
$sqtl ="SELECT SUM(Score) FROM  {$cls}";
$result = $conn->query($sqtl);
/*if ($result===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
if($i%2==0){$j="A";}else{$j="B";}
if($i<2){$k="1";}elseif($i>3){$k="3";}else{$k="2";}
 $tl[$a][$j.$k]=$row["SUM(Score)"];
  }//wh
  }//if
}//for
//totals can't add in jq ,num also as json object in js
$tl[$a][AB1]=$tl[$a][A1]+$tl[$a][B1];
$tl[$a][AB2]=$tl[$a][A2]+$tl[$a][B2];
$tl[$a][AB3]=$tl[$a][A3]+$tl[$a][B3];
$tl[$a][AB12]=$tl[$a][AB1]+$tl[$a][AB2]+$tl[$a][AB3];
 $dt[$a]=$tl[$a];
}//for
$js=["dep0"=>$dt[0],"dep1"=>$dt[1],"dep2"=>$dt[2],"dep3"=>$dt[3],"dep4"=>$dt[4]];
echo $js=json_encode($js);
}//rpt

if("y"==$_POST['cki']){
    $cookie_name = $_POST['cnm'];
  $cookie_value = $_POST['cvl'];
  if(strlen($cookie_value)<9){
  $cookie_value = "";
echo  $_COOKIE[$cookie_name]."as a default is cleared";
 setcookie($cookie_name, $cookie_value, time()- 60, "/","", 0);
}else{
    setcookie($cookie_name, $cookie_value, time() + (86400 * 60), "/"); // 86400 = 1 day
   echo  $cookie_value." is set to default";
   }
}//cki
  
if("delaccount"==$_POST['ae']){
 $user=$_SESSION['spiusername'];
 $pass=$_SESSION['spipassword'];
 $sql = "DELETE FROM Staff WHERE username='{$user}' AND password='{$pass}' ";
if($conn->query($sql)==TRUE){
session_destroy();
 }
}// del if 
  
  
   //end	 
$conn->close();
}//post if 
?>