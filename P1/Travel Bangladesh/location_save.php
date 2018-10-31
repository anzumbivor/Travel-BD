<?php include "dbConnect.php"; ?>
<?php
	
	$id = $_POST['id'];
	$place = $_POST['place'];
	//echo "hi";
	$updateLoc = "insert into location values('$id','$place');";

	$result = mysqli_query($con, $updateLoc);

	//echo $id . "\n" . $place;


?>