<?php
// if("report"==$_POST['an']){
	

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

//for report section 
  $tl[$a]["dep"]=$dept;



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

//upto 7 for every 2 class in four years
for($ivl=0;$ivl<=7;$ivl++){
     $cls=$tnm[$ivl];

	  if($ivl%2==0){$jvl="A";}else{$jvl="B";}

	  if($ivl==0||$ivl==1){$kvl="0";}elseif($ivl==2||$ivl==3){$kvl="1";}elseif($ivl==4||$ivl==5){$kvl="2";}elseif($ivl==6||$ivl==7){$kvl="3";}

  	  $tl[$a][$jvl.$kvl]=0;
}//for
 $tl[$a]["AB0"]=0;
$tl[$a]["AB1"]=0;
$tl[$a]["AB2"]=0;
$tl[$a]["AB3"]=0;
$tl[$a]["AB03"]=0;
$dt[$a]=0;

for($i=0;$i<=5;$i++){
     $cls=$tnm[$i];
$sqtl ="SELECT SUM(Score) FROM  {$cls}";
$result = $conn->query($sqtl);
/*if ($result===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }*/
 
if ($result==true && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	 if($i%2==0){$j="A";}else{$j="B";}
	 if($i==0||$i==1){$k="0";}elseif($i==2||$i==3){$k="1";}elseif($i==4||$i==5){$k="2";}elseif($i==6||$i==7){$k="3";}
      $tl[$a][$j.$k]=$row["SUM(Score)"];
  }//wh
  }//if
}//for

//totals can't add in jq ,num also as json object in js
$tl[$a]["AB0"]=$tl[$a]["A0"]+$tl[$a]["B0"];
$tl[$a]["AB1"]=$tl[$a]["A1"]+$tl[$a]["B1"];
$tl[$a]["AB2"]=$tl[$a]["A2"]+$tl[$a]["B2"];
$tl[$a]["AB3"]=$tl[$a]["A3"]+$tl[$a]["B3"];
$tl[$a]["AB03"]=$tl[$a]["AB0"]+$tl[$a]["AB1"]+$tl[$a]["AB2"]+$tl[$a]["AB3"];
$dt[$a]=$tl[$a];

}//for

$js=["cse"=>$dt[0],"ece"=>$dt[1],"eee"=>$dt[2],"mech"=>$dt[3],"civil"=>$dt[4]];
$all=["dep"=>$js];
echo $all=json_encode($all);

//}//rpt
?>