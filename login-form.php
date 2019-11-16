<form id= "fei-login-form" method="post" class="form-horizontal" action="login.php">
  <h1 id='login-title'>Login</h1>
  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="username">Username:</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="username"
      <?php
      echo (isset($_POST["submit"]))?"value ='".$username."'":"placeholder='Enter Username'";
        ?>
      name="username">
      <div class="inputError">
        <p><?php echo (empty($userError))?"":$userError; ?></p>
      </div>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="pwd">Password:</label>
    <div class="col-md-9">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      <div class="inputError">
        <p><?php echo (empty($passwordError))?"":$passwordError; ?></p>
      </div>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <div class="text-center">
      <button type="submit" name="submit" value=1 class="center btn btn-primary">Submit</button>
    </div>
  </div>
</form>