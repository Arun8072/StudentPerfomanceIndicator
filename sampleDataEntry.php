<?php
$name_list=['James','John','Robert','Michael','William','David','Richard','Charles','Joseph','Thomas','Christopher','Daniel','Paul','Mark','Donald','George','Kenneth','Steven','Edward','Brian','Ronald','Anthony','Kevin','Jason','Matthew','Mary','Patricia','Linda','Barbara','Elizabeth','Jennifer','Maria','Susan','Margaret','Dorothy','Lisa','Nancy','Karen','Betty','Helen','Sandra','Donna','Carol','Ruth','Sharon','Michelle','Laura','Sarah','Patrick','Peter','Harold','Douglas','Henry','Carl','Arthur','Ryan','Roger','Joe','Juan','Jack','Albert','Jonathan','Justin','Terry','Gerald','Keith','Samuel','Willie','Ralph','Lawrence','Nicholas','Gary','Timothy','Jose','Larry','Jeffrey','Frank','Scott','Eric','Stephen','Andrew','Raymond','Gregory','Joshua','Jerry','Dennis','Walter','Kimberly','Deborah','Jessica','Shirley','Cynthia','Angela','Melissa','Brenda','Amy','Anna','Rebecca','Virginia','Kathleen','Pamela','Martha','Debra','Amanda','Stephanie','Carolyn','Christine','Marie','Janet','Catherine','Frances','Ann','Joyce','Diane','Alice','Julie','Heather','Teresa','Doris','Gloria','Evelyn','Jean','Cheryl','Mildred','Katherine'];
$inds=["Paper presentation","Workshop","Technical Event","Technical Seminar","Implant Training","Industrial visit","Project","Certified Course","Training","Journal","Guest lecture","Patent"];
$modes=[
  "Internal",
  "External",
  "Salem",
  "Outer",
  "Online",
  "Offline",
  "Tamizh",
  "English",
  "Life Skill"
];
$levels=[
  "Participated",
  "Winner",
  "One_day",
  "More_than_1d",
  "Applied",
  "Published",
  "Level1",
  "Level2",
  "Trainer",
  "Less_than_4d",
  "Less_than_8d",
  "More_than_7d"
];
$sem=[
  "sem1",
  "sem2",
  "sem3",
  "sem4",
  "sem5",
  "sem6",
  "sem7",
  "sem8"
];

$slot=["slot1","slot2","slot3"];
$scrs=["5","10","15","20","25","30","35","40","45","50"];
$mnts=["Hari","Priya","Deepan"];

//for same students get multiple works ramdomlly compare with prime numbers
function isPrime($number){
    if ($number == 1)
    return 0;
    for ($i = 2; $i <= $number/2; $i++){
        if ($number % $i == 0)
            return 0;
    }
    return 1;
}

    //MySQLi Object-oriented(php with mysql) is used in all
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
$allYear[0]=$fi=($currentYear).(($currentYear)+($ug_duration));
$allYear[1]=$tw=($currentYear-1).( ($currentYear-1)+($ug_duration) );
$allYear[2]=$th=($currentYear-2).( ($currentYear-2)+($ug_duration) );
$allYear[3]=$fo=($currentYear-3).( ($currentYear-3)+($ug_duration) );

$depart=["cse","ece","eee","mech","civil"];
$section=["a","b"];

$clgcode="6201";
$departCode=["104","106","105","114","103"];

$rollnum_length = 3;

