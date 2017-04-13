<?php
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata)) {
	
	$data = array();
	$request2 = json_decode($postdata);
    	$id  = (int)$request2->recordId;
	
	$servername = "satsai.com";
	$username = "mqnpkowp_angForm";
	$password = "angform";
	$dbname = "mqnpkowp_angForm";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query("DELETE FROM user where id = '$id' LIMIT 1");
	if($result){
		$data['success'] = true;
		$data['message'] = "User Removed";
	}else{
		$data['success'] = false;
		$data['message'] = "User not Removed";
	}
	$conn->close();
	
}
?>