<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "mydb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 


	echo "JSH (Jumbling Salting Hashing) Algorithm ";
	echo "<br><br>";

	//Addition
	$random = rand(0,9);
	echo  "The random integer is :" .$random;

	//Selection
	$predefined_set = array("a","3","g","$","*","&","Q","^","e","v");
	echo "<br><br>";
//	echo "<br>";
	echo "The character selected is :". $predefined_set[$random];

	$pwd = "Hello";
	echo "<br><br>";

	$img = "DB1_B/101_2.tif";
	$data = base64_encode($img); //Image to string conversion
  
// Display the output 
	echo  "Image to string conversion is :" .$data; 
	echo "<br><br>";

	//$process_array = $pwd.$predefined_set[$random];
	$process_array = $data.$predefined_set[$random];
	echo "The string after appending character :" .$process_array;

	
	/*$x = strlen($pwd);
	echo "The length of the password is :" .$x;*/
	echo "<br><br>";

	$FIX = $random + 1;

	if(($FIX % 2) == 0)
	{
		$process_array = strrev($process_array);
		echo "The reverse process is :".$process_array;
		echo "<br><br>";
	}
	else
	{
		$process_array = $process_array;
	}

echo "<br>";

$random_str;
  function random_strings($length_of_string) 
    { 
    // sha1 the timstamps and returns substring of specified length 
    	$random_str = substr(sha1(time()), 0, $length_of_string);
    	return $random_str;
	} 
  
// This function will generate random string of length 10 
echo  "The random string is " .random_strings(10);
echo "<br><br>";

$salt_value = random_strings(10).$process_array;
echo "Salt value is :" .$salt_value;
echo "<br><br>";

$hashvalue = sha1($salt_value);
echo "Hashed value is :" .$hashvalue;
echo "<br><br>";

	$sql = "INSERT INTO store2 (Hashed_Value)
	VALUES ('$hashvalue')";

	if ($conn->query($sql) === TRUE) 
	{
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	

	$conn->close();

?>