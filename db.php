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
	.event_d_table,.event_d_td,.event_u_d_td{
		border: none;
		padding: 4px auto;
	}
	.event_d_tr,.venue_d_tr,.event_u_d_tr:hover{
		background-color: #f0e8e9

	}
	.event_d_table,.venue_d_table,.event_u_d_table{ border-collapse: collapse;border-radius: 0;width:calc(100% - 100px);position: absolute;margin-top: 20px }
.event_d_tr,.venue_d_tr,.event_u_d_tr{ border: solid thin grey; border-radius: 0}

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
</style>
<body>

<div class="top">
	<div id="dashboard_text">Dashboard</div>
	<div class="dd" id="username_text" style="right:70px;font:16px arial;top: 20px"><?php echo $info['first_name'].' '.$info['last_name']?></div>
	<div class="dd" id="user_menu"><img src="man.png"></div>
	<a href="logout.php" id="menu_dropdown"><b>Log out</b></a>
</div>
<div class="left_nav">
<div id="logo">
		<img src="fixtitute.png">
	</div>
	<div class="nav_buttons" id="home" style="margin-top:70px;border-color: white">
	<img src="house.png">    Home</div>
	<div class="nav_buttons" id="cal">
	<img src="schedule.png">    Events</div>
	<div class="nav_buttons" id="groups">
	<img src="team.png">    Groups</div>
	<div class="nav_buttons" id="venue">
	<img src="venue.png">    Venue</div>
</div>
<div id="right_col">

	


	<!--Venue new created -->

	<div class="field" id="venue_rect" style="display: none;">
		
			
			<div class="head_butt_g" id="venue_section_edit" >Venue</div>
			<div class="head_butt_g" id="util_event" style="left: 365px;background:white;height:46px;z-index: 11;color:grey">Venue Assistants</div>

			<div class="head_g" id="venue_display_sep" style="display:none">
				<div id="venue_all_sep" style="padding: 50px;padding-top: 20px; height: 500px;">
					
					<table class="venue_d_table">
						<tr>
							<td class="venue_d_td">S No.</td>
							<td class="venue_d_td">Venue ID</td>
							<td class="venue_d_td">Name</td>
							<td class="venue_d_td">Location</td>
							<td class="venue_d_td">Timing</td>
							<td class="venue_d_td">Capacity</td>
							<td class="venue_d_td">Description</td>
						</tr>
					<?php
					$query="Select * from venue ";
				 	$result=mysqli_query($connect,$query);
				 	$i=0;
				 	while($rows=mysqli_fetch_array($result)){
				 		$i+=1;
				 		?>

				 		<tr class="venue_d_tr" >
				 			<td class="venue_d_td"><?php echo $i;?></td>
				 			<td class="venue_d_td"><?php echo $rows['venue_id'];?></td>
							<td class="venue_d_td"><?php echo $rows['name'];?></td>
							<td class="venue_d_td"><?php echo $rows['location'];?></td>
							<td class="venue_d_td"><?php echo $rows['timeslot_start'].' - '.$rows['timeslot_end'];?></td>
							<td class="venue_d_td"><?php echo $rows['capacity'];?></td>
							<td class="venue_d_td"><?php echo $rows['venue_desc'];?></td>

				 		</tr>
				 		<?php
				 	}
				 	
					?>
					</table>
				</div>
			</div>
			<div class="head_g" id="util_display_sep" style="display:block;">
				<div id="util_all_sep" style="padding: 50px;padding-top: 20px; height: 500px;">
					
					<table class="event_u_d_table">
						<tr>
							<td class="event_u_d_td">S No.</td>
							<td class="event_u_td">Name</td>
						    <td class="event_u_d_td">email id</td>
							<td class="event_u_d_td">contact no.</td>
							<td class="event_u_d_td"> job description</td>
						</tr>
					<?php
					$query1="Select * from event_u ";
				 	$result1=mysqli_query($connect,$query1);
				 	$i=0;
				 	while($rows=mysqli_fetch_array($result1)){
				 		$i+=1;
				 		?>

				 		<tr class="event_u_d_tr" >
				 			<td class="event_u_d_td"><?php echo $i;?></td>
				 			<td class="event_u_d_td"><?php echo $rows['name'];?></td>
							<td class="event_u_d_td"><?php echo $rows['email_id'];?></td>
							<td class="event_u_d_td"><?php echo $rows['contact_no'];?></td>
							<td class="event_u_d_td"><?php echo $rows['job_desc'];?></td>

				 		</tr>
				 		<?php
				 	}
				 	
					?>
					</table>
				</div>
			</div>
