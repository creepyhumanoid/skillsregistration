<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<div class="card" style="width: 100rem; margin-left:20em; border: none; margin-top: 2%;">
	<div class="card-block">
		<h3>Registered Competitors</h3><br>

		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>MI</th>
					<th>Last Name</th>
					<th>Country</th>
					<th>Skill</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
		            $comp = "SELECT * FROM tblcompetitors WHERE `status_id`=1";
		            $compquery = mysqli_query($con,$comp);
		            while ($con=mysqli_fetch_assoc($compquery)) {
						$conx = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');

						$cid = $con['country_id'];
						$sels = "SELECT * FROM tblcountry WHERE `ID`='$cid'";
						$squery = mysqli_query($conx,$sels);
						$fetchs = mysqli_fetch_assoc($squery);
						$country = $fetchs['country'];

						$skillid = $con['skill_id'];
						$sely = "SELECT * FROM tblskills WHERE `ID`='$skillid'";
						$yquery = mysqli_query($conx,$sely);
						$fetchy = mysqli_fetch_assoc($yquery);
						$skill = $fetchy['skill'];

						$statusid = $con['status_id'];
						$selstatus = "SELECT * FROM tblstatus WHERE `ID`='$statusid'";
						$statusquery = mysqli_query($conx,$selstatus);
						$fetchstatus = mysqli_fetch_assoc($statusquery);
						$status = $fetchstatus['status'];

						echo "<tr>";
						echo "<td>".$con['ID']."</td>";
						echo "<td>".$con['firstname']."</td>";
						echo "<td>".$con['mi']."</td>";
						echo "<td>".$con['lastname']."</td>";
						echo "<td>".$country."</td>";
						echo "<td>".$skill."</td>";
						echo "<td>".$status."</td>";
						echo "<td>"."<button type='button' class='btn btn-success' data-target='#restore-".$con['ID']."' data-toggle='modal'>RESTORE</button>"."</td>";
						echo "</tr>";
				?>
		<div class="modal fade" id="restore-<?php echo $con['ID']; ?>">
  				<div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h4 class="modal-title">RESTORE</h4>
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
      					</div>
      					<div class="modal-body" style="margin-top: 5%;">
         					<form role="form" id="contact-form" method="POST" action="competitorrestore.php">
            				<p>Do you really want this to restore?</p>
      						<div class="modal-footer">
						        <input type="hidden" name="id" id="id" value="<?php echo $con['ID']; ?>">
						        <button type="submit" class="btn btn-success">YES</button>
						        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
        						</form>
      						</div>
      					</div>
  					</div>
				</div>
	         </div>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'footer.html'; ?>