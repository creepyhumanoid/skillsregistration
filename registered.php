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
		            $comp = "SELECT * FROM tblcompetitors WHERE `status_id`=2";
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
						echo "<td>"."<button type='button' class='btn btn-info' data-target='#edit-".$con['ID']."' data-toggle='modal'><span class='fa fa-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger' data-target='#archive-".$con['ID']."' data-toggle='modal'>DELETE</button>"."</td>";
						echo "</tr>";
				?>
				<div class="modal fade" id="archive-<?php echo $con['ID']; ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							    <h4 class="modal-title">ARCHIVE</h4>
							    <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body" style="margin-top: 5%;">
							    <form role="form" id="contact-form" method="POST" action="competitorarchive.php">
							    <p>Do you really want to delete this competitor?</p>
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
				<div class="modal fade" id="edit-<?php echo $con['ID']; ?>">
				  	<div class="modal-dialog">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h4 class="modal-title">EDIT</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
				      		</div>
				      		<div class="modal-body">
				         		<form role="form" id="contact-form" method="POST" action="competitoredit.php">
				                <div class="form-group">
				                	<label for="firstname">First Name</label>
				                   	<div class="input-group">
				                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
				                        	<input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $con['ID']; ?>">
				                        	<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $con['firstname']; ?>">
				                    </div>
				                </div>
				                <div class="form-group">
				                	<label for="mi">Middle Initial</label>
				                   	<div class="input-group">
				                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
				                        	<input type="text" class="form-control" id="mi" name="mi" value="<?php echo $con['mi']; ?>">
				                    </div>
				                </div>
				                <div class="form-group">
				                	<label for="lastname">Last Name</label>
				                   	<div class="input-group">
				                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
				                        	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $con['lastname']; ?>">
				                    </div>
				                </div>
				                <div class="form-group">
					                <label for="sel1">Select Country:</label>
					                <select class="form-control" id="country" name="country" style="height: 10%;">
					                    <?php
					                      $con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
					                      $selschool = "SELECT * FROM tblcountry";
					                      $schoolquery = mysqli_query($con,$selschool);
					                      while ($con=mysqli_fetch_assoc($schoolquery)){
					                        if ($country == $con['country']) {
					                          echo "<option selected='selected' value='".$con['ID']."'>".$con['country']."</option>";
					                        }
					                        else{
					                          echo "<option value='".$con['ID']."'>".$con['country']."</option>";
					                        }
					                      }
					                    ?>
				                  	</select>
					            </div>
					            <div class="form-group">
					                <label for="sel1">Select Skill:</label>
					                <select class="form-control" id="skill" name="skill" style="height: 10%;">
					                    <?php
					                      $con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
					                      $selschool = "SELECT * FROM tblskills";
					                      $schoolquery = mysqli_query($con,$selschool);
					                      while ($con=mysqli_fetch_assoc($schoolquery)){
					                        if ($skill == $con['skill']) {
					                          echo "<option selected='selected' value='".$con['ID']."'>".$con['skill']."</option>";
					                        }
					                        else{
					                          echo "<option value='".$con['ID']."'>".$con['skill']."</option>";
					                        }
					                      }
					                    ?>
				                  	</select>
					            </div>
							<div class="modal-footer">
								<input type="submit" class='btn ' id="btn" value="Save"/>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</form>
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