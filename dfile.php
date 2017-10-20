<?php
    session_start();
    if (!isset($_SESSION['type'])) {
        header("Location: login.php");
    }else {
        if (isset($_GET['name'])) {
?>
<?php
        // if ($_GET['name']) {
    $email= addslashes($_GET['name']);
    //  }else {
    //      $email= addslashes($_GET['email']);
    // }
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
    header("Content-type: application/pdf"); 
    //if ($_GET['name']) {
    header('Content-Transfer-Encoding: binary');
    header("Content-Disposition : inline; filename=" .$name ); 
    header('Accept-Ranges: bytes');
    header('Expires: 0');
      // }     
    // }elseif($_GET['email']){
    //     header_remove('Accept-Ranges: bytes');
    //     header_remove('Content-Transfer-Encoding: binary');
    //     header_remove("Content-Disposition : application/pdf; filename=" .$name );
        // header("Content-Disposition : attachment; filename=" .$name ); 
    // }
    echo $content ;
    exit;
        }	
	}
?>
<?php }
}
?>