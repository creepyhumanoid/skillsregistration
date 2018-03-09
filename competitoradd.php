<?php
$con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
if (isset($_POST['firstname'])) {
	$firstname = $_POST['firstname'];
	$mi = $_POST['mi'];
	$lastname = $_POST['lastname'];
	$country = $_POST['country'];
	$skill = $_POST['skill'];

	$check = mysqli_query($con,"SELECT * FROM tblcompetitors WHERE `firstname`='$firstname' AND `mi`='$mi' AND `lastname`='$lastname'");
	$checkrows = mysqli_num_rows($check);
	if ($checkrows>0) {
		$exist = "Competitor already exists!";
		echo "<script type='text/javascript'> alert('$exist'); window.location.href='newcompetitor.php';</script>";
	}
	else{
		$insert = "INSERT INTO `tblcompetitors`(`firstname`, `mi`, `lastname`, `country_id`, `skill_id`,`status_id`) VALUES ('$firstname','$mi','$lastname','$country','$skill',2)";
		$query = mysqli_query($con, $insert);
		$msg = "Competitor already added!";
		echo "<script>alert('$msg'); window.location.href='newcompetitor.php'</script>";
	}
}