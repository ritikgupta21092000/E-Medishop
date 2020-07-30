<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background-color: rgb(52, 75, 13);">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
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
              <a class="dropdown-item" href="#">Covid Essentials</a>
              <a class="dropdown-item" href="#">Homeopathy</a>
              <a class="dropdown-item" href="#">Osteopathy</a>
              <a class="dropdown-item" href="#">Allopathy</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b style="color: white;">
                <i class="fa fa-hand-o-down" style="font-size:24px"></i> More
              </b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">24x7 Customer Care</a>
              <a class="dropdown-item" href="#">About Us</a>
              <a class="dropdown-item" href="#FeedbackModal" role="button" id="Feedback">Give Feedback</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <b style="color: white;">
                <i class="fa fa-shopping-cart" style="font-size:24px"></i> Cart
              </b>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>