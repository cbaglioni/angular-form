<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
	
	$servername = "satsai.com";
        $username = "mqnpkowp_angForm";
        $password = "angform";
        $dbname = "mqnpkowp_angForm";
	
	$request = json_decode($postdata);
    $id  = (int)$request->recordId;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query("SELECT * FROM user WHERE id='$id'");

	$outpone = "";
	while( $rs = $result->fetch_array(MYSQLI_ASSOC) ) {
		if ($outpone != "") {$outpone .= ",";}
		$outpone .= '{"Name":"'  . $rs["name"] . '",';
		$outpone .= '"Phone":"'   . $rs["phone"]        . '",';
		$outpone .= '"Password":"'. $rs["password"]     . '"}';
	}
	$outpone ='{"record":['.$outpone.']}';
	$conn->close();

	echo($outpone);
	
}
?>