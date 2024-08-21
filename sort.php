<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    exit(session_destroy());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set("Asia/Kolkata");
    //MySQLi Object-oriented(php with mysql) is used here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spi";
    //first create database in phpmyadmin  so that you can connect here
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<br>Connection failed: " . $conn->connect_error);
    }

if("dview"==$_POST['a']){
  if(isset($_COOKIE["slot"])){
          $slot=$_COOKIE["slot"];
        }else{
          $slot = "sem1slot1";
        }
 $dept=$_POST['dept'];
 $ug_duration=4;
 $pg_duration=2;
 $semesterDuration=06;

if(date("m")>=$semesterDuration){
 //current year in semester
 $currentYear=date("Y");
}else{
  //for final semester 
 $currentYear=date("Y")-1;
}
//UG
// clg year=current year - final year 
$fi=($currentYear).(($currentYear)+($ug_duration));
$tw=($currentYear-1).( ($currentYear-1)+($ug_duration) );
$th=($currentYear-2).( ($currentYear-2)+($ug_duration) );
$fo=($currentYear-3).( ($currentYear-3)+($ug_duration) );
//PG
$mfi=$currentYear.( $currentYear+($pg_duration) );
$mtw=($currentYear-1).( ($currentYear-1)+($pg_duration) );

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
  
if ($result==true && $result->num_rows > 0) {
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
  if(isset($_COOKIE["slot"])){
          $slot=$_COOKIE["slot"];
        }else{
          $slot = "sem1slot1";
        }

$dep=["CSE","ECE","EEE","MECH","CIVIL"];
$ug_duration=4;
 $pg_duration=2;
 $semesterDuration=06;

if(date("m")>=$semesterDuration){
 //current year in semester
 $currentYear=date("Y");
}else{
  //for final semester 
 $currentYear=date("Y")-1;
}
//UG
// clg year=current year - final year 
$fi=($currentYear).(($currentYear)+($ug_duration));
$tw=($currentYear-1).( ($currentYear-1)+($ug_duration) );
$th=($currentYear-2).( ($currentYear-2)+($ug_duration) );
$fo=($currentYear-3).( ($currentYear-3)+($ug_duration) );
//PG
$mfi=$currentYear.( $currentYear+($pg_duration) );
$mtw=($currentYear-1).( ($currentYear-1)+($pg_duration) );

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

if ($result==true && $result->num_rows > 0) {
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

//end
    $conn->close();
}//post if
?>