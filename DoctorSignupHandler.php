<?php

$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
 $db = "sql12337112";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 

 $firstname = $_POST['FirstName'];
 $lastname = $_POST['LastName'];
 $phone = $_POST['PhoneNumber'];
  $address = $_POST['address'];
 $lang = $_POST['languages'];
$username = $_POST['email'];
 $password = $_POST['password'];
 $usertype = 'Doctor';
 $DoctorId = $_POST['doctorId']; 

  $sql = "INSERT INTO `users`(`firstname`, `lastname`, 'phonenumber', 'address', 'languages', `username`, `password`, `usertype`, `doctorid`) VALUES ('$firstname', '$lastname', '$phone', '$address', '$lang' '$username','$password', '$usertype', '$DoctorId')";

if ($conn->query($sql) === TRUE) {
    include("MAIN-SignUpPage-[Success].htm");
} else {
    include("MAIN-SignUpPage-[Failed].htm");
}

$conn->close();
//usertype
