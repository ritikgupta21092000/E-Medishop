<?php
$issignedup = false;
  $issignedin = false;
    session_start();
    $_SESSION["cart"] = array();
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