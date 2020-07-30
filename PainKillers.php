<?php 
  include("db_conn.php");
  include("./partials/login_signup.php");
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
<?php include("./partials/navbar.php"); ?>
<?php include("./partials/modal.php"); ?>
<div class="card mt-5 pt-2">
    <div class="card-header">
          <h3 class="col-12 col-sm-8">Shop Now <br>Pain Killers| Flat 10% Off</h3>
    </div>
    
    <div class="card-body">
      <div class="row">
            <?php
            include('db_conn.php');
            $q = "Select * from medicines where `med_type`='Pain Killer'";
            $query = mysqli_query($con, $q);
            while($row = mysqli_fetch_array($query)){
            ?>
        <div class="col-12 col-sm-2">
          <form action="" method="POST" enctype="multipart/form-data">
                <div class="card card-body">
                  <div class="container">
                    <img class="dynamic-image" src="<?php echo $row["image"] ?>" width="150" height="150" alt="">
                  </div>
                  <div>
                    <h6><?php echo $row['med_name']; ?></h6>
                    <p><b>Rs.<?php echo $row['price']; ?></b></p>
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                  </div>
                </div>
          </form>
        </div>
            <?php } ?>
      </div>
    </div>
</div>

<?php include("./partials/footer.php"); ?>

  
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="./javascript/index.js"></script>
</html>