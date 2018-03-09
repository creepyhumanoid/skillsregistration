<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<h3 style="margin-left: 10em;">ADD COMPETITOR</h3><br>
<div class="col-md-5" style="margin-left: 15em;">
<form role="form" id="contact-form" method="POST" action="competitoradd.php">
                	<div class="form-group">
                		<label for="firstname">First Name</label>
                   		<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
                    		</div>
                		</div>

                	<div class="form-group">
                		<label for="firstname">Middle Initial</label>
                    	<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="mi" placeholder="Middle Initial" name="mi">
                    		</div>
                		</div>
	                <div class="form-group">
	                	<label for="firstname">Last Name</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
	                    </div>
	                </div>  
	      			</div>
	      			<div class="col-md-3" style="margin-left: 1em;">
	      				<div class="form-group">
	                  <label for="school">Select Country:</label>
	                  <select class="form-control" id="country" name="country" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
	                      $selcountry = "SELECT * FROM tblcountry";
	                      $countryquery = mysqli_query($con,$selcountry);
	                      while ($con=mysqli_fetch_assoc($countryquery)){
	                        echo "<option  value='".$con['ID']."'>".$con['country']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div>  
	                <div class="form-group">
	                  <label for="year">Select Skill:</label>
	                  <select class="form-control" id="skill" name="skill" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbcompetition") or die('Error connecting to MySQL server.');
	                      $selskill = "SELECT * FROM tblskills";
	                      $skillquery = mysqli_query($con,$selskill);
	                      while ($con=mysqli_fetch_assoc($skillquery)){
	                        echo "<option  value='".$con['ID']."'>".$con['skill']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div><br><br><br><br><br><br>
	                <button type="submit" class="btn btn-default" style="margin-left: 16em;">Submit</button>
	         	 	</div>
	         	 </form>
  			  <?php include 'footer.html'; ?>