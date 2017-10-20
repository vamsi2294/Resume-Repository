<?php
	session_start();
	if (!isset($_SESSION['type'])) {
		header("Location: login.php");
	}elseif(!$_POST['submit']){
        //header('Location: additem.php', true, 303);
    }else{
?>
<?php 
	include 'dbconnect.php';
    $fname = addslashes ($_POST['fname']);
    $lname = addslashes ($_POST['lname']);
    $state = addslashes ($_POST['state']);
    $pnum = addslashes ($_POST['pnum']);
    $email = addslashes ($_POST['email']);
    $type = addslashes($_POST['type']);
    $rating = addslashes($_POST['rating']);
    $notes = addslashes($_POST['notes']);
	$fileName = addslashes(file_get_contents($_FILES['file']['tmp_name']));
	$name = $_FILES['file']['name'];
	$typee = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
	$tmpName = $_FILES['file']['tmp_name'];
	$fp = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);
	$name = str_replace(' ', '', $name); 
    $name = addslashes($name); 
    echo $notes;
    echo $rating;
    $sql = "INSERT INTO candidates ". "(FirstName,LastName, type, email, State, PhnNumber,FileName,FileSize,FileType,resume,rating,notes) ". "VALUES('$fname','$lname','$type','$email','$state','$pnum','$name','$size','$typee','$content','$rating','$notes')";
    if ($conn->query($sql) === TRUE) {
   	  //echo "New record created successfully";
	} else {
  	  ?>
    <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
    <strong >Incorrect Username or Password</strong>
    </div>
    <?php
  }
	
	$sql2 = "SELECT *FROM candidates WHERE type='".$type."'";
    $result = $conn->query($sql2);
	?>
<html>
<head>
<div class="topnav" id="topnav">
	<a href="database.php">Database</a>
	<?php if (isset($_SESSION['usr_id'])) { ?>
		<div class="dropdown pull-right">
	    <a class="dropbtn pull-right"><span><i class="glyphicon glyphicon-user"></i></span><?php echo $_SESSION['usr_name']; ?></a>
	    <div class="dropdown-content">
	    <a class="btn btn-danger" href="logout.php">Logout</a>
	  	</div>
	    </div>
   	<?php }?>
  	<?php if ($_SESSION['type']=="Admin") { ?>
    <a class="btn btn-success pull-right"href="admin.php">Users</a>
    <?php }?>
</div> 
<title>Database</title>
<link rel="stylesheet" type="text/css" href="table.css"> 
</head>
<body>
    <table class="data-table">
        <caption class="title">Database</caption>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>State</th>
                <th>Phone Number</th>
	            <th>Rating</th> 
	            <th>Notes</th>
	            <th>Resume</th> 
	        </tr>
	    </thead>
	    <tbody>
	    <?php
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>";
			        echo "<td>".$row["FirstName"]."</td>";
			        echo "<td>".$row["LastName"]."</td>";
		            echo "<td>".$row["type"]."</td>";
		            echo "<td>".$row["email"]."</td>";
		            echo "<td>".$row["State"]."</td>";
		            echo "<td>".$row["PhnNumber"]."</td>";
		            echo "<td>".$row["rating"]."</td>";
		            echo "<td>".$row["notes"]."</td>";
		            echo "<td><a href='dfile.php?name=".$row["email"]."' target=_blank >View</a>
                      		  <a href='dfile2.php?email=".$row["email"]."' >Download</a></td>"; 
		            echo "</tr>";
			    }	
			} else {
			    echo "Not Uploaded";
			}
		    $conn->close();
		?>
		</tbody>
	</table>
</body>
</html>
<?php 
	}
?>