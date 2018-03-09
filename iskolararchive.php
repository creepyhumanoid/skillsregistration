<?php
	$con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$update = "UPDATE `tbliskolars` SET `status_id`=1 WHERE `ID`='$id'";
		$query = mysqli_query($con,$update);
		$msg = "Compeitor already archived!";
		echo "<script>alert('$msg'); window.location.href='registered.php'</script>";
	}