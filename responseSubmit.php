<?php
echo("submitting response");

//Submit response to database
print_r($_POST);

/*echo("\n" . $_COOKIE['long'] . ", " . $_COOKIE['lat'] . ", " . date('Y-n-j H:i:s') .",
  ". $_POST['animal'] .",
  ". $_POST['species'] .",
  ". $_POST['notes'] .",
  ". $_POST['name'] .",
  ". $_POST['email']);
flush();*/

//Column logic
$risk = "No";
if($_POST["risk"] == "on"){
  $risk = "Yes";
}

$distress = "No";
if($_POST["distress"] == "on"){
  $distress = "Yes";
}

//echo(", " . $risk . ", " . $distress);

$conn = pg_connect('host=' . $_ENV["db_servername"] . '  dbname=' . $_ENV["db_name"] . ' user=' . $_ENV["db_username"] . ' password=' . $_ENV["db_password"])
 or die("Connection failed: " . pg_last_error());



$sql = "INSERT INTO reports VALUES (
  (SELECT MAX(qc_id) + 1 FROM reports),
  ST_GEOMFROMTEXT('MULTIPOINT(" . $_COOKIE['long'] . " " . $_COOKIE['lat'] . ")'),
  '" . $risk ."',
  '". $distress ."',
  '".date('Y-n-j H:i:s')."',
  '". $_POST['animal'] ."',
  '". $_POST['species'] ."',
  '". $_POST['notes'] ."',
  '". $_POST['name'] ."',
  '". $_POST['email'] . "')";

echo($sql);

pg_query($sql) or die('Query failed: ' . pg_last_error());

pg_close($conn);

?>