</div>











	<div class="field" id="groups_rect" style="display: none">
		
			<div class="head_butt_g" id="group_section_create" >Create Group</div>
			<div class="head_butt_g" id="group_section_edit" style="left: 365px;background:white;height:46px;z-index: 11;color:grey">Edit Group</div>
		<!--	<div class="head_butt_g" id="my_groups" style="left: 725px;">Venue</div> -->
			<div class="head_g" id="create_group" style="display: block;">
				<form name="add_group" action="creategroup.php" onsubmit="return validateForm()" method="post">
					<div class="add_element">
						Group Name : <input type="text" name="g_name_add" class="input_create">
					</div>
					<div class="add_element">
		        		Description (optional): <input type="text" name="g_desc_add" class="input_create">
		        	</div>
		        	<div class="add_element" style="border:0px">
		        		Select Participants :
		        		<div class="input_create" style="width: auto"><?php
		        			$query_g="Select * from user";
				 			$result_g=mysqli_query($connect,$query_g);
		        			 while($rows_g=mysqli_fetch_array($result_g))
   							{
		        			?><input type="checkbox" name="userCheck[]" value="<?php echo $rows_g['Username']?>"> <?php echo $rows_g['Username'].' ['. $rows_g['first_name'].' '.$rows_g['last_name'].' ]';?><br><?php } ?>
		        			<input type="text" name="g_creator" style="display: none" value="<?php echo $info['Username'];?>">
		        			<input type="submit" name="group_c_submit"  style="position: relative;width:300px;background: white;padding:4px 10px;border:1px solid grey;border-radius: 4px;margin-top:10px;cursor:pointer;" placeholder="Create Group">
		        		</div>
		        	</div>
		        	

				</form>
			</div>

			<div class="head_g" id="edit_group" style="display: none;">
				<div style="margin:50px 100px">
					<?php
						$sql ="select * from groups";
						$j=0;
						$result=mysqli_query($connect,$sql);
 						while($result2=mysqli_fetch_array($result)){
 							$j++;
 							?>

 							  <div class="group_list"><?php echo $result2['group_name'].' [ Group id : '.$result2['group_id'].' ]';?>
 								<a href="deletegroup.php?gid=<?php echo $result2['group_id']?>" class="edit_button red">delete</a>
 								<a href="editgroup.php?gid=<?php echo $result2['group_id']?>" class="edit_button">Edit</a>

 							</div>
 							<?php
 						}
					?>
				</div>
			</div>
		<!--	<div class="head_g" id="venue_display" style="display:none">
				<div id="venue_all" style="padding: 50px;padding-top: 20px; height: 500px;">
					
					<table class="venue_d_table">
						<tr>
							<td class="venue_d_td">S No.</td>
							<td class="venue_d_td">Venue ID</td>
							<td class="venue_d_td">Name</td>
							<td class="venue_d_td">Location</td>
							<td class="venue_d_td">Timing</td>
							<td class="venue_d_td">Capacity</td>
							<td class="venue_d_td">Description</td>
						</tr>
					<?php
					$query="Select * from venue ";
				 	$result=mysqli_query($connect,$query);
				 	$i=0;
				 	while($rows=mysqli_fetch_array($result)){
				 		$i+=1;
				 		?>

				 		<tr class="venue_d_tr" >
				 			<td class="venue_d_td"><?php echo $i;?></td>
				 			<td class="venue_d_td"><?php echo $rows['venue_id'];?></td>
							<td class="venue_d_td"><?php echo $rows['name'];?></td>
							<td class="venue_d_td"><?php echo $rows['location'];?></td>
							<td class="venue_d_td"><?php echo $rows['timeslot_start'].' - '.$rows['timeslot_end'];?></td>
							<td class="venue_d_td"><?php echo $rows['capacity'];?></td>
							<td class="venue_d_td"><?php echo $rows['venue_desc'];?></td>

				 		</tr>
				 		<?php
				 	}
				 	
					?>
					</table>
				</div>
			</div> -->
		

	</div>
	<div class="field" id="cal_rect" style="display: none">
		<div>
			<div class="head_butt" id="event_section_create" >Create Event</div>
			<div class="head_butt" id="event_section_delete" style="left: 365px;background:white;height:46px;z-index: 11;color:grey">Delete Event</div>
			
			<div class="head" id="create_event" style="display: none;">
				<form name="add_event" action="createevent.php " onsubmit="return validateForm()" method="post">
					<div class="add_element" id="name_create">
						Event Name : <input type="text" name="e_name_add" class="input_create">
					</div>
					<div class="add_element" id="date_create">
						Date : <input type="date" name="e_date_add" class="input_create">
					</div>
						<input type="text" name="e_creator" style="display: none" value="<?php echo $info['Username'];?>">
						<div class="add_element" id="stime_create" style="display: inline-block;">
							Start Time : <input type="time" name="st_c_time" class="input_create">
						</div>
						<div class="add_element" id="endtime_create" style="position: absolute; left: 520px; display: inline-block;">
							End Time : <input type="time" name="end_c_time" class="input_create">
						</div>
					<div class="add_element" id="venue_create">
				    	<label>Venue : </label>
				    	<select name="venue_select" class="input_create">
				    		
				    		   <option value="others"> </option>
				    		   <option value="a1_1a">A1-1a</option>
				    		   <option value="a1_2a">A1-2a</option>
					    		<option value="a1_3a">A1-3</option>
					    		<option value="a1_nkn">A1-NKN</option>
					    		<option value="a5">A5</option>
			   		    	    <option value="D1_Lounge">D1 Lounge</option>
					    		<option value="B1">B1</option>
					    		<option value="B6">B6</option>
					    		<option value="B7">B7</option>
			   		    </select>
		        	</div>

		        	<div class="add_element" id="create_grpid">
		        		Group id : <input type="text" name="sel_grpid" class="input_create">
		        	</div>
		        	<div class="add_element" id="desc_create">
		        		Description (optional): <input type="text" name="desc-add" class="input_create">
		        	</div>
		        	<input type="submit" name="submit_create" class="add_element">

				</form>
			</div>

			<div class="head" id="delete_event"  >
				<div id="list_eventorganiser" style="padding: 50px;padding-top: 20px;">
					Your Events
					<table class="event_d_table">
						<tr>
							<td class="event_d_td">S No.</td>
							<td class="event_d_td">Name of Event</td>
							<td class="event_d_td">Event ID</td>
							<td class="event_d_td">Date of Event</td>
							<td class="event_d_td">Timing</td>
							<td class="event_d_td">Venue</td>
							<td class="event_d_td"></td>
						</tr>
					<?php
					$query="Select * from event where creator= '$user'";
				 	$result=mysqli_query($connect,$query);
				 	$i=0;
				 	while($rows=mysqli_fetch_array($result)){
				 		$i+=1;
				 		?>

				 		<tr class="event_d_tr" >
				 			<td class="event_d_td"><?php echo $i;?></td>
				 			<td class="event_d_td"><?php echo $rows['name'];?></td>
							<td class="event_d_td"><?php echo $rows['event_id'];?></td>
							<td class="event_d_td"><?php echo $rows['event_date'];?></td>
							<td class="event_d_td"><?php echo $rows['start_t'].' - '.$rows['end_t'];?></td>

							<td class="event_d_td"><?php $ven_id=$rows['venue_id'];
							$querya="Select * from venue where venue_id='$ven_id'";
				 			$resulta=mysqli_query($connect,$querya);

				 			while($rowsa=mysqli_fetch_array($resulta)){

				 			 echo $rowsa['name'];
				 			}?></td>

							<td class="event_d_td"><a href="deleteevent.php?id=<?php echo $rows['event_id'];?>" class="e_delete">Delete</a></td>
				 		</tr>
				 		<?php
				 	}
				 	
					?>
					</table>
				</div>
				<div id="delete_eventorganiser">
					<div class="del_bar" style="margin-top:10px;" id="del_bar_id">Event id</div>
					<div class="del_bar" style="margin-top:6px;" >
						<input id="del_bar_input" type="text" name="eventid_delete">
					</div>
					<div class="del_bar" style="margin-top:8px;">
						<input id="del_bar_submit" type="submit" name="del_event">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="field" id="home_rect" style="display: block;">
		
		<!---->
		<div id="up_events_wrap">
			<div class="head2" >Upcoming Events
			<span style="margin-left: 10px;font-size: 12px">[ Sorted by Date ]</span><br>
			<table class="event_d_table" style="width: 670px;font-size: 14px">
						<tr>
							<td class="event_d_td">S No.</td>
							<td class="event_d_td">Name of Event</td>
							<td class="event_d_td">Event ID</td>
							<td class="event_d_td">Date of Event</td>
							<td class="event_d_td">Timing</td>
							<td class="event_d_td">Venue</td>
							<td class="event_d_td">Group Id</td>
							
						</tr>
					<?php
					$query="Select * from event where creator= '$user'";
				 	$result=mysqli_query($connect,$query);
				 	$i=0;
				 	while($rows=mysqli_fetch_array($result)){
				 		$i+=1;
				 		$venueId=$rows['venue_id'];
				 		$venue_q="Select * from venue where venue_id= '$venueId'";
				 		$venue_result=mysqli_query($connect,$venue_q);
				 		$venuerow=mysqli_fetch_array($venue_result);

				 		?>

				 		<tr class="event_d_tr" >
				 			<td class="event_d_td"><?php echo $i;?></td>
				 			<td class="event_d_td"><?php echo $rows['name'];?></td>
							<td class="event_d_td"><?php echo $rows['event_id'];?></td>
							<td class="event_d_td"><?php echo $rows['event_date'];?></td>
							<td class="event_d_td"><?php echo $rows['start_t'].' - '.$rows['end_t'];?></td>
							<td class="event_d_td"><?php echo $venuerow['name'];?></td>
							<td class="event_d_td"><?php echo $rows['group_id'];?></td>
				 		</tr>
				 		<?php
				 	}
				 	
					?>
					</table>
		</div>
			<div class="b_body" style="background: white;height: auto;margin-left: 10px"></div>
		</div>

		<!---->
		<div style="background:white;padding: 10px;position: absolute;right:20px;top:20px;font:15px arial;border:1px solid #BABABA;border-top:2px solid #FF6E6E;
	border-radius: 3px;">
	<table id="table1" style="border:0px">
	<tr>
		<td colspan="7" id="month_view" style="border:0px">July</td>
	</tr>
	<tr style="color:grey">
		<th>Sun</th>
		<th>Mon</th>
		<th>Tue</th>
		<th>Wed</th>
		<th>thu</th>
		<th>Fri</th>
		<th>Sat</th>
	</tr>
	
