<?php
$errors = array();  	// array to hold validation errors
$data = array();        // array to pass back data

// validate the variables ========
if (empty($_POST['user_name']))
	$errors['user_name'] = 'Name is required.';

if (empty($_POST['user_phone']))
	$errors['user_phone'] = 'Phone is required.';

if (empty($_POST['user_password']))
	$errors['user_password'] = 'Password is required.';

// return a response ==============

// response if there are errors
if ( ! empty($errors)) {

	// if there are items in our errors array, return those errors
	$data['success'] = false;
	$data['errors']  = $errors;
} else {
		$name = $_POST['user_name'];
		$phone = $_POST['user_phone'];
		$pass = $_POST['user_password'];
	
		$servername = "XXXXX";
		$username = "XXXXX";
		$password = "XXXXX";
		$dbname = "XXXX";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO user (name, phone, password)
		VALUES ('$name', '$phone', '$pass')";

		if ($conn->query($sql) === TRUE) {
			// if there are no errors, return a message
			$data['lastId'] = $conn->insert_id;
			$data['success'] = true;
			$data['message'] = 'New record created successfully!';
		} else {
			echo 
			$data['success'] = false;
			$data['message'] = "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	
}

// return all our data to an AJAX call
echo json_encode($data);
