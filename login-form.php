<form id= "fei-login-form" method="post" class="form-horizontal" action="login.php">
  <h1 id='login-title'>Login</h1>
  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="email">Your Email:</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="email"
      <?php
      echo (isset($_POST["submit"]))?"value ='".$email."'":"placeholder='Enter Email address'";
        ?>
      name="email">
      <div class="inputError">
        <p><?php echo (empty($userError))?"":$userError; ?></p>
      </div>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="password">Password:</label>
    <div class="col-md-9">
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      <div class="inputError">
        <p><?php echo (empty($passwordError))?"":$passwordError; ?></p>
      </div>
    </div>
  </div>

  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="signup"></label>
    <div class="col-md-9">
      <p>
        Not a user? Click here to <a href="<?= $root.'signup.php' ?>">Sign Up.</a>
      </p>
    </div>
  </div>


  <div class="form-group form-group-lg">
    <div class="text-center">
      <button type="submit" name="submit" value=1 class="center btn btn-primary">Submit</button>
    </div>
  </div>
</form>