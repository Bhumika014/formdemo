<?php
include 'config.php';
?>
<link href="bootstrap.min.css" rel="stylesheet">



<body>
<div class= "container-fluid">
<div class="row">
<div class="col-lg-6">
<h3>Order Inquiry Form</h3>


                <form  method="post"  enctype="multipart/form-data" class = "form-horizontal" >
                    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Product Name</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="productname" >
</div>
</div>
    <div class="form-group">
<label for="text" class="col-sm-4 control-label">Img</label>
<div class="col-sm-8">
<input type="file" class="form-control" name="img">
</div>
</div>
 <div class="form-group">
<label for="number_format" class="col-sm-4 control-label">quantity</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="quantity" >
</div>
</div>
<div class="form-group">
<label for="text" class="col-sm-4 control-label">Price</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="price" >
</div>
</div> 
 <div class="form-group">
<label for="message-text" class="col-sm-4 control-label">Details</label>
<div class="col-sm-8">
<textarea class="form-control" name="detail" ></textarea>
</div>
</div>
<div class="form-group">
<label for="text" class="col-sm-4 control-label"></label>
<div class="col-sm-8">
  <button type="submit" class="btn btn-lg btn-primary " name="submit">submit</button>
</div>	
				

						</form>
						 
				   </div>
				   </div>
				</div>
	

  
           <?php
            $result = mysqli_query($conn, "SELECT * FROM products");
            if (mysqli_num_rows($result) == 0) {
                echo "
				<h4 class='alert alert-info'>No Record Found.</h4>
					
					"; } else { while ($row = mysqli_fetch_array($result)) { ?>
					

  <div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="img/<?php echo $row['image']; ?>" alt="product">
      <div class="caption">
        <h3><?php echo $row['productname']; ?></h3>
        <p><?php echo $row['detail']; ?></p>
</div>
</div>
</div>
						
						<?php echo "<a href=\"delservice.php?id=$row[productid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?>
                        <?php echo "<a href=\"edtservice.php?id=$row[productid]\" onClick=\"return confirm('Are you sure you want to edit?')\">Edit</a>"; ?>

					
					<?php
					}
					}
					?>
					
				
			</div>
			<?php
			ob_start();

			if ( isset( $_POST[ 'submit' ] ) != "" ) {

				$productname = $_POST['productname'];
				$quantity = $_POST['quantity'];
				$price = $_POST['price'];
				$detail = $_POST['detail'];
				

			     	$ext = explode( ".", $_FILES[ "img" ][ "name" ] );
					$extention = end( $ext );
					$filename = rand() . '.' . $extention;
					$target_path = "img/" . $filename;
						if ( move_uploaded_file( $_FILES[ "img" ][ "tmp_name" ], $target_path ) ) {
						$insert = mysqli_query( $conn, "INSERT INTO products(productname, image, quantity, price, detail)VALUES
                                          ('$productname','$filename','$quantity','$price', '$detail' )" );
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
			