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
            <div class="col-12 col-sm-4 offset-sm-1">
               <p>
                  We, students of Thakur college of Engineering and Technology have chosen this topic
                  as our Employablity Development Skills(ESD) Project with the mission to provide an effient t
               </p>       
            </div>
            <div class="col-12 col-sm-6 offset-sm-1">
                <div>
                    
                </div>
                <div class="btn-group mt-4" role="group">
                     
                 </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>