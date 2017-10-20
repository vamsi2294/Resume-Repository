<?php
	session_start();
	if (!($_SESSION['type'])) {
		?>
    <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
    <strong >Persmission not granted</strong>
    </div>
    <?php
		header("Location: login.php");

	}else {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Database</title>
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
	<div id="det" class="col-md-offset-4 col-md-5 well form">
		<form action="file.php" method="POST" enctype="multipart/form-data">
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="fname" type="text" class="form-control" name="fname" placeholder="First Name" required>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="lname" type="text" class="form-control" name="lname" placeholder="Last Name" required>
        </div><br><br>
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
        </div><br><br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input id="pnum" type="text" class="form-control" name="pnum" placeholder="Phone Number" required>
        </div><br><br>
        <div class="input-group" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
		<select name="state" id="state" required>
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
		</div><br><br>
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
		<select name="type" >
			 <option value="" selected="selected">Select a SKill</option>
			 <option value="Java Developer">Java Developer</option>
			 <option value="DotNet Developer">DotNet Developer</option>
			 <option value="Hadoop Developer">Hadoop Developer</option>
			 <option value="Business Analyst">Business Analyst</option>
		</select>
		</div><br><br>
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
		<select name="rating" >
			 <option value="" selected="selected">Select Rating</option>
			 <option value="0">0</option>
			 <option value="1">1</option>
			 <option value="2">2</option>
			 <option value="3">3</option>
			 <option value="4">4</option>
			 <option value="5">5</option>
		</select>
		</div><br><br>
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
            <input id="file" type="file" class="form-control" name="file" required>
        </div><br><br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
            <input id="notes" type="text" class="form-control" name="notes" Placeholder="NOtes" required>
        </div><br><br>
		<div class="form-group" align="center">
        <button type="submit" name="submit" class="btn btn-primary">ADD</button>
      </div>
		</form>
	</div>
</body>
</html>
<?php }
?>