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
			$path = $row["FilePath"];
			$fname = $row["FileName"];
			$name = basename($path);
			$file = 'C:\Users\vamsi\Desktop\Resumes\DeepSpark_dlframework.pdf';
			$filename = 'DeepSpark_dlframework.pdf';
			if (file_exists($path)) {
			header("Content-length:".filesize($file)); 
    		header("Content-type: ".filetype($file)); 
    		header('Content-Transfer-Encoding: binary');
    		header("Content-Disposition : attachment; filename=" .$filename ); 
    		header('Accept-Ranges: bytes');
    		header('Expires: 0');
			@readfile($file);
		}else{
			 echo $path;
			// echo $name;
			// echo $file;
		}
	exit;
	}
}
?>
<?php 
	}
?>