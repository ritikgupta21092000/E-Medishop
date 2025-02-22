<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background-color: rgb(52, 75, 13);">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <b>E-Medishop</b>
        <img src="./images/images.png" style="height: 35px; width: 70px">
      </a>
      <div class="collapse navbar-collapse" id="Navbar">
        <input class="form-control mr-sm-2" style="width: 250px;" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" style="background: whitesmoke;">Search</button>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#loginModal" id="login" role="button">
              <b style="color: white;">
                <span class="fa fa-user-circle-o" style="font-size:24px"></span> Login
              </b>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b style="color: white;">
                <i class="fa fa-medkit" style="font-size:24px"></i> Medicine
              </b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./CovidEssentials.php">Covid Essentials</a>
              <a class="dropdown-item" href="./Homeopathy.php">Homeopathy</a>
              <a class="dropdown-item" href="./AntiBacterial.php">Anti Bacterial</a>
              <a class="dropdown-item" href="./PainKillers.php">Painkillers</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b style="color: white;">
                <i class="fa fa-hand-o-down" style="font-size:24px"></i> More
              </b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#ContactUsModal" role="button" id="ContactUs">24x7 Customer Care</a>
              <a class="dropdown-item" data-toggle="modal" href="#AboutUsModal">About Us</a>
              <a class="dropdown-item" href="#FeedbackModal" role="button" id="Feedback">Give Feedback</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewCart.php">
              <b style="color: white;">
                <i class="fa fa-shopping-cart" style="font-size:24px"></i> Cart
              </b>
            </a>
          </li>
          <?php if ($_SESSION["username"] != "") { ?>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Hello <?php echo $_SESSION["username"] ?>
            </a>
          </li>
          <a href="logout.php" class="mt-2"><i class="fa fa-sign-in"></i> Logout</a>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>