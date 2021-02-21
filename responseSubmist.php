<?php
//Submit response to database

$response = $_REQUEST["response"];

$servername = "db.qgiscloud.com";
$username = "gdhgzh_mlqjvs";
$password = "891488c4";
$dbname = "gdhgzh_mlqjvs";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

//$sql = "INSERT INTO responses VALUES ('$response')";
$sql = "INSERT INTO reports VALUES ()";
if($conn->query($sql) === TRUE){
  echo "report submitted successfully";
  header('Location: success.html');
  redirect();
} else{
  echo "Error" . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
