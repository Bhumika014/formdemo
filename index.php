<?php
include 'config.php';
?>
<link href="bootstrap.min.css" rel="stylesheet">



<body>
<div class= "container-fluid">
<div class="row">
<div class="col-lg-6">
<h3>Inquiry Form</h3>


                <form  method="post" class = "form-horizontal" >
                    <div class="form-group">
<label for="text" class="col-sm-4 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="firstname" >
</div>
</div>
    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="lastname"  >
</div>
</div>
 <div class="form-group">
<label for="number_format" class="col-sm-4 control-label">Mobile No.</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="mobileno" >
</div>
</div>
<div class="form-group">
<label for="text" class="col-sm-4 control-label">Email id</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="emailid" >
</div>
</div> 
 <div class="form-group">
<label for="text" class="col-sm-4 control-label">Address</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="address" >
</div>
</div>                   
 
<div>            
 <div class="form-group">
<label for="text" class="col-sm-4 control-label"></label>
<div class="col-sm-8">
<button class="btn btn-lg btn-primary" type="submit" name="submit">
                            Next
							</div>
							</div>
                            </div>
						 </form>
						 
				   </div>
				   </div>
				</div>
	

  <table class="table">
  <tr> 
  <th>firstname</th>
  <th>lastname</th>
  <th>mobileno</th>
  <th>emailid</th>
  <th>address</th>
  </tr>
           <?php
            $result = mysqli_query($conn, "SELECT * FROM detail");
            if (mysqli_num_rows($result) == 0) {
                echo "
				<h4 class='alert alert-info'>No Record Found.</h4>
					
					"; } else { while ($row = mysqli_fetch_array($result)) { ?>
					<tr> 
					
						<td> <?php echo $row['firstname']; ?> </td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['mobileno']; ?></td>
						<td><?php echo $row['emailid']; ?></td>
						<td><?php echo $row['address']; ?></td>

						<td>

						
						<?php echo "<a href=\"delservice.php?id=$row[customerid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?>
                        <?php echo "<a href=\"edtservice.php?id=$row[customerid]\" onClick=\"return confirm('Are you sure you want to edit?')\">Edit</a>"; ?>

					</td>
					</tr>
					<?php
					}
					}
					?>
					</table>
				</div>
			</div>
			<?php
			ob_start();

			if ( isset( $_POST[ 'submit' ] ) != "" ) {

				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$mobileno = $_POST['mobileno'];
				$emailid = $_POST['emailid'];
				$address = $_POST['address'];

				
						$insert = mysqli_query( $conn, "INSERT INTO detail(firstname,lastname,mobileno,emailid,address)VALUES
                                          ('$firstname','$lastname','$mobileno', '$emailid','$address' )" );
					
					if ( $insert ) {
						echo( "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Data Insert Successfully!!')
                    window.location.href='index.php';
                    </SCRIPT>" );
					} else {
						$errormsg = "Something went wrong, Try again";
						echo "<script type='text/javascript'>alert('$errormsg');</script>";
					}
				} 
					die();
				
			
			ob_end_flush();
			?>
</body>
			