</table>
</div>
<div id="display_events" style="text-align: center;width:300px;position: absolute;right:20px;top:20px;height:auto;border:1px solid #BABABA;border-top:2px solid #FF6E6E;
	border-radius: 3px;background: #F5F5F5;display: none;font-family: arial">
	<!--<?php
	$sql1="SELECT * from event where event_date="
	?>-->
	<div id="eventscontClose" style="position: absolute;top:5px;right: 10px;font:25px arial;cursor: pointer;">X</div>
	<span style="font:16px arial;color:grey;">List of Events</span>
	<div style="width:288px;margin:5px;background: white;min-height: 450px;padding: 5px;">
		<p style="font-size: 15px;color:#339A21" id="date_show"></p>
	<p style="font:14px arial">No Events today</p>
	</div>
	
	

</div>
		<!---->
	</div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".nav_buttons").click(function(){

			var temp= $(this).attr("id");
			
			var id='#'+temp+'_rect';
			$('.nav_buttons').css({borderColor:"#26303E" , background:"#C0392B"});
			$(this).css({borderColor:"white" , background:"#A9281B"})
			//alert(id);
			$(".field").hide();
			var selected_el=$(id);
			selected_el.show();
		});
		$(".dd").click(function(){
			$("#menu_dropdown").toggle()
		})
		$("#event_section_create").click(function(){
			//alert("create")
			
			$(".head_butt").css({height:"40px",backgroundColor:"#C0392B"});
			$("#event_section_create").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head").hide();
			$("#create_event").show();
		});
		$("#event_section_delete").click(function(){
			
			$(".head_butt").css({height:"40px",backgroundColor:"#C0392B"});
			$("#event_section_delete").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head").hide();
			$("#delete_event").show();
		})
		$("#group_section_create").click(function(){
			//alert("create")
			
			$(".head_butt_g").css({height:"40px",backgroundColor:"#C0392B"});
			$("#group_section_create").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head_g").hide();
			$("#create_group").show();
		});
		$("#group_section_edit").click(function(){
			//alert("create")
			
			$(".head_butt_g").css({height:"40px",backgroundColor:"#C0392B"});
			$("#group_section_edit").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head_g").hide();
			$("#edit_group").show();
		});
		$("#my_groups").click(function(){
			//alert("create")
			
			$(".head_butt_g").css({height:"40px",backgroundColor:"#C0392B"});
			$("#my_groups").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head_g").hide();
			$("#venue_display").show();
		});

		$("#venue_section_edit").click(function(){
			//alert("create")
			
			$(".head_butt_g").css({height:"40px",backgroundColor:"#C0392B"});
			$("#venue_section_edit").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head_g").hide();
			$("#venue_display_sep").show();
		});
		$("#util_event").click(function(){
			//alert("create")
			
			$(".head_butt_g").css({height:"40px",backgroundColor:"#C0392B"});
			$("#util_event").css({height:"46px",borderBottom:"none",backgroundColor:"white",color:"grey",zIndex:"11"});
			$(".head_g").hide();
			$("#util_display_sep").show();
		});
	})
