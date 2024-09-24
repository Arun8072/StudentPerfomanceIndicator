<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

//MySQLi Object-oriented(php with mysql) is used here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bot";
//first create database in phpmyadmin  so that you can connect here

// Create connection
$conn = new  mysqli($servername,$username,$password,$dbname);

 // Check connection
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}

// getting user message through ajax
// $getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$getMesg = $_POST['text'];

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%' ";
//run query
$result = $conn->query($check_data);

// if user query matched to database query we'll show the reply otherwise it go to else statement
if ($result->num_rows > 0) {
 
 //fetching replay from the database according to the user query
if($row = $result->fetch_assoc()){
//storing replay to a varible which well send to ajax
echo $replay = $row['replies'];
}

}else{
echo $replay ="Sorry can't be able to understand you!";
}

}
?>