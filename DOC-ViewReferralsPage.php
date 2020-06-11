<!-- view patient referrals -->

<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	 $db = "sql12337112";
	 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	 $doclastname = "smith"; 

	 $sqlValue = "SELECT * FROM `referral` WHERE `doc_lastname`='$doclastname'";
	 $resultValue = mysqli_query($conn,$sqlValue);
	if (mysqli_num_rows($resultValue) >= 1) {
		while($row = $resultValue->fetch_assoc()) {
			$patientfirstname = $row['pat_firstname'];
			$patientlastname = $row['pat_lastname'];
			$summary = $row['consultationSummary'];
		
		}
		$value = "$patientfirstname " . "$pat_lastname " . " was referred to you." . "Patient summary: " . "$summary"; 
	} else {
		$value=""; 
	} 
?>

<!DOCTYPE html>
<html> 
	<script src="https://kit.fontawesome.com/56b24aa4ed.js" crossorigin="anonymous"></script>
	<head>
		<title>Online Medical Centre</title> <!-- This is the title of the site that shows up in the tab feel free to change it -->
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
		
		<br>
		
		<<span class="returnToReferralsMenu"><a href="DOC-ReferralsMenuPage.htm"><p>&#8592; </p>Return to Referrals Menu</a></span>
		
		<br>
		
		
			<section class="contentContainer">
				<div class="viewReferral" id="viewReferral">
					<label for="viewReferralTitle" id="viewReferralTitle"><b>View Referrals</b></label>
					
					<hr>
					
					<input size="50" type="value" placeholder="referrals" name="referral" value="<?php echo $value ?>">
				
				</div>
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