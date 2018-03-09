<?php
	$con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$update = "UPDATE `tbliskolars` SET `tblcompetitors`=2 WHERE `ID`='$id'";
		$query = mysqli_query($con,$update);
		$msg = "Iskolar already restore!";
		echo "<script>alert('$msg'); window.location.href='archived.php'</script>";
	}