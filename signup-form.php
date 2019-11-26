<form id= "fei-login-form" method="post" class="form-horizontal" action="signup.php">
  <?php  if (isset($allFieldsValid) && $allFieldsValid == true) {
      echo "<div class='alert alert-success'>Registered Successfully!!!  Click <a href='".$root."login.php'>here</a> to login.</span></div>";
  }
    ?>
  <h1 id='login-title'>Sign In</h1>

  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="firstname">First Name :</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="firstname"
        <?php
        echo (isset($_POST["submit"]))?"value ='".$firstname."'":"placeholder='Enter firstname  '";
        ?>
      name="firstname">
      <div class="inputError">
        <p><?php echo (empty($error_firstname))?"":$error_firstname; ?></p>
      </div>
    </div>
  </div>

  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="lastname">Last Name :</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="lastname"
        <?php
        echo (isset($_POST["submit"]))?"value ='".$lastname."'":"placeholder='Enter lastname  '";
        ?>
      name="lastname">
      <div class="inputError">
        <p><?php echo (empty($error_lastname))?"":$error_lastname; ?></p>
      </div>
    </div>
  </div>

  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="mobileno">Mobile number:</label>
    <div class="col-md-8">
      <input type="number" class="form-control" id="mobileno"
        <?php
        echo (isset($_POST["submit"]))?"value ='".$mobileno."'":"placeholder='Enter mobile number '";
        ?>
      name="mobileno">
      <div class="inputError">
        <p><?php echo (empty($error_mobileno))?"":$error_mobileno; ?></p>
      </div>
    </div>
  </div>


  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="address">Address:</label>
    <div class="col-md-8">
      <textarea rows="4" cols="50"type="text" class="form-control" id="address" name="address"
        <?php echo (isset($_POST["submit"]))?"value ='".$address."'":"placeholder='Enter residential address '";?> ><?php echo (isset($_POST["submit"]))?$address:"";?></textarea>
      <div class="inputError">
        <p><?php echo (empty($error_address))?"":$error_address; ?></p>
      </div>
    </div>
  </div>

  
  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="email">Email address :</label>
    <div class="col-md-8">
      <input type="text" class="form-control" id="email"
        <?php
        echo (isset($_POST["submit"]))?"value ='".$email."'":"placeholder='Enter email address '";
        ?>
      name="email">
      <div class="inputError">
        <p><?php echo (empty($error_email))?"":$error_email; ?></p>
      </div>
    </div>
  </div>

  <div class="form-group form-group-lg">
    <label class="control-label col-md-4" for="password">Set Password:</label>
    <div class="col-md-8">
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      <div class="inputError">
        <p><?php echo (empty($error_password))?"":$error_password; ?></p>
      </div>
    </div>
  </div>



  <div class="form-group form-group-lg">
    <label class="control-label col-md-3" for="signup"></label>
    <div class="col-md-9">
      <p>
        Already a user? Click here to <a href="<?= $root.'login.php' ?>">Login.</a>
      </p>
    </div>
  </div>

  <div class="form-group form-group-lg">
    <div class="text-center">
      <button type="submit" name="submit" value=1 class="center btn btn-primary">Submit</button>
    </div>
  </div>
</form>