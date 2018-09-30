<?php
  $connect=new mysqli("localhost","root","","fixtitute");
  if(isset($_GET['id']))
   {
      $eventId=$_GET['id'];
   	$check=mysqli_query($connect,"delete from event where event_id= '$eventId'");
   	if($check)
   	{header("location:db.php");
   	}
   	else echo"error";
   }
   else{
      echo "ERROR";
   }
?> 