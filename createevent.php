<?php
$connect= new mysqli("localhost","root","","fixtitute");
if(isset($_POST['e_name_add']))
{
$evename=$_POST['e_name_add'];
//echo "hell";
$username=$_COOKIE['username'];
 $evedate=$_POST['e_date_add'];
 $starttime=$_POST['st_c_time'];
 $endtime=$_POST['end_c_time'];
 $venue_selected=$_POST['venue_select'];
 $creator=$_POST['e_creator'];
 $gid=$_POST['sel_grpid'];
 $descrip=$_POST['desc-add'];
 $role1=mysqli_query($connect,"SELECT role from user where Username='$username'");
//echo $venue_selected;
 $sql="SELECT * from event where event_date='$evedate' AND start_t='$starttime' AND end_t='$endtime' AND group_id='$gid'";
 $result1=mysqli_query($connect,$sql);
$check=mysqli_num_rows($result1);

if($check>0 || $role1!='O')
{
	echo '<script language="javascript">';
echo 'alert("event cannot be created, please choose empty time slot or you r not an organiser")';
echo '</script>';
header("refresh:2;url=db.php");
}
else
{
  if($venue_selected=='a1_1a')
 {
    
 	$query="Select * from venue where name='A1-1a'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php"); 
   
}
 else if($venue_selected=='a1_2a')
 {
 	$query="Select * from venue where name='A1-2a'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php"); 

 }
 else if($venue_selected=='a1_3')
 {
 	$query="Select * from venue where name='A1-3'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }
 else if($venue_selected=='a1_nkn')
 {
 	$query="Select * from venue where name='A1-NKN'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }
 else if($venue_selected=='D1_Lounge')
 {
 	$query="Select * from venue where name='D1'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }
 else if($venue_selected=='B1')
 {
 	$query="Select * from venue where name='B1'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }
 else if($venue_selected=='B6')
 {
 	$query="Select * from venue where name='B6'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }
 else if($venue_selected=='B7')
 {
 	$query="Select * from venue where name='B7'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php");
 }

 else if($venue_selected=='a5')
 {
    
 	$query="Select * from venue where name='A5'";
 	$result=mysqli_query($connect,$query);
 	$result=mysqli_fetch_array($result);
 	$venueid=$result['venue_id'];
 	$sql1="INSERT INTO event(name,start_t,end_t,venue_id,event_date,creator,group_id,type,event_desc) VALUES('{$evename}','{$starttime}','{$endtime}','{$venueid}','{$evedate}','{$creator}','{$gid}','N','{$descrip}')";
    mysqli_query($connect,$sql1);
     header("location:db.php"); 
   
}
 else echo "ERROR";
 }
}
else echo "error";
?>