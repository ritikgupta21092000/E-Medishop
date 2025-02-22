<?php 
  include("db_conn.php");
  $issignedup = false;
  $issignedin = false;
  session_start();
  $_SESSION["username"] = "";
  if (isset($_POST["signup"])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($fname == "" || $lname == "" || $email =="" ||$username == "" || $password == "") {
      if ($fname == "") {
        echo "<script>alert('Please Enter your First Name')</script>";
      } else if ($lname == "") {
        echo "<script>alert('Please Enter your Last Name')</script>";
      } elseif ($username == "") {
        echo "<script>alert('Please Enter your UserName')</script>";
      } elseif ($password == "") {
        echo "<script>alert('Please Enter your Password')</script>";
      } elseif ($email == "") {
        echo "<script>alert('Please Enter your Email Id')</script>";
      }
    } else {
      if ($username == $password) {
        echo "<script>alert('Username and Password can not be Same')</script>";
      } else {
        $q = "Insert into `signup`(`fname`, `lname`, `phone_number`, `email`, `username`, `password`) VALUES ('$fname', '$lname', '$phone', '$email', '$username', '$password')";
        $query = mysqli_query($con, $q);
        $issignedup = true;
      }
    }
  }
  if (isset($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $q = "select * from `signup` where `username` = '$username' and `password` = '$password'";
    $query = mysqli_query($con, $q);
    if (mysqli_num_rows($query) > 0) {
      $issignedin = true;

      while($result = mysqli_fetch_array($query)) {
        $_SESSION["username"] = $result["username"];
        if ($result["admin"] == "true") {
          header("location: dashboard.php");
        }
        
      }
    } else {
      echo "<script>alert('Invalid Username Or Password')</script>";
    }
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
  
  <?php if ($issignedup) { ?>

    <?php echo "<script>swal('Successfully Signed Up!', 'Clicked the Ok button!', 'success')</script>"; ?>
  <?php } ?>

    <?php if ($issignedin) { ?>

    <?php echo "<script>swal('Successfully Signed In!', 'Clicked the Ok button!', 'success')</script>"; ?>
  <?php } ?>

  <?php include("./partials/navbar.php"); ?>

  <div id="ContactUsModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">ContactUs </h4>
          <button type="button" class="close" data-dismiss="modal" id="close3">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row row-content">
            <div class="col-12">
               <h3>Location Information</h3>
            </div>
            <div class="col-12 col-sm-4 offset-sm-1">
                    <h5>Our Address</h5>
                     <address style="font-size: 100%">
                   A-Block, Thakur Educational Campus<br>
                   Shyamnarayan Thakur Marg, Thakur Village<br>
                   Kandivali(E). Mumbai - 400101.<br></address>
            </div>
            <div class="col-12 col-sm-6 offset-sm-1">
                <div>
                    <i class="fa fa-phone"></i>: +922 1234 5678<br>
                    <i class="fa fa-fax"></i>: +922 8765 4321<br>
                    <i class="fa fa-envelope"></i>:
                    <a href="mailto:Emedishop2020@gmail.com">Emedishop2020@gmail.com</a>
                </div>
                <div class="btn-group mt-4" role="group">
                     <a role="button" class="btn btn-primary" href="tel:+92212345678"><i class="fa fa-phone"></i> Call</a>
                     <a role="button" class="btn btn-info"><i class="fa fa-skype"></i> Skype</a>
                     <a role="button" class="btn btn-success" href="mailto:Emedishop2020@gmail.com"><i class="fa fa-envelope-o"></i> Email</a>
                 </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="AboutUsModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">About Us </h4>
          <button type="button" class="close" data-dismiss="modal" id="close3">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row row-content">
            <div class="col-12">
               <h3>Our Mission</h3>
            </div>
            <div class="col-12" style="padding: 30px; border: 1px solid #4CAF50;">
               <h6>
                  We, students of Thakur college of Engineering and Technology have chosen this topic as our Employablity Development Skills(ESD) Project with the mission to provide an efficient tool to the customers for purchasing online medicines with best offers available. Sometimes, It may happen that required prescribed medicine is not available at our local shops such as Covid Essential items specially during this Lockdown situation, so buyers can easily go through our website and get as per their requirements. So, our aim is to help the human kind by providing Quality Medicines at Affordable Generic Medical Store price or even less than that with good offers.
               </h6>     
            </div>
          </div>
          <div class="row row-content">
            <div class="col-12">
               <h3>Creators</h3>
            </div>
            <div class="col-12" style="padding: 30px; border: 1px solid #4CAF50;">
               <h6>
                  Pratik Gupta<br>Richa Gupta<br>Ritik Gupta<br>Shivam Gupta<br>Suman Gupta
                </h6>     
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login </h4>
          <button type="button" class="close" data-dismiss="modal" id="close1">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-row">
              <div class="form-group col-sm-4">
                <label class="sr-only" for="exampleInputUsername3">Username</label>
                <input type="username" class="form-control form-control-sm mr-1" name="username" id="exampleInputUsernamel3"
                  placeholder="Enter username" required>
              </div>
              <div class="form-group col-sm-4">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control form-control-sm mr-1" name="password" id="exampleInputPassword3"
                  placeholder="Password" required>
              </div>
              <div class="col-sm-auto">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label"> Remember me
                  </label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <a type="button" class="btn btn-success btn-sm mr-auto" href="#SignUpModal" id="SignUp">New User? SignUp</a>
              <button type="button" class="btn btn-secondary btn-sm ml-auto" class="close" data-dismiss="modal">Cancel</button>
              <button type="submit" name="signin" class="btn btn-success btn-sm ml-1">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="SignUpModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">SignUp </h4>
          <button type="button" class="close" data-dismiss="modal" id="close3">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group row">
              <label for="firstname" class="col-md-2 mt-2">FirstName</label>
              <div class="col-md-10">
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter FirstName">
              </div>
            </div>
            <div class="form-group row">
              <label for="lastname" class="col-md-2 mt-2">LastName</label>
              <div class="col-md-10">
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter LastName">
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-md-2 mt-2">Contact No</label>
              <div class="col-md-10">
                <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-2 mt-2">Email Id</label>
              <div class="col-md-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-md-2 mt-2">Username</label>
              <div class="col-md-10">
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-2 mt-2">Password</label>
              <div class="col-md-10">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-md-2 col-md-10">
                <button type="submit" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
                <button type="submit" name="signup" class="btn btn-primary btn-md" id="signup">Sign Up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="FeedbackModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Send Us Your Feedback</h4>
          <button type="button" class="close" data-dismiss="modal" id="close5">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label for="firstname" class="col-md-2 col-form-label">First Name</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="lastname" class="col-md-2 col-form-label">Last Name</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="telnum" class="col-12 col-md-2 col-form-label">Contact Tel.</label>
              <div class="col-5 col-md-3">
                <input type="tel" class="form-control" id="areacode" name="areacode" placeholder="Area code">
              </div>
              <div class="col-7 col-md-7">
                <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Tel. number">
              </div>
            </div>
            <div class="form-group row">
              <label for="emailid" class="col-md-2 col-form-label">Email</label>
              <div class="col-md-10">
                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 offset-md-2">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                  <label class="form-check-label" for="approve">
                    <strong>May we contact you?</strong>
                  </label>
                </div>
              </div>
              <div class="col-md-3 offset-md-1">
                <select class="form-control">
                  <option>Tel.</option>
                  <option>Email</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="feedback" class="col-md-2 col-form-label">Your Feedback</label>
              <div class="col-md-10">
                <textarea class="form-control" id="feedback" name="feedback" rows="12"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-md-2 col-md-10">
                <button type="submit" class="btn btn-success">Send Feedback</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12 col-md">
      </div>
    </div>
  </div>

  <div id="mycarousel" class="carousel slide" data-ride="carousel" data-wrap="true">
    <ol class="carousel-indicators">
      <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
      <li data-target="#mycarousel" data-slide-to="1"></li>
      <li data-target="#mycarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./images/ayurved-1.jpg" alt="ayurved">
        <div class="carousel-caption d-none d-md-block carousel-inner-text">
          <h2 class="header">Trending Offers on Homeopathic Medicines 
            <span class="badge badge-danger">NEW</span>
          </h2>
          <p class="d-none d-sm-block">
            India's No. 1 Homeopathy Store. Get best deals + COD<br>Flat 18% off on
            Homeopathy medicines with minimum order value of ₹800 for new users<br>Coupon Code : 
            <b>NEW18</b> 
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/carousel-2.png" alt="carousel-2">
        <div class="carousel-caption d-none d-md-block carousel-inner-text">
          <h2>Flat 30% off on your First Medicine Order
            <span class="badge badge-danger">OFFER</span>
          </h2>
          <p class="d-none d-sm-block">Get up to 30% off on all medicines. <br>Also, earn cashback up to ₹300 with
            Amazon Pay & more<br>Apply Coupon Code : <b>OFFER30</b></p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/carousel-3.jpg" alt="carousel-3">
        <div class="carousel-caption d-none d-md-block carousel-inner-text text-center">
          <h2>All types of Medicines Available Here...</h2>
          <h4>Exclusive Offers!!! Grab your orders fast</h4><span class="badge badge-success">DISCOUNT</span>
          <p class="d-none d-sm-block">20% OFF use Coupon Code : <b>FAST20</b><br>
            Earn 10x Rewards on Axis Edge Debit/Credit card + Get 20% off on 3rd, 5th and 7th Medicine Order
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-sm-11">
          <h3 class="col-12 col-sm-8">Shop Now <br>COVID Essentials| Upto 80% Off</h3>
        </div>
        <div class="col-12 col-sm-1">
          <h5 class="mr-0"><a href="./CovidEssentials.php">See all</a></h5>
        </div>
      </div>
    </div>
    <div class="card-body">
     
        <div class="row row-content align-items-center">
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-1.jpg">
              </div>
              <h6>Wildcraft Hypashield W95 Reusable Outdoor</h6>
              <p>Rs.180.00</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="Wildcraft Hypashield W95 Reusable Outdoor">
              <input type="hidden" name="price" value="180">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-2.jpg">
              </div>
              <h6>Ciphands Antiseptic hand Sanitizer 100 ml</h6>
              <p>Rs.50.00</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="Ciphands Antiseptic hand Sanitizer 100 ml">
              <input type="hidden" name="price" value="50">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-3.jpg">
              </div>
              <h6>Floh Non Contact Digital Infrared Thermometer</h6>
              <p>Rs.1,499.75</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="Floh Non Contact Digital Infrared Thermometer">
              <input type="hidden" name="price" value="1500">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-4.jpg">
              </div>
              <h6>3-Ply Disposable Surgical Face Mask 10's</h6>
              <p>Rs.160.00</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="3-Ply Disposable Surgical Face Mask 10s">
              <input type="hidden" name="price" value="160">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-5.jpg">
              </div>
              <h6>Essentium Phygen 5-Layer N95 Face Mask</h6>
              <p>Rs.104.65</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="Essentium Phygen 5-Layer N95 Face Mask">
              <input type="hidden" name="price" value="105">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/CE-6.jpg">
              </div>
              <h6>Essentium Phygen KN95 Mask with Respirator 1's</h6>
              <p>Rs.1126.00</p>
              <input type="hidden" name="med_type" value="COVID Essential">
              <input type="hidden" name="med_name" value="Essentium Phygen KN95 Mask with Respirator 1s">
              <input type="hidden" name="price" value="1126">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
        </div>
    
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-sm-11">
          <h3 class="col-12 col-sm-8">Shop Now <br>Homeopathy| Flat 20% Cashback</h3>
        </div>
        <div class="col-12 col-sm-1">
          <h5 class="mr-0"><a href="./Homeopathy.php">See all</a></h5>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form>
        <div class="row row-content align-items-center">
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-1.jpg">
              </div>
              <h6>Bakson'S Go Tox Drops 30 ml</h6>
              <p>Rs.110.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="BaksonS Go Tox Drops 30 ml">
              <input type="hidden" name="price" value="110">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-2.jpg">
              </div>
              <h6>Bakson's Tonsil Aid Paediatric Tablet 25 gm</h6>
              <p>Rs.100.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="Baksons Tonsil Aid Paediatric Tablet 25 gm">
              <input type="hidden" name="price" value="100">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-3.jpg">
              </div>
              <h6>Bakson's Gro Up Drops 30 ml</h6>
              <p>Rs.110.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="Baksons Gro Up Drops 30 ml">
              <input type="hidden" name="price" value="110">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-4.jpg">
              </div>
              <h6>Hapdco Aqui Plus Cream 25 gm</h6>
              <p>Rs.90.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="Hapdco Aqui Plus Cream 25 gm">
              <input type="hidden" name="price" value="90">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-5.jpg">
              </div>
              <h6>Wheezal Jaborandi Hair Treatment Oil 110 ml</h6>
              <p>Rs.110.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="Wheezal Jaborandi Hair Treatment Oil 110 ml">
              <input type="hidden" name="price" value="110">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/H-6.jpg">
              </div>
              <h6>Dr. Reckeweg R73 Spondarthrin Drops 22 ml</h6>
              <p>Rs.235.00</p>
              <input type="hidden" name="med_type" value="Homeopathy">
              <input type="hidden" name="med_name" value="Dr. Reckeweg R73 Spondarthrin Drops 22 ml">
              <input type="hidden" name="price" value="235">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-sm-11">
          <h3 class="col-12 col-sm-8">Shop Now <br>Pain Killers| Flat 10% Off</h3>
        </div>
        <div class="col-12 col-sm-1">
          <h5 class="mr-0"><a href="./PainKillers.php">See all</a></h5>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form>
        <div class="row row-content align-items-center">
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-1.jpg">
              </div>
              <h6>Paingesic 20mg Tablet 10'S</h6>
              <p>Rs.105.00</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Paingesic 20mg Tablet 10'S">
              <input type="hidden" name="price" value="105">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-2.jpg">
              </div>
              <h6>Crocin Pain Relief Tablet 15'S</h6>
              <p>Rs.59.76</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Crocin Pain Relief Tablet 15S">
              <input type="hidden" name="price" value="60">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-3.jpg">
              </div>
              <h6>Moov Pain Relief Specialist Cream 50 gm</h6>
              <p>Rs.152.10</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Moov Pain Relief Specialist Cream 50 gm">
              <input type="hidden" name="price" value="152">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-4.jpg">
              </div>
              <h6>Amrutanjan Pain Balm - Extra Power 8 ml</h6>
              <p>Rs.37.24</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Amrutanjan Pain Balm - Extra Power 8 ml">
              <input type="hidden" name="price" value="37">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-5.jpg">
              </div>
              <h6>Moov Pain Relief Specialist Spray 35 gm</h6>
              <p>Rs.117.00</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Moov Pain Relief Specialist Spray 35 gm">
              <input type="hidden" name="price" value="117">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/PK-6.jpg">
              </div>
              <h6>Himalaya Pain Balm Strong - Mint 10 gm</h6>
              <p>Rs.30.45</p>
              <input type="hidden" name="med_type" value="Pain Killer">
              <input type="hidden" name="med_name" value="Himalaya Pain Balm Strong - Mint 10 gm">
              <input type="hidden" name="price" value="30">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-12 col-sm-11">
          <h3 class="col-12 col-sm-8">Shop Now <br>AntiBacterial Medicines| Flat 18% Cashback</h3>
        </div>
        <div class="col-12 col-sm-1">
          <h5 class="mr-0"><a href="./AntiBacterial.php">See all</a></h5>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form>
        <div class="row row-content align-items-center">
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-1.jpg">
              </div>
              <h6>Rifagut 550mg Tablet 10'S</h6>
              <p>Rs.395.00</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="Rifagut 550mg Tablet 10S">
              <input type="hidden" name="price" value="395">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-2.jpg">
              </div>
              <h6>Pentids 400 Tablet 10'S</h6>
              <p>Rs.16.50</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="Pentids 400 Tablet 10S">
              <input type="hidden" name="price" value="17">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-3.jpg">
              </div>
              <h6>Candiforce 100mg Capsule 7'S</h6>
              <p>Rs.76.47</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="Candiforce 100mg Capsule 7S">
              <input type="hidden" name="price" value="77">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-4.jpg">
              </div>
              <h6>T Bact Ointment 15gm</h6>
              <p>Rs.290.30</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="T Bact Ointment 15gm">
              <input type="hidden" name="price" value="290">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-5.jpg">
              </div>
              <h6>Doxy 1 L DR Forte Capsule 10'S</h6>
              <p>Rs.86.67</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="Doxy 1 L DR Forte Capsule 10S">
              <input type="hidden" name="price" value="87">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
          <div class="col-12 col-md-2">
            <form action="insertCart.php" method="post">
            <div class="card card-body">
              <div class="container">
                <img src="./images/AB-6.jpg">
              </div>
              <h6>Ceftum 500mg Tablet 4'S</h6>
              <p>Rs.431.00</p>
              <input type="hidden" name="med_type" value="Anti Bacterial">
              <input type="hidden" name="med_name" value="Ceftum 500mg Tablet 4S">
              <input type="hidden" name="price" value="431">
              <input type="submit" class="btn btn-success" value="Add to Cart" name="insertCart">
            </div>
            </form>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <?php include("./partials/footer.php"); ?>

  
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="./javascript/index.js"></script>

</html>