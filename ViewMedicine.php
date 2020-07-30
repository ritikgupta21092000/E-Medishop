<?php
include('db_conn.php');
include("./partials/login_signup.php");
if(isset($_POST['yes'])){
     $med_Id = $_POST['med_Id'];
     $q = "DELETE FROM `medicines` where `med_id`='$med_Id'";
     $query = mysqli_query($con, $q);
  }
if(isset($_POST['Update'])){
     $med_Id = $_POST['med_Id'];
     $med_name = $_POST['med_name'];
     $price = $_POST['price'];
     $med_type =$_POST['med_type'];
     $prescription_required = $_POST['prescription_required'];
     $q = "UPDATE `medicines` set  `med_name`='$med_name' ,`price`='$price', `med_type`='med_type' ,`prescription_required`='$prescription_required' where `med_id`='$med_Id'";
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
</head>

<body>
 <?php include("./partials/navbar.php"); ?>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Medicine Id</th>
        <th scope="col">Image</th>
        <th scope="col">Medicine Name</th>
        <th scope="col">Price</th>
        <th scope="col">Medicine Type</th>
        <th scope="col">Prescription Required?</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <form action="" method="POST" enctype="multipart/form-data">
        <?php
        include('db_conn.php');
        $q = "Select * from medicines";
        $query = mysqli_query($con, $q);
        while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $row['med_id']; ?></td>
          <td><img src="<?php echo $row['image'] ?>" width="150" height="150" alt=""></td>
          <td><?php echo $row['med_name']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['med_type']; ?></td>
          <td><?php echo $row['prescription_required']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a href="#EditModal" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a>
            <a href="#deleteModal" class="text-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>

          </td>
        </tr>
        <?php } ?>
        </form>
      <tbody>
    </tbody>
  </table>
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post">
          <div class="form-group">
              <label for="med_Id">Re-confirm Medicine Id </label>
              <input type="text" class="form-control" name ="med_Id" id="med_Id" aria-describedby="emailHelp">            
          </div>
          <button type="submit" class="btn btn-danger" name = "no">No</button>
          <button type="submit" class="btn btn-success" name = "yes">Yes</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Enter Updated Medicine details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post">
        <div class="form-group">
              <label for="med_Id">Re-confirm Medicine Id </label>
              <input type="text" class="form-control" name ="med_Id" id="med_Id" aria-describedby="emailHelp">            
          </div>
          
          <div class="form-group">
              <label for="med_name">Medicine name</label>
              <input type="text" class="form-control" name ="med_name" id="med_name" aria-describedby="emailHelp">            
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" id="price">
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
          </div>
          <button type="submit" class="btn btn-danger" name = "Cancel">Cancel</button>
          <button type="submit" class="btn btn-success" name = "Update">Update</button>
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