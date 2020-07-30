<?php 
  include("db_conn.php");
  include("./partials/login_signup.php");
  if (isset($_POST["insert"])) {
    $upload = "./images/";
    $path = $upload.basename($_FILES["file"]["name"]);
    $img_type = pathinfo($path, PATHINFO_EXTENSION);
      if ($img_type == "png" || $img_type == "jpg" || $img_type == "jpeg") {
        
        move_uploaded_file($_FILES["file"]["tmp_name"], $path);
        
      } else {
        echo "success";
        echo "<script>alert('Please Upload only Image file')</script>";
      }
    $med_name = $_POST["med_name"];
    $price = $_POST["price"];
    $med_type = $_POST["med_type"];
    $prescription_required = $_POST["prescription_required"];
    $q = "Insert into `medicines`(`image`, `med_name`, `price`, `med_type`, `prescription_required`) VALUES ('$path', '$med_name', '$price', '$med_type', '$prescription_required')";
    $query = mysqli_query($con, $q);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Medishop</title>
  <?php include("./partials/link.php"); ?>
  <script src="https://kit.fontawesome.com/5130183192.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="sidebar">
      <div class="sidebar-header">
        <h4>E-Medishop</h4>
        <hr>
      </div>
      <div class="sidebar-content">
        <a href="index.php" class="active"><i class="fa fa-home"></i> Home</a>
        <a data-toggle="modal" href="#AddModal" role="button"><i class="fa fa-medkit" id="Add"></i> Add Medicine</a>
        <a href="#"><i class="fa fa-cart-arrow-down"></i> View All Orders</a>
        <a href="./ViewMedicine.php"><i class="fas fa-book-medical"></i> View All Medicine</a>
      </div>
    </div>

    <div class="statistics row">
      <div class="card col-4 offset-3">
        <div class="card-header">
          <h4>Total Number of Registered Users</h4>
        </div>
        <div class="card-body">
          <?php
            $q = "select * from signup";
            $query = mysqli_query($con, $q);
            $result = mysqli_num_rows($query);
            echo $result;
           ?>
        </div>
      </div>
    </div>

    <div id="AddModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Enter Medicine Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-md-2">Upload Medicine image : </label>
                <div class="col-md-10">
                  <input type="file" class="form-control-file" name="file" id="image" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-md-2">Medicine name : </label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name ="med_name" required>
                </div>
              </div>
                        
              <div class="form-group row">
                <label class="col-md-2">Price : </label>
                <div class="col-md-10">
                  <input type="number" class="form-control" name="price" required>
                </div>     
              </div>
              
              <div class="form-group row">
                <label class="col-md-2">Medicine type : </label>
                <div class="form-check">
                  <div class="col-md-10">
                  <input type="radio" class="form-check-input" name="med_type" value="COVID Essential">
                  <label class="form-check-label">COVID Essential</label><br>
                  <input type="radio" class="form-check-input" name="med_type" value="Homeopathy">
                  <label class="form-check-label">Homeopathy</label><br>
                  <input type="radio" class="form-check-input" name="med_type" value="Pain Killer">
                  <label class="form-check-label">Pain Killer</label><br>
                  <input type="radio" class="form-check-input" name="med_type" value="Anti Bacterial">
                  <label class="form-check-label">Anti Bacterial</label><br>
                  </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-md-2">Prescription Required : </label>
                <div class="form-check">
                  <div class="col-md-10">
                    <input type="radio" class="form-check-input" name ="prescription_required" value="Yes">Yes<br>
                    <input type="radio" class="form-check-input" name ="prescription_required" value="No">No<br>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4 offset-md-2">
                  <button type="submit" class="btn btn-primary" name="insert">Add Medicine</button>
                </div>
              </div>
            </form>
          </div>
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
