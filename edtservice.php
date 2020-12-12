<?php
include('config.php');
$id = $_GET['id'];
$sql = "select * from detail where customerid='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit']) != "") {
    $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	$mobileno = $_POST['mobileno'];
	 $emailid = $_POST['emailid'];
	  $address = $_POST['address'];

    $qry = "update detail set
					firstname='$firstname', lastname='$lastname', mobileno='$mobileno', emailid='$emailid', address='$address' 
					
					where customerid='$id'";
    $update = mysqli_query($conn, $qry);

    if ($update) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Details Update Successfully!!')
                    window.location.href='index.php';
                    </SCRIPT>");
    } else {
        $errormsg = "Something went wrong, Try again";
        echo "<script type='text/javascript'>alert('$errormsg');</script>";
    }
}
?>
<link href="bootstrap.min.css" rel="stylesheet">



<body>
<div class= "container-fluid">
<div class="row">
<div class="col-lg-6">
<h3>Inquiry Form</h3>


                <form  method="post" class = "form-horizontal">
                    <div class="form-group">
<label for="text" class="col-sm-4 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" >
</div>
</div>
    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>"  >
</div>
</div>
 <div class="form-group">
<label for="number_format" class="col-sm-4 control-label">Mobile No.</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="mobileno" value="<?php echo $row['mobileno']; ?>" >
</div>
</div>
<div class="form-group">
<label for="text" class="col-sm-4 control-label">Email id</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="emailid" value="<?php echo $row['emailid']; ?>">
</div>
</div> 
 <div class="form-group">
<label for="text" class="col-sm-4 control-label">Address</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
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
	

 
</body>
			