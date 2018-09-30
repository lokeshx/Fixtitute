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
   				if(isset($_GET['gid'])){
   					$group_id=$_GET['gid'];
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
a{
	cursor: crosshair;
}
</style>
<link rel="stylesheet" type="text/css" href="db.css">
<body>
	<a href="db.php"><div id="blurr_bg">
		<img src="dashb.jpg">
	</div></a>
	<div id="right_col">
		<div class="field" id="groups_rect" style="display: block">
		
			<a href="db.php"><div class="head_butt_g" id="group_section_create" >Create Group</div></a>
			<a href="db.php"><div class="head_butt_g" id="group_section_edit" style="left: 365px;background:white;height:46px;z-index: 11;color:grey">Edit Group</div></a><a href="db.php">
			<div class="head_butt_g" id="my_groups" style="left: 725px;">My Groups</div></a>
			

			<div class="head_g" id="edit_group" style="display: block;z-index: 100">
				<form name="add_group" action="editgroup_server.php" onsubmit="return validateForm()" method="post">
					<?php
							$query_g="Select * from groups where group_id= '$group_id'";
				 			$result_g=mysqli_query($connect,$query_g);
				 			$result2_g=mysqli_fetch_array($result_g);
				 			$member_str=$result2_g['members'];
				 			
				 			// echo $member_arr;

					?>
					<div class="add_element">
						Group Name : <input type="text" name="g_name_add" class="input_create" value="<?php echo $result2_g['group_name'];?>">
					</div>
					<div class="add_element">
		        		Description (optional): <input type="text" name="g_desc_add" class="input_create" value="<?php echo $result2_g['description'];?>">
		        	</div>
		        	<div class="add_element" style="border:0px">
		        		Select Participants :
		        		<div class="input_create" style="width: auto"><?php
		        			$query_ge="Select * from user";
		        			$member_arr=explode(' ', $member_str);
				 			$result_ge=mysqli_query($connect,$query_ge);
				 			$m_length=count($member_arr);
				 			function checkchecked($uname_db){
				 				global $member_arr;
				 				foreach($member_arr as $uname){
				 					if($uname_db==$uname){
				 						return true;
				 					}
				 				}
				 			}
		        			 while($rows_g=mysqli_fetch_array($result_ge))
				 			
   							{if(checkchecked($rows_g['Username'])){
   								?><input type="checkbox" checked="true" name="userCheck[]" value="<?php echo $rows_g['Username']?>"> <?php echo $rows_g['Username'].' ['. $rows_g['first_name'].' '.$rows_g['last_name'].' ]';?><br><?php
   							}else{
		        			?><input type="checkbox" name="userCheck[]" value="<?php echo $rows_g['Username']?>"> <?php echo $rows_g['Username'].' ['. $rows_g['first_name'].' '.$rows_g['last_name'].' ]';?><br><?php }} ?>
		        			<input type="text" name="g_id" style="display: none" value="<?php echo $group_id;?>">
		        			<input type="submit" name="group_c_submit"  style="position: relative;width:300px;background: white;padding:4px 10px;border:1px solid grey;border-radius: 4px;margin-top:10px;cursor:pointer;" placeholder="Create Group">
		        		</div>
		        	</div>
		        	

				</form>
			</div>
		

	</div>
	 </div>
</body>
</html><?php
   				}else{
   					header("location:test1.html");
   				}
   				?>

   				<?php
   			}
   			else{
               
   				header("location:test1.html");
   			}
   		}
   	}
   	else header("location:test1.html");
?>
