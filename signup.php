<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="topnav" id="topnav">
  <a href="database.php">Database</a>
  <a href="additem.php">Add Item</a> 
  <a class="pull-right" href="login.php">Login</a> 
</div>
<?php
  if (isset($_POST['signup'])) {
    include 'dbconnect.php';
    $fname = addslashes($_POST['fname']);
    $lname = addslashes($_POST['lname']);
    $email = addslashes($_POST['email']);
    $pass = addslashes($_POST['password']);
    $sql = "INSERT INTO login ". "(FirstName,LastName,user, pass) ". "VALUES('$fname','$lname','$email','$pass')";
    if ($conn->query($sql) === TRUE) {
      ?>
      <div align="center" class="alert alert-sucess col-md-offset-4 col-md-5 ">
        <strong >Sign Up successful!</strong>
      </div>
      <?php
    } else {
      ?>
      <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
        <strong >Email Already Registered</strong>
      </div>
        <?php
    }
  $conn->close();
  }
?>
<body>
  <div class="col-md-offset-4 col-md-5" id="det">
  <legend align="center">Signup</legend>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" value="login>
      <input type="hidden" name="action" value="login">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="fname" type="text" class="form-control" name="fname" placeholder="First Name" required>
      </div><br><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="fname" type="text" class="form-control" name="lname" placeholder="Last Name" required>
      </div><br><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
      </div><br><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
      </div><br>
      <div class="form-group" align="center">
        <button type="submit" name="signup" class="btn btn-primary">Signup</button>
      </div>
    </form>
  </div>
</body>
</html>