</script>
<script type="text/javascript">

	function getDayPos(day){
		var days=['sun','mon','tue','wed','thu','fri','sat'],
		lower_day=day.toLowerCase();
		for(l=0;l<7;++l){
			if(lower_day==days[l]){

			return l;
			}
		}
	}
	$(document).ready(function(){
		var calvalues="",
		 date_val=0,
		 d= new Date(),
		 date_str=d.toDateString(),
		 day_array=date_str.split(" "),
		 today=day_array['2'],
		 today_row=parseInt(today/7),
		 today_col=today-(today_row*7),
		 day_pos=getDayPos(day_array['0']),
		 dateStartPoint=day_pos - (today_col -1);
		 if(dateStartPoint<0){
		 	dateStartPoint+=7;
		 }
		 var hu = dateStartPoint/7 + today/7,
		 today_row2=parseInt( hu );


		for(j=0;j>-1;++j){
			calvalues+="<tr>";
			if(date_val>=31)
				break;
			for(i=0;i<7;++i){
				if(date_val>=31)
					break;
				if(j==0 && i<dateStartPoint){
					date_val+=0;
				}else{
					date_val+=1;
				}
				
				if(i==day_pos && j==today_row2){
					if(date_val==0){
						calvalues+='<td data-date=""> </td>';
					}
					else{
						calvalues+='<td class="db" data-date="'+date_val+'/'+day_array['1']+'/'+day_array['3']+'" style="background:#86D8B0;border-color:#86D8B0">'+date_val+'</td>';
					}
				}
				else{
					if(date_val==0){
						calvalues+='<td data-date="" style="border:0px;cursor:auto"> </td>';
					}else{
						calvalues+='<td class="db" data-date="'+date_val+'/'+day_array['1']+'/'+day_array['3']+'">'+date_val+'</td>';
					}
				}
				
			}
			calvalues+='</tr>'
		}
		$("#month_view").html(day_array['1'])
		//alert(day_array['1']);
		$("#table1").append(calvalues);

		$("td").on("click",function(){
			var data_date=$(this).attr("data-date");
			//alert(data_date);
			if(data_date!='' && $(this).attr("id")!='month_view'){
				$("#display_events").show();
				$("#date_show").html(data_date);
			}
		})
		$("#eventscontClose").click(function(){
			$("#display_events").hide();
		})
	})
	
</script>
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
