<?php
    session_start();
    if (!isset($_SESSION['type'])) {
        header("Location: login.php");
    }else{
?>
<?php
    $email= addslashes($_GET['name']);
	$sql2 = "SELECT *FROM candidates WHERE email='".$email."'"; 
    include 'dbconnect.php';
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        	$size = $row["FileSize"];
        	$type = $row["FileType"];
        	$content = $row["resume"];
        	$name = $row["FileName"];
    header("Content-length: $size"); 
    header("Content-type: $type"); 
    header("Content-Disposition : attachment; filename=" .$name ); 
    echo  $content ;
    exit;
    }
}
?>
<?php 
    }
?>