<!-- DOCTOR MANAGE CONSULTATIONS PAGE -->

<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	 $db = "sql12337112";
	 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	 $patientname = "karen"; 

	 $sqlValue = "SELECT * FROM `booking` WHERE `patientname`='$patientname'";
	 $resultValue = mysqli_query($conn,$sqlValue);
	if (mysqli_num_rows($resultValue) >= 1) {
		while($row = $resultValue->fetch_assoc()) {
			$time = $row['time'];
			$day = $row['day'];
			$month = $row['month'];
			$doctorname = $row['doctorname'];
		
	}
	$value = "Your booking is at " . "$time on " . "$day/$month " . " with $doctorname."; 
	} else {
		$value=""; 
	}


		$time = $_POST['time'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$doctorname = $_POST['doctorname'];


	//if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['submit'])) {
		if (empty($time) || empty($day) || empty($month) || empty($doctorname)) { 
		$message = "Please fill in all fields"; 
	}
	else { 
	$sql = "SELECT * FROM `users` WHERE `usertype`='Doctor' and `lastname`='$doctorname'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) == 1) {
	//Pass
		$query = "INSERT INTO `booking` (`time`, `day`, `month`, `doctorname`, `patientname`) VALUES ('$time', '$day', '$month','$doctorname', '$patientname')";
		if ($conn->query($query) === TRUE) {
		$value = "Your booking is at " . "$time on " . "$day/$month " . " with $doctorname."; 
	} else {
		$message = "Could not add to database";
	}
		
	} else {
		$message = "Doctor name does not exist"; 
	//Fail
	}
	} 
	}


	if(isset($_POST['delete'])) {
		
		$sql2 = "DELETE FROM `booking` WHERE `patientname`='$patientname'";
		$result2 = mysqli_query($conn,$sql2);
	if (mysqli_affected_rows($conn) > 0) {
	//Pass
		$message = "Booking deleted"; 
		 }else {
		$message = "no booking existed"; 
	//Fail
	}
		}




	$conn->close();
?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Consultations</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
		<link rel="stylesheet" href="WebsiteStyling.css"> <!-- The css file -->
		<script src="WebsiteScript.js"></script> <!-- the javascript file -->
		<link rel="icon" type="image/x-icon" href="favicon.ico"/> <!-- icon file -->
	</head>	
	<body>
		<!-- fixed top navigation bar -->
		<header>
			<div class="navigation" id="nav"> 
				<a id="websiteHeading" href="#websiteHeading" onclick="window.location.href='DOC-HomePage.htm'"><i class="fas fa-clinic-medical"></i><b> Online Medical Centre</b></a>
				<div class="navbar-right">
					<a href="#home" onclick="window.location.href='DOC-HomePage.htm'"><i class="fas fa-home"></i><b> Home</b></a>
					<a href="#consultations" onclick="window.location.href='DOC-ConsultationPage.php'"><i class="fas fa-calendar-alt"></i><b> Consulations</b></a>
					<a href="#accountSettings" onclick="window.location.href='DOC-UserSettingPage.php'"><i class="fas fa-user-cog"></i><b> My Account</b></a>
					<a href="#logout" onclick="window.location.href='index.html'"><i class="fas fa-sign-out-alt"></i><b> Log Out</b></a>
				</div>
				
				<!-- change to toggle menu if the window size is too small to fit top navigation bar comfortably -->
				<a href="javascript:void(0);" class="icon" onclick="navbarResize()"> 
					<i class="fa fa-bars"></i>
				</a>
			</div>
		</header>
		
		<!-- content body of website -->
		<div class="body">
			<section class="contentContainer">
				<form class="doctorConsultation" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
					<div class="doctorConsultation" id="doctorConsultation">
						<label for="doctorConsultationTitle" id="doctorConsultationTitle"><b>Manage Consultations</b></label>
						
						<hr>
						
						<label for="appointmentListTitle" id="appointmentListTitle"><b>Appointment Timetable</b></label>
						
						<br>
						
						<input size="50" type="value" placeholder="No current bookings" name="booking" value="<?php echo $value ?>">
						
						<br>
						
						<label for="BookorChangeConsultationTitle" id="BookorChangeConsultationTitle"><b>Change Consultations</b></label>
						<p>Fill in the following fields to make <b>ammendments</b> to consultations.</p>
						
						<label for="time"><b>Time (24-Hour Time)</b></label>
							<input type="text" placeholder="e.g. 09:00" maxlength="4" name="time" value="">
							
						<label for="day"><b>Day</b></label>
							<input type="text" placeholder="e.g. 1-31" maxlength="2" name="day" value="">
						
						<label for="month"><b>Month</b></label>
							<input type="text" placeholder="e.g. 1-12" maxlength="2" name="month" value="">
							
						<label for="docName"><b>Doctor Name (lastname)</b></label>
							<input type="text" placeholder="e.g. smith" name="doctorname" value="">
						
						<br>
						
						<button type="submit" name="delete" id="deletebtn">Delete</button>
						
						<button type="reset" name="clear" id="clearbtn">Clear</button>
					</div>
					<div class="doctorConsultation" style="background-color:#f1f1f1">
						<p style="color:red" name="error"><?php echo $message ?></p>
					</div>
				</form>
			</section>
		</div>
		
		<!-- fixed footer bar -->
		<div class="footer">
			<div class="etcDetails">
				<a href="MAIN-FAQPage.htm">FAQ</a>
				<a href="MAIN-Terms&ConditionsPage.htm">Terms &amp; Conditions</a>
				<a href="MAIN-PrivacyPage.htm">Privacy</a>
				<a href="MAIN-SecurityPage.htm">Security</a>
			</div>
			
			<p id="copyRight">&copy; 2020 Online Medical Centre - All Rights Reserved.</p>
		</div>
	</body>
</html>