<?php
include 'config.php';
?>
<html>
<head>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="ckeditor/contents.css" rel="stylesheet">
<script src="ckeditor/ckeditor.js"></script>

</head>
<body>
<div class= "container-fluid">
<div class="row">
<div class="col-lg-6">
<h3>Service From</h3>


                <form  method="post"  enctype="multipart/form-data" class = "form-horizontal" >
                    <div class="form-group">
<label for="text" class="col-sm-4 control-label">service Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="servicename" >
</div>
</div>
    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Image</label>
<div class="col-sm-8">
<input type="file" class="form-control" name="image">
</div>
</div>
 <div class="form-group">
<label for="number_format" class="col-sm-4 control-label">Service Detail</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="servicedetail" >
</div>
</div>

 <div class="form-group">
<label for="message-text" class="col-sm-4 control-label">Details</label>
<div class="col-sm-8">
<textarea class="ckeditor" name="detailbrief" ></textarea>
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

  
           <?php
            $result = mysqli_query($conn, "SELECT * FROM inqury");
            if (mysqli_num_rows($result) == 0) {
                echo "
				<h4 class='alert alert-info'>No Record Found.</h4>
					
					"; } else { while ($row = mysqli_fetch_array($result)) { ?>
					

  <div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="image/<?php echo $row['image']; ?>" alt="product">
      <div class="caption">
        <h3><?php echo $row['servicename']; ?></h3>
        <p><?php echo $row['detailbrief']; ?></p>
</div>
</div>
</div>
						
						<?php echo "<a href=\"delservice.php?id=$row[serviceid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?>
                        <?php echo "<a href=\"edtservice.php?id=$row[serviceid]\" onClick=\"return confirm('Are you sure you want to edit?')\">Edit</a>"; ?>

					
					<?php
					}
					}
					?>
					
				
			</div>
			<?php
			ob_start();

			if ( isset( $_POST[ 'submit' ] ) != "" ) {

				$servicename = $_POST['servicename'];
				$servicedetail = $_POST['servicedetail'];
				$detailbrief = $_POST['detailbrief'];
				

			     	$ext = explode( ".", $_FILES[ "image" ][ "name" ] );
					$extention = end( $ext );
					$filename = rand() . '.' . $extention;
					$target_path = "image/" . $filename;
						if ( move_uploaded_file( $_FILES[ "image" ][ "tmp_name" ], $target_path ) ) {
						$insert = mysqli_query( $conn, "INSERT INTO inqury(servicename, image, servicedetail, detailbrief)VALUES
                                          ('$servicename','$filename','$servicedetail', '$detailbrief' )" );
						}
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
	</html>		