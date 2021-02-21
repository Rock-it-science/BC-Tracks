<?php
echo("submitting response");

//Submit response to database
$response = $_REQUEST["response"];

//$conn = new mysqli($_ENV["db_servername"], $_ENV["db_username"], $_ENV["db_password"], $_ENV["db_name"]);

/*if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}*/
//echo($_ENV["db_servername");

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
//$conn->close();
 ?>
