<?php
echo("submitting response");

//Submit response to database
print_r($_POST);

/*$conn = pg_connect('host=' . $_ENV["db_servername"] . '  dbname=' . $_ENV["db_name"] . ' user=' . $_ENV["db_username"] . ' password=' . $_ENV["db_password"]);
 or die("Connection failed: " . pg_last_error());*/

/*$sql = "INSERT INTO responses VALUES ('$response')";
if($conn->query($sql) === TRUE){
  echo "report submitted successfully";
  header('Location: success.html');
  redirect();
} else{
  echo "Error" . $sql . "<br>" . $conn->error;
}
*/
//pg_close($conn);
 ?>
