<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if (!isset($_SESSION['type'])) {
		header("Location: login.php");
}else {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Candidates Database</title>
</head>
<div class="topnav" id="topnav">
	<a href="database.php">Database</a>
	<?php if ($_SESSION['type']=="admin") { ?>
    <a class="btn btn-success "href="admin.php">Users</a>
    <?php }?>
	<?php if (isset($_SESSION['usr_id'])) { ?>
		<div class="dropdown pull-right">
	    <a class="dropbtn pull-right"><span><i class="glyphicon glyphicon-user"></i></span><?php echo $_SESSION['usr_name']; ?></a>
	    <div class="dropdown-content">
	    <a class="btn btn-danger" href="logout.php">Logout</a>
	  	</div>
	    </div>
   	<?php }?>
</div> 
<body>
<div class="container-fluid">
<div class="row content">
	<div class="col-sm-2 sidenav hidden-xs">
		<h2>Logo</h2>
		<ul class="nav nav-pills nav-stacked">
		<li class="active"><a href="#">Refulgent Technologies</a></li>
		<li><a href="additem.php">Add Item</a></li>
		</ul><br>
	</div>
	<br> 
<div class="col-sm-9 well form">
	<form action="dbcontrol.php" method="POST" >
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input id="fname" type="text" class="form-control" name="fname" placeholder="First Name" >
		<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
		<select name="type" >
		<option value="" selected="selected">Select a Skill</option>
		<option value="Java Developer">Java Developer</option>
		<option value="DotNet Developer">DotNet Developer</option>
		<option value="Hadoop Developer">Hadoop Developer</option>
		<option value="Business Analyst">Business Analyst</option>
	</select>
	<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
	<select name="state" id="state" >
		<option value="" selected="selected">Select a State</option>
		<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District Of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>
	</select>		
	<div class="input-group-btn">
		<button class="btn btn-success" name="submit" type="submit" value="submit">
		<i class="glyphicon glyphicon-search"></i></button>
	</div>
	</div>
	</form>
</div>
</div>
</body>
</html>
<?php 
if (isset($_GET['del'])) {
			include 'dbconnect.php';
            $email=$_GET['del'];
            $sql="DELETE FROM candidates WHERE email='$email'";
            $conn->query($sql);
        }
}
?>	