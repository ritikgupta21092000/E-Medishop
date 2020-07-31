<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Medishop</title>
  <?php include("./partials/link.php"); ?>
</head>

<body>
  

<div class="card">
    <div class="card-header">
          <h3 class="col-12 col-sm-8">Your Cart</h3>
    </div>
    
    <div class="card-body">
      <div class="row">
        <!-- <div class="col-12 col-sm-2">
          <form action="editCart.php" method="POST" enctype="multipart/form-data"> -->
            <?php
            include('db_conn.php');
            $total=0;
            foreach ($_SESSION as $medicine) {

            	foreach ($medicine as $key => $value) {
            		if ($key==1) {
            			$med_name=$value;

            			$q = "Select * from `medicines` where `med_name`='$med_name'";
			            $query = mysqli_query($con, $q);
			            while($row = mysqli_fetch_array($query)){
			            ?>
                  <div class="col-12 col-sm-2">
          <form action="editCart.php" method="POST" enctype="multipart/form-data">
			                <div class="card card-body">
			                  <div class="container">
			                    <img src="<?php echo $row['image'] ?>" alt="">
			                  </div>
			                  <div>
			                  	<input type="hidden" name="med_name" value="<?php echo $med_name; ?>">
			                    <h6><?php echo $row['med_name']; ?></h6>
			                    <p><b>Rs.<?php echo $row['price']; ?></b></p>
			                    <center><button type="submit" class="btn btn-success">Buy Now</button></center>
			                    <center><button type="submit" class="btn btn-danger" name="event" value="delete">Remove Item</button></center>
			                  </div>
			                </div>

			            <?php } ?>
            		
            		<?php if ($key==2) {
            			$price=$value;
            			$total=$price+$total;
            		}}?>
</form>
        </div>
            	<?php } ?>
            <?php } ?>
            

      </div>
    </div>
</div>

</body>
</html>