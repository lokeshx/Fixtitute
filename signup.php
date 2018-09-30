<?php
 $connect= new mysqli("localhost","root","","fixtitute");
 $firstname=$_POST['first-name'];
 $lastname=$_POST['last-name'];
 $username=$_POST['email-address'];
 $password=$_POST['repeat_password'];
 if(isset($_POST['Participant']))
 {
    $sql="INSERT INTO user (Username, Password,role,first_name,last_name) VALUES ('{$username}','{$password}','P','{$firstname}','{$lastname}')";
    if ($connect->query($sql) === TRUE) {
     setcookie('username',$username, time() + (86400 * 30), "/");setcookie('password',$password, time() + (86400 * 30), "/");

   				header("location:db.php");
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
else if(isset($_POST['Organiser']))
{
	$sql="INSERT INTO user (Username, Password, role ,first_name,last_name) VALUES ('{$username}','{$password}','O','{$firstname}','{$lastname}')";
	if ($connect->query($sql) === TRUE) {
     setcookie('username',$username, time() + (86400 * 30), "/");setcookie('password',$password, time() + (86400 * 30), "/");

   				header("location:db.php");
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
?>