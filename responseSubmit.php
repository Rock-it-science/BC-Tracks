<?php
echo("submitting response\n");

//Submit response to database
print_r($_POST);

//Column logic
$animal = $_POST["animal"];
if($animal == "Other"){
  $animal = $_POST["animal_other"];
}

$risk = "No";
if($_POST["risk"] == "on"){
  $risk = "Yes";
}

$distress = "No";
if($_POST["distress"] == "on"){
  $distress = "Yes";
}

// DB connection
$conn = pg_connect('host=' . $_ENV["db_servername"] . '  dbname=' . $_ENV["db_name"] . ' user=' . $_ENV["db_username"] . ' password=' . $_ENV["db_password"])
 or die("Connection failed: " . pg_last_error());

// Form Query
$sql = "INSERT INTO reports VALUES (
  (SELECT MAX(qc_id) + 1 FROM reports),
  ST_GEOMFROMTEXT('MULTIPOINT(" . $_COOKIE['long'] . " " . $_COOKIE['lat'] . ")'),
  '" . $risk ."',
  '". $distress ."',
  '".date('Y-n-j H:i:s')."',
  '". $animal ."',
  '". $_POST['species'] ."',
  '". $_POST['notes'] ."',
  '". $_POST['name'] ."',
  '". $_POST['email'] . "')";

echo($sql);

// Execute Query
pg_query($sql) or die('Query failed: ' . pg_last_error());

//Email if risk
/*if($risk == "Yes"){
  //Check for municipality
  $sql2 = '
  WITH mb AS (
  	SELECT
  		id,
  		"ED_NAME",
  		(dumped).geom AS poly
  	FROM (SELECT id, "ED_NAME", ST_DUMP(geom) AS dumped FROM municipal_boundaries) s
  )

  SELECT r.qc_id, r."Risk", r."Animal", mb."ED_NAME", mb.id
  FROM
  	reports r
  	CROSS JOIN mb
  WHERE
  	ST_CONTAINS(ST_TRANSFORM(mb.poly, ST_SRID(r.wkb_geometry)), r.wkb_geometry)
  	AND qc_id = (SELECT MAX(qc_id) FROM reports)
  ';
  $result = pg_query($sql2);
  $zone = pg_fetch_array($result, null, PGSQL_ASSOC);
  print_r($zone);
}*/


pg_close($conn);

// Thank user for leaving report
echo('<script>alert("Thank you for leaving a report");</script>');
sleep(2);
// Redirect back to main page
header("Location: index.html");
die();


?>
