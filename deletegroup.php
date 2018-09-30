<?php
  $connect=new mysqli("localhost","root","","fixtitute");
  if(isset($_GET['gid']))
   {
      $groupId=$_GET['gid'];
   	$check=mysqli_query($connect,"delete from groups where group_id= '$groupId'");
   	if($check)
   	{header("location:db.php");
   	}
   	else echo"error";
   }
   else{
      echo "error";
   }
?> 