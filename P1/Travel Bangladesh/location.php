<?php session_start(); ?>
<?php include "dbConnect.php"; 
$name = $_SESSION["id"];


	$sql_query1 = "select * from disaster";
    $result1 = mysqli_query($con,$sql_query1); 
	
	if(mysqli_num_rows($result1) >0)  
	 
 {  
	$row = mysqli_fetch_assoc($result1);  
	$id =$row["id"]; 
	$name1 =$row["p_name"]; 
	$lat1 =$row["Lati"]; 
	$long1 =$row["Longi"]; 
	$dis_type =$row["dis_type"]; 
	
    //header('Location: location.php');
	//header("Location: /autism/quiz_oop/index.php");
	//echo 'Inserted as user';
    
 }  
 else  
 {   
      //include "logfail.html";
 }  

  //echo "$name1";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation API with Google Maps API</title>
    <meta charset="UTF-8" />

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  </head>
  <body onload="setInterval(function(){ navigator.geolocation.getCurrentPosition(successCallback); }, 5000);">
  <a href="logout.php">Logout</a>
  <h1 id="demo"></h1>
  <h1><?php echo $_SESSION['id']; ?></h1>

    <script>
      function displayLocation(latitude,longitude){
        var request = new XMLHttpRequest();

        var method = 'GET';
        var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
        var async = true;

        request.open(method, url, async);
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
            var address = data.results[0];
            //document.write(address.formatted_address);
            var loc = address.formatted_address;

            //document.getElementById('demo').innerHTML = loc; 
            
            //----Sending location to php file using AJAX--------
            $.post(
                'location_save.php',
                {
                  place: loc,
                  id: <?php echo $_SESSION['id']; ?>
                },
                function(e) {
                    //alert(e);
                }
            );
          }
        };
        request.send();
      };

      var successCallback = function(position){
        var x = position.coords.latitude;
        var y = position.coords.longitude;
		
		//document.write(x);
		var x1= <?php echo $lat1; ?>;
		var y1= <?php echo $lat1; ?>;
		//document.write(x1);
        displayLocation(x,y);
		
		 if (x1 > x)
		 {
			 var sub1=x1-x;
		 }
		 else
		 {
			 var sub1=x-x1;
		 }
		 
		 if (y1 > y)
		 {
			 var sub2=y1-y;
		 }
		 else
		 {
			 var sub2=y-y1;
		 }
		 if(sub1>=.05 && sub2 >=.05)
		 {
			 <?php 
					$danger= "Be Safe";
			 ?>
		 }
      };

      /*var errorCallback = function(error){
        var errorMessage = 'Unknown error';
        switch(error.code) {
          case 1:
            errorMessage = 'Permission denied';
            break;
          case 2:
            errorMessage = 'Position unavailable';
            break;
          case 3:
            errorMessage = 'Timeout';
            break;
        }
        document.write(errorMessage);
      };*/

      /*var options = {
        enableHighAccuracy: true,
        timeout: 1000,
        maximumAge: 0
      };*/

      //navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);
      
    </script>
	
 
  </body>
  <?php 
$_SESSION['id'] = $name; 
$_SESSION['danger'] = $danger; 
$_SESSION['p_name'] = $name1; 
$_SESSION['dis_type'] = $dis_type; 
	$name1 =$row["p_name"];
include "user.php";
  ?>
 
</html>