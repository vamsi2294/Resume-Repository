<html>
<head>
    <title>Database</title>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<?php
    session_start();
    include 'dbconnect.php';
    if (!($_SESSION['type']=="admin")) {
        ?>
    <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
    <strong >Persmission not granted</strong>
    </div>
    <?php
    }else{
    $sql2 = "SELECT *FROM login WHERE type is NULL or type='user'";
?>
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table class="data-table" >
        <caption class="title">Database</caption>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>
    <?php
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["FirstName"]."</td>";
                echo "<td>".$row["LastName"]."</td>";
                echo "<td>".$row["type"]."</td>";
                echo "<td>".$row["user"]."</td>";
                echo "<td><a href='admin.php?name=".$row["user"]."' class='label-success form-group'>Approve</a>
                        <a href='admin.php?email=".$row["user"]."' class='label-danger form-group'>Delete</a> 
                                </td>";
                echo "</tr>";
            } 
        } else {
            echo "0 results";
        }
        if (isset($_GET['name'])) {
            $email=$_GET['name'];
            $sql="UPDATE login SET type='user' WHERE user='$email'";
            $conn->query($sql);
            header('Location: admin.php');
        }elseif (isset($_GET['email'])) {
            $email=$_GET['email'];
            $sql="DELETE FROM login where user='$email'";
            $conn->query($sql);
            header('Location: admin.php');
        }
        }
        ?>
        </tbody>
    </table>
    </form>
</body>
</html>