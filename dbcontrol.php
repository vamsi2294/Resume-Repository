<?php
    if(!isset($_SESSION)){
    session_start();
    }
    if (!isset($_SESSION['type'])) {
        header("Location: login.php");
    }elseif(!$_POST['submit']){
        header('Location: database.php', true, 303);
    }else{
        include 'dbconnect.php';
    	include 'database.php';
        $fname= addslashes($_POST['fname']);
        $type = addslashes($_POST['type']);
        $state = addslashes($_POST['state']);
        if ($type&&$state&&$fname) {
            $sql2 = "SELECT *FROM candidates WHERE FirstName='".$fname."' AND type='".$type."' AND State='".$state."'" ;
        }elseif ($type&&$state) {
            $sql2 = "SELECT *FROM candidates WHERE type='".$type."' AND State='".$state."' " ;
        }elseif ($state&&$fname) {
            $sql2 = "SELECT *FROM candidates WHERE State='".$state."' AND FirstName='".$fname."'" ;
        }elseif ($type&&$fname) {
            $sql2 = "SELECT *FROM candidates WHERE type='".$type."' AND FirstName='".$fname."'" ;
        }elseif ($type) {
            $sql2 = "SELECT *FROM candidates WHERE type='".$type."'" ;
        }elseif ($state) {
            $sql2 = "SELECT *FROM candidates WHERE State='".$state."'" ;
        }elseif ($fname) {
            $sql2 = "SELECT *FROM candidates WHERE FirstName='".$fname."'" ;
        }
        else{
            $sql2 = "SELECT  *FROM candidates";
        }
        $result = $conn->query($sql2);
?>
<html>
<head>
    <title>Database</title>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>

<script>
// When the user clicks on div, open the popup
function myFunction(name) {
    var popup = document.getElementById(name);
    popup.classList.toggle("show");
}   
</script>
<body>
<div class="col-sm-12">
    <div class="well">
    <table class="data-table" style="overflow-x:auto;" >
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
            <th>Delete</th>
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
                    echo "<td>"?>

                    <div class='popup' >
                    <a onclick='myFunction(name)' name='<?php echo $row['notes'];?>'><span class='glyphicon glyphicon-eye'>View</a>
                    <span class='popuptext' id='<?php echo $row['notes'];?>'><?php echo $row['notes'];?></span> 
                    </div><?php "</td>";
                    echo "<td>View<a href='dfile.php?name=".$row["email"]. "'target=_blank <span class='glyphicon glyphicon-new-window'></a>
                              Download<a href='dfile2.php?name=".$row["email"]."' <span class='glyphicon glyphicon-save'></a></td>";
                    echo "<td>Delete<a href='database.php?del=".$row["email"]."'<span class='glyphicon glyphicon-trash'></a></td>";
                    echo "</tr>";
                }	
        	} else {
            	?>
                <div align="center" class="alert alert-danger col-md-offset-4 col-md-5 ">
                <strong >No Results Found</strong>
                </div>
                <?php
        	}
            $conn->close();
        ?>
        </tbody>
    </table>
    </div>
    
</div>
</body>
</html>
<?php 
    }
?>