for ($loopvar1=0; $loopvar1 < count($allYear); $loopvar1++) { 
    for ($loopvar2=0; $loopvar2 < count($depart); $loopvar2++) { 
        for ($loopvar3=0; $loopvar3 < count($section); $loopvar3++) { 
           $tname = $allYear[$loopvar1]. $depart[$loopvar2]. $section[$loopvar3] ;

            
                // sql to create table
$tableSqlt = "CREATE TABLE IF NOT EXISTS {$tname} (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, RegisterNumber VARCHAR(12) NOT NULL, Name VARCHAR(30) NOT NULL,Indicator VARCHAR(20) NOT NULL,Mode VARCHAR(10),Level VARCHAR(12),Slot VARCHAR(9),Score VARCHAR(3) NOT NULL,Mentor VARCHAR(25) NOT NULL )";
if ($conn->query($tableSqlt) === false) {
                echo "<br>Error creating table: " . $conn->error;
            } else {
             echo "{$tname} Table created successfully <br>";
         }
            //$sqlt = "INSERT INTO {$tname} (RegisterNumber,Name,Indicator,Mode,Level,Slot,Score,Mentor)VALUES ('$reg','$Name','$ind','$mode','$level','$slot','$scr','$mnt') ";
                
             // prepare and bind
             $stmt = $conn->prepare("INSERT INTO {$tname} (RegisterNumber,Name,Indicator,Mode,Level,Slot,Score,Mentor) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("isssssis",$regnum, $Name, $ind, $mode, $level, $semslot, $scr, $mnt);
            
            //to follow roll number for class a to b
            if ($loopvar3==0) {
               $regStart=1;
                $regEnd=30;
            }elseif ($loopvar3==1) {
               $regStart=31;
                $regEnd=60;
            }
            $loopvar5=0; //for names
             for ($loopvar4=$regStart; $loopvar4 <= $regEnd; $loopvar4++) { 
                // Left padding if number < $str_length
                $rollNum = substr("0000{$loopvar4}", -$rollnum_length);
                
                $regYear= preg_split('//', $allYear[$loopvar1] , -1, PREG_SPLIT_NO_EMPTY);
                $regYear=implode(array_slice($regYear,2,2));

                 // set parameters and execute
              $regnum = $clgcode.$regYear.$departCode[$loopvar2].$rollNum;
              $Name = $name_list[$loopvar5];
              $ind=$inds[rand(0,count($inds)-1)];
              $mode=$modes[rand(0,count($modes)-1)];
              $level=$levels[rand(0,count($levels)-1)];
             // $semslot=$sem[rand(0,count($sem)-1)].$slot[rand(0,count($slot)-1)];
              $scr=$scrs[rand(0,count($scrs)-1)];
              $mnt=$mnts[rand(0,count($mnts)-1)];

             //($loopvar5>13)?$loopvar5=0:$loopvar5++;
              $loopvar5++;
             //echo $regnum."".$name."<br>";

                
             if (!$stmt->execute()) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
                } else {
                    echo "New record inserted successfully for {$regnum}\n<br>";
                }

           // to get ramdomlly comparing with prime
                if (isPrime(rand(0,200))) {
                    //changing only below values and keeping the name ,regnum same for same student get multiple works
                    $ind=$inds[rand(0,count($inds)-1)];
                    $mode=$modes[rand(0,count($modes)-1)];
                    $level=$levels[rand(0,count($levels)-1)];
                    $scr=$scrs[rand(0,count($scrs)-1)];
                    $stmt->execute();
                }
                
                //for more semesters
                for ($loopvar7=0; $loopvar7 < 3; $loopvar7++) { 
                    $semslot=$sem[rand(0,count($sem)-1)].$slot[rand(0,count($slot)-1)];
                    $stmt->execute();
                }//loopvar7

            }//for loopvar4


           




        }//for loopvar3
     }//for loopvar2
 } //for loopvar1
    $stmt->close();
    
           $sql = "CREATE TABLE IF NOT EXISTS Staff (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(20) UNIQUE NOT NULL,password VARCHAR(35) NOT NULL,CC VARCHAR(14),class1 VARCHAR(14))";
           if ($conn->query($sql) ===FALSE) {
   echo "<br>Error Creating table: " . $conn->error;
}

// prepare and bind
         $stmt = $conn->prepare("INSERT INTO Staff (username,password,CC,class1) VALUES (?,?,?,?) ");
            $stmt->bind_param("ssss",$username, $password, $cc, $class1);

$passwords=["Hari@1234","Priya@1234","Deepan@1234"];
//below should be updated frequently
$ccs=["20242028csea","20242028cseb","20232027csea"];
$class1s=["20242028ecea","20232027eeea","20242028mechb"];

for ($loopvar6=0; $loopvar6 <3 ; $loopvar6++) { 
    $username=$mnts[$loopvar6];
    $password=MD5($passwords[$loopvar6]);
    $cc=$ccs[$loopvar6];
    $class1=$class1s[$loopvar6];

                if (!$stmt->execute()) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
                } else {
                    echo "New record inserted successfully for {$regnum}\n<br>";
                }
           
}
    $conn->close();


?>
