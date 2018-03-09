<?php 
	$con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
	if (isset($_POST['firstname'])) {
		$firstname = $_POST['firstname'];
		$mi = $_POST['mi'];
		$lastname = $_POST['lastname'];
		$country = $_POST['country'];
		$skill = $_POST['skill'];
		$id = $_POST['id'];

		$update = "UPDATE `tblcompetitors` SET `firstname`='$firstname',`mi`='$mi',`lastname`='$lastname',`country_id`='$country',`skill_id`='$skill' WHERE `ID`='$id'";
		$query = mysqli_query($con, $update);
		$msg = "Competitor already updated!";
		echo "<script>alert('$msg'); window.location.href='registered.php'</script>";
	}