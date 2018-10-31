<?php
session_start();
include "dbConnect.php";

$category=$_GET["category"];
$id=$_GET["username"];
$password=$_GET["password"];


if($category=='User')
{
	
    $sql_query = "select username,id from users where username like '$id' and password like '$password' and category like '$category' ";
    $result = mysqli_query($con,$sql_query); 

	
 if(mysqli_num_rows($result) >0)  
	 
 {  
	$row = mysqli_fetch_assoc($result);  
	$name =$row["username"]; 
	$id1 =  $row["id"];
	$_SESSION['id'] = $id1;
	
		echo "hi";
    header('Location: location.php');
	//header("Location: /autism/quiz_oop/index.php");
	//echo 'Inserted as user';
    
 }  
 else  
 {   
      //include "logfail.html";
 }  
}



if($category=='Agency')
{
	echo 'hi';
    $sql_query = "select name from user where name like '$id' and password like '$password' and category like '$category' ";
    $result = mysqli_query($con,$sql_query); 

	
 if(mysqli_num_rows($result) >0 )  
	 
 {  
 $row = mysqli_fetch_assoc($result);  
 $name =$row["name"];  
   // header("Location: /autism/admin/index.html");
   echo 'Inserted as agency';
    
    
 }  
 else  
 {   
     include "logfail.html";
 }  
}

	



?>