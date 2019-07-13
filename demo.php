<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create database
/*$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} 
else {
    echo "Error creating database: " . $conn->error;
}
*/

$password = "vishakha";
$salt = sha1($password);
$password = sha1($password.$salt);

echo "The hashed password is :". $password;
echo "<br>";		

echo "<br>";		
//echo "<img src='adharcard.jpg' alt='photo of my dog' />";
echo "<br>";

// This function will return a random string of specified length 
	$random_str;
  function random_strings($length_of_string) 
    { 
    // sha1 the timstamps and returns substring of specified length 
    	$random_str = substr(sha1(time()), 0, $length_of_string);
    	return $random_str;
	} 
  
// This function will generate random string of length 10 
echo  "The random string is " .random_strings(10);

echo "\n"; 
echo "<br>";
echo "<br>";	

	//Hashing of image 
$img_hash = base64_encode('DB1_B/101_2.tif');
echo "The hash value of an image is " .$img_hash;
echo "<br>";	

//Salt value is prepended to the hash value of the image	
$salted = sha1($random_str.$img_hash);
echo "Salt hash image is ".$salted;

echo "<br>";
echo "<br>";	

$sql = "INSERT INTO store (Image_Hash, Salted_Value)
VALUES ('$img_hash', '$salted')";

if ($conn->query($sql) === TRUE) 
{
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}	

$conn->close();

?>