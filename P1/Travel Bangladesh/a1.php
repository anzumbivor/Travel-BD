<?php

include "dbConnect.php";
session_start();

$email=$_GET["email"];
$name=$_GET["username"];
$password=$_GET["password"];
$category=$_GET["category"];
$trade=$_GET["trade"];
$posting='Teacher';



if($category=='User' && $trade==null)
{
	$sql_query = "insert into user (name, password, category, trade, email) values ('$name','$password','$category','$trade','$email');";  
	include "index.html";
}

else if ($category=='User' && $trade!=null)
{
	echo 'Invalid';
}

else if ($category=='Agency' && $trade!=null)
{
	
	 $sql_query = "insert into user values('$name','$password','$category','$trade','$email');"; 
	 
	include "index.html";
	 
}
else
{
	echo 'Invalid';
	
}





?>