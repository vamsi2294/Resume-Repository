<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
  session_start();
  if (isset($_POST['login'])) {
  include 'dbconnect.php';
  $email = addslashes($_POST['email']);
  $pass = addslashes($_POST['password']);
  $sql = "SELECT *FROM login WHERE user='".$email."' AND pass='".$pass."'" ;
  $result = $conn->query($sql);
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['usr_id'] = $row['id'];
    $_SESSION['usr_name'] = $row['FirstName'];
    $_SESSION['type'] = $row['type'];
    header("Location: additem.php");
  }else {
    ?>
    <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
    <strong >Incorrect Username or Password</strong>
    </div>
    <?php
  }
  $conn->close();
}
?>
<div class="topnav" id="topnav">
  <a href="database.php">Database</a>
  <a href="additem.php">Add item</a>
  <?php if (isset($_SESSION['usr_id'])) { ?>
    <div class="dropdown pull-right">
      <button class="dropbtn pull-right"><span><i class="glyphicon glyphicon-user"></i></span><?php echo $_SESSION['usr_name']; ?></button>
      <div class="dropdown-content">
      <a class="btn btn-danger" href="logout.php">Logout</a>
      </div>
      </div>
    <?php }else{?>        
  <a class="pull-right" href="signup.php">Sign Up</a>
  <?php }?>
</div> 
<body> 
  <div class="col-md-offset-4 col-md-5" id="det">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <legend align="center">Login</legend>
      <input type="hidden" name="action" value="login">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
      </div><br><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required> 
      </div><br>
      <div class="form-group" align="center">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</body>
</html>