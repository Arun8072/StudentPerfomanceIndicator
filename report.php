<?php

if("report"==$_POST['an']){
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
if ($result==true && $result->num_rows > 0) {
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
?>