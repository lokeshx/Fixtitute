<?php
$connect= new mysqli("localhost","root","","fixtitute");
$username=$_COOKIE['username'];
$password=$_COOKIE['password'];
$check=mysqli_query($connect,"select * from user where Username= '$username'");
   	$check2=mysqli_num_rows($check);
   	if($check2>0)
   	{
   	  while($info=($check)->fetch_assoc())
   		{
   			$user=$info['Username'];
   			if($info['Password']==$password)
   			{

   				?>

   				<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user;?></title>
</head>
<link rel="stylesheet" type="text/css" href="db.css">
<style type="text/css">
	*{
		box-sizing: border-box;
	}
	tr,td,table{
		
		border:1px solid #BABABA;
		

	}
	th,tr,td{
		padding:5px;
		text-align: center;
	}
	td{

		cursor: pointer;
	}
	.event_d_table,.event_d_td{
		border: none;
		padding: 4px auto;
	}
	.event_d_tr:hover{
		background-color: #f0e8e9

	}
	.event_d_table { border-collapse: collapse;border-radius: 0;width:calc(100% - 100px);position: absolute;margin-top: 20px }
.event_d_tr { border: solid thin grey; border-radius: 0}

	.db{
		position: relative;
	}
	.db:hover::after{
	content:  "" attr(data-date) "";
  	position: absolute;
  	right: 20px;
  	top: 20px;
	border:1px solid black;
	border-radius: 3px;
	background: #222222;
	color:white;
	font:14px arial;
	padding:3px 4px;
	word-break: normal;
	z-index: 100
}
#blurr_bg{
	height:100%;
	width: 100%;
	position: fixed;
	top:0;
	left:0;

}
#blurr_bg img{
	height: 100%;
	width:100%;
}
</style>
<body>
	<div id="blurr_bg">
		<img src="dashb.jpg">
	</div>
</body>
</html><?php
   			}
   			else{
               
   				header("location:test1.html");
   			}
   		}
   	}
   	else header("location:test1.html");
?>
