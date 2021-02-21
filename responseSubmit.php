<?php
echo("submitting response");
// Hide credentials in this gitignored file V
include("credentials.php");

//Submit response to database
$response = $_REQUEST["response"];

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

echo($response);
/*$sql = "INSERT INTO responses VALUES ('$response')";
if($conn->query($sql) === TRUE){
  echo "report submitted successfully";
  header('Location: success.html');
  redirect();
} else{
  echo "Error" . $sql . "<br>" . $conn->error;
}
*/
$conn->close();
 ?>
