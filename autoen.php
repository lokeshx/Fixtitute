<?php
$connect=new mysqli("localhost","root","","fixtitute");


$noOfEntries=20000;


$i=0;
$randstring = '';
function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    global $randstring;
    for ($i = 0; $i < 7; $i++) {
        $randstring = $randstring.$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

// echo $randstring;
while($i<=100){
	$randi1=RandomString();
$randi2=RandomString();
	$i++;
	$userid=110000+$i;
	$username_no=16000+$i;
	$username='B'.$username_no;
	$password=$i;
	$sql="INSERT INTO user (user_id,Username, Password,role,first_name,last_name) VALUES ('{$userid}','{$username}','{$password}','P','{$randi1}','{$randi2}')";

	mysqli_query($connect,$sql);
	
}
echo "done";
?>