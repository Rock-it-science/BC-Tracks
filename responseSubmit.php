<?php
echo("submitting response");

//Submit response to database
print_r($_POST);

echo("\n" . $_COOKIE['long'] . ", " . $_COOKIE['lat'] . ", " . date('Y-n-j H:i:s') .",
  ". $_POST['animal'] .",
  ". $_POST['species'] .",
  ". $_POST['notes'] .",
  ". $_POST['name'] .",
  ". $_POST['email']);
flush();

//Column logic
$risk = false;
if($_POST["risk"] == "on"){
  $risk = true;
}

$distress = false;
if($_POST["distress"] == "on"){
  $distress = true;
}

echo(", " . $risk . ", " . $distress);

/*$conn = pg_connect('host=' . $_ENV["db_servername"] . '  dbname=' . $_ENV["db_name"] . ' user=' . $_ENV["db_username"] . ' password=' . $_ENV["db_password"])
 or die("Connection failed: " . pg_last_error());
*/


/*$sql = "INSERT INTO responses VALUES (
  (SELECT MAX(qc_id) + 1 FROM reports),
  ST_GEOMFROMTEXT(\"MULTIPOINT(" . $_COOKIE['long'] . " " . $_COOKIE['lat'] . "\"),
  ". $Risk .",
  ". $distress .",
  DATETIME(".time().") .",
  ". $_POST['Animal'] .",
  ". $_POST['Species'] .",
  ". $_POST['Notes'] .",
  ". $_POST['Name'] .",
  ". $_POST['Email']"
)";

echo($sql);*/

/*
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
