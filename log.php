<?php
  $connect=new mysqli("localhost","root","","fixtitute");
  if(isset($_POST['username']))
   {
      $username=$_POST['username'];
      $password=$_POST['password'];
   	$check=mysqli_query($connect,"select * from user where Username= '$username'");
   	$check2=mysqli_num_rows($check);
   	if($check2>0)
   	{
         while($info=($check)->fetch_assoc())
   		{
   			if($info['Password']==$password)
   			{
               setcookie('username',$username, time() + (86400 * 30), "/");setcookie('password',$password, time() + (86400 * 30), "/");
               header("location:db.php");
   			}
   			else{
               header("location:test1.html");
   			}
   		}
   	}
   	
   }
?> 