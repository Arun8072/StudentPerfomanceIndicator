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

    //                    //
    if ("view" == $_POST['a']) {
        if(isset($_COOKIE["slot"])){
          $slot=$_COOKIE["slot"];
        }else{
          $slot = "sem1slot1";
        }
        $user = $_SESSION['spiusername'];
        $pass = $_SESSION['spipassword'];
        $sql = "SELECT CC,class1 FROM Staff WHERE username='$user' AND password='$pass' ";
        $result = $conn->query($sql);

        /*if ($result ===FALSE) {
        echo "<br>Select-User-Error : " .$conn->error;
        }*/

        if ($result==true && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $cc = $row["CC"];
                $class1 = $row["class1"];
                //  $class2=$row["class2"];
                // $class3=$row["class3"];
                
            }
        }

        if ("cc" == $_POST['class']) {
            $cls = $cc;
            if ("y" == $_POST['ord']) {
                $ord = 'ORDER BY SUM(Score) DESC ';
            }
            else {
                $ord = "";
            }
            $sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls}) AND Slot='{$slot}'  GROUP BY RegisterNumber {$ord}";
        } //Cc if
        if ("ccsd" == $_POST['class']) {
            $cls = $cc;
            if ("y" == $_POST['ord']) {
                $ord = 'ORDER BY SUM(Score) DESC ';
            }
            else {
                $ord = "";
            }
            $sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} WHERE Mentor='{$user}') AND Slot='{$slot}' GROUP BY RegisterNumber {$ord}";
        } //Cc if
        if ("c1" == $_POST['class']) {
            $cls = $class1;
            if ("y" == $_POST['ord']) {
                $ord = 'ORDER BY SUM(Score) DESC ';
            }
            else {
                $ord = "";
            }
            $sqtl = "SELECT RegisterNumber,Name,SUM(Score),COUNT(Indicator) FROM {$cls} WHERE RegisterNumber IN (SELECT DISTINCT RegisterNumber FROM {$cls} WHERE Mentor='{$user}') AND Slot='{$slot}' GROUP BY RegisterNumber {$ord}";
        }

        $result = $conn->query($sqtl);

        if ($result === false) {
            //echo "<br>Select-Error : ";
            //echo $conn->error;
            
        }
        elseif ($result==true && $result->num_rows > 0) {
            // output data of each row
            echo "<div class='center clsName mb-3'>".strtoupper($cls)."</div>";
            while ($row = $result->fetch_assoc()) {
                $reg = $row["RegisterNumber"];
                $tl = $row["SUM(Score)"];
                echo '<li value="' . $tl . '"><div class="collapsible-header"><i class="material-icons ib">person_outline</i><span class="tp" ><span class="tpl">' . $row["Name"] . '</span><span class="btm" >' . $reg . '</span><span class="btc">' . $row["COUNT(Indicator)"] . '</span><span class="sd text-muted" >' . $cls . '</span></span></div>';
                echo '<div class="collapsible-body">';
                $sql = "SELECT Indicator,Score FROM {$cls} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
                $resl = $conn->query($sql);
                if ($conn->query($sql) === false) {
                    echo "<br>Select-Error : " . $conn->error;
                }
                if ($resl->num_rows > 0) {
                    // output data of each row
                    while ($rows = $resl->fetch_assoc()) {
                        echo '<span class="itl">' . $rows["Indicator"] . '</span><span class="flr itl">' . $rows["Score"] . '</span><hr>';
                        // $tl+=$rows["Score"];
                        
                    } //wh
                    
                } //if
                echo '<span class="ttl">' . "Total" . '</span> <span class="flr tls">' . $tl . '</span>';
                //$tl=0;
                echo ' </div> ';
                echo '</li>';

            }
        }

    } //vi if
    

    if ("iview" == $_POST['a']) {
       if(isset($_COOKIE["slot"])){
          $slot=$_COOKIE["slot"];
        }else{
          $slot = "sem1slot1";
        }
        $user = $_SESSION['spiusername'];
        $pass = $_SESSION['spipassword'];

        $sql = "SELECT CC,class1 FROM Staff WHERE username='$user' AND password='$pass' ";
        $result = $conn->query($sql);

        if ($conn->query($sql) === false) {
            echo "<br>Select-User-Error : " . $conn->error;
        }

        if ($result==true && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $cc = $row["CC"];
                $class1 = $row["class1"];
            }
        }

        if ("cc" == $_POST['class']) {
            $cls = $cc;
        } //Cc if
        if ("c1" == $_POST['class']) {
            $cls = $class1;
        }
        $sqtl = "SELECT DISTINCT Indicator FROM {$cls} WHERE Mentor='{$user}' AND Slot='{$slot}' ";
        $result = $conn->query($sqtl);

        if ($result === false) {
            echo "<br>Select-Error : ";
            // echo $conn->error;
            
        }

        if ($result==true && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<li><div class="collapsible-header"><i class="material-icons">person_outline</i><span class="tp" > <span class="tpl">' . $row["Indicator"] . '</span> <span class="sd text-muted">' . $cls . '</span></span></div>';
                echo '<div class="collapsible-body">';
                $sql = "SELECT DISTINCT Name FROM {$cls} WHERE Indicator='{$row["Indicator"]}' AND Mentor='{$user}' AND Slot='{$slot}'  ";
                $resl = $conn->query($sql);
                if ($resl === false) {
                    echo "<br>Select-Error : " . $conn->error;
                }
                if ($resl->num_rows > 0) {
                    // output data of each row
                    while ($rows = $resl->fetch_assoc()) {
                        $sqln = "SELECT COUNT(Indicator) FROM {$cls} WHERE Name='{$rows["Name"]}' AND Indicator='{$row["Indicator"]}' AND Mentor='{$user}' AND Slot='{$slot}'";
                        $reslt = $conn->query($sqln);
                        /*if ($reslt===FALSE) {
                        echo "<br>Select-Error : " .$conn->error;
                        }*/
                        if ($reslt->num_rows > 0) {
                            // output data of each row
                            while ($ro = $reslt->fetch_assoc()) {
                                $re = $ro["COUNT(Indicator)"];
                            } //wh
                            
                        } //if
                        echo '<span class="itl">' . $rows["Name"] . '</span><span class="flr itl">' . $re . '</span><hr>';
                    } //wh
                    
                } //if
                echo ' </div> ';
                echo '</li>';

            }
        }

    } //i vi if
    

    /*
    if("check"==$_POST["logout"]){
    //session_start();
    
    $user =$_SESSION['spiusername'];
    $pass =$_SESSION['spipassword'];
    
    $sql = "SELECT username,password  FROM Staff";
    $result = $conn->query($sql);
    
    if ($result ===FALSE) {
    echo "<br>Select-Error : " .$conn->error;
    }
    
    if ($result==true && $result->num_rows > 0) {
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
    */
    if ("sview" == $_POST['a']) {
       if(isset($_COOKIE["slot"])){
          $slot=$_COOKIE["slot"];
        }else{
          $slot = "sem1slot1";
        }
        $reg = $_COOKIE['studreg'];
        $tname = $_COOKIE['tname'];

        $sql = "SELECT Indicator, COUNT(Indicator) FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' GROUP BY Indicator ORDER BY COUNT(Indicator) DESC";
        $result = $conn->query($sql);
        /*if ($result ===FALSE) {
        echo "<br>Select-Error : " .$conn->error;
        }*/

            echo "<div class='center clsName mb-3'>".strtoupper($tname)."</div>";
        if ($result==true && $result->num_rows > 0) {
            echo '<div id="tfs">';
            while ($row = $result->fetch_assoc()) {
                echo '<p class="chip grey lighten-2">' . $row["Indicator"] . " " . $row["COUNT(Indicator)"] . '</p>';
            }
            echo '</div><br>';
        } //if
        $sql = "SELECT * FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
        $result = $conn->query($sql);

        /*if ($result ===FALSE) {
        echo "<br>Select-Error : " .$conn->error;
        }*/

        if ($result==true && $result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                echo ' <li>
      <div class="collapsible-header umd"><i class="material-icons">note</i>' . $row["Indicator"] . '</div>
      <div class="collapsible-body"><span class="mitl">Mode</span><span class="flrc itl">' . $row["Mode"] . '</span><hr><span class="mitl">Level</span><span class="flrc itl">' . $row["Level"] . '</span><hr><span class="mitl">Score</span><span class="flrc itl">' . $row["Score"] . '</span><hr><span class="mitl">Slot</span><span class="flrc itl">' . $row["Slot"] . '</span><hr><span class="mitl">Mentor</span><span class="flrc itl">' . $row["Mentor"] . '</span></div>
    </li>';
            } //wh
            
        } //if
        $sql = "SELECT SUM(Score) FROM {$tname} WHERE RegisterNumber='{$reg}' AND Slot='{$slot}' ";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "<br>Select-Error : " . $conn->error;
        }
        if ($result==true && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<br><center><i class="small material-icons">flag</i><b id="tlm">' . $row["SUM(Score)"] . '</b></center>';
        } //if
        
    } //sv if
    

    //end
    $conn->close();
} //post if

?>
