<?php
$servername = "satsai.com";
$username = "mqnpkowp_angForm";
$password = "angform";
$dbname = "mqnpkowp_angForm";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT * FROM user");

$outp = "";
while( $rs = $result->fetch_array(MYSQLI_ASSOC) ) {
    if ($outp != "") {$outp .= ",";}
	$outp .= '{"Id":"'  . $rs["id"] . '",';
    $outp .= '"Name":"'  . $rs["name"] . '",';
    $outp .= '"Phone":"'   . $rs["phone"]. '",';
    $outp .= '"Password":"'. $rs["password"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>