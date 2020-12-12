<?php
include('config.php');
$id = $_GET['id'];
$sql = "select * from inqury where serviceid='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit']) != "") {
                $servicename = $_POST['servicename'];
				$servicedetail = $_POST['servicedetail'];
				$detailbrief = $_POST['detailbrief'];
				
                $ext = explode( ".", $_FILES[ "image" ][ "name" ] );
					$extention = end( $ext );
					$filename = rand() . '.' . $extention;
					$target_path = "image/" . $filename;
						if ( move_uploaded_file( $_FILES[ "image" ][ "tmp_name" ], $target_path ) ) {
    $qry = "update inqury set
					servicename='$servicename', servicedetail='$servicedetail', detailbrief='$detailbrief', image='$filename' 
					
					where serviceid='$id'";
						$update = mysqli_query($conn, $qry);}

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
<h3>Service From</h3>


                <form  method="post"  enctype="multipart/form-data" class = "form-horizontal" >
                    <div class="form-group">
<label for="text" class="col-sm-4 control-label">service Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="servicename" value="<?php echo $row['servicename']; ?>" >
</div>
</div>
    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Image</label>
<div class="col-sm-8">
<input type="file" class="form-control" name="image" >
</div>
</div>
 <div class="form-group">
<label for="number_format" class="col-sm-4 control-label">Service Detail</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="servicedetail" value="<?php echo $row['servicedetail']; ?>">
</div>
</div>

 <div class="form-group">
<label for="message-text" class="col-sm-4 control-label">Details</label>
<div class="col-sm-8">
<textarea class="form-control" name="detailbrief" value="<?php echo $row['detailbrief']; ?>"></textarea>
</div>
</div>
<div class="form-group">
<label for="text" class="col-sm-4 control-label"></label>
<div class="col-sm-8">
  <button type="submit" class="btn btn-lg btn-success" name="submit">submit</button>
</div>	
				

						</form>
						 
				   </div>
				   </div>
				</div>
	</div>
</body>
			