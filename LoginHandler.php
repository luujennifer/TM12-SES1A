<?php

$dbhost = "sql12.freesqldatabase.com";
 $dbuser = "sql12337112";
 $dbpass = "yacY8zPDxP";
 $db = "sql12337112";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 $username = $_POST['email'];
 $password = $_POST['password'];

 $sql = "SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) == 1) {
//Pass
	echo 'login Successful<br>';
	while($row = $result->fetch_assoc()) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $usertype = $row['usertype'];
    echo 'Hello ' . $firstname . ' ' . $lastname . ' you are a ' . $usertype;
} }else {
	echo 'Incorrect username or password';
//Fail
}
//if ($conn->query($sql) === TRUE) {
  //  echo "Login Successful!";
//} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error;
///}


$conn->close();