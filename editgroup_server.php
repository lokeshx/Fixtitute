<?php
  $connect=new mysqli("localhost","root","","fixtitute");
  if(isset($_POST['userCheck']))
   {
    // echo "yes";
    $groupName=$_POST['g_name_add'];
    $description=$_POST['g_desc_add'];
    $userCheck=$_POST['userCheck'];
    $gid=$_POST['g_id'];
    $memberId='';
    foreach($userCheck as $ids){
      $memberId=$memberId.' '.$ids;
    }
    // echo $memberId;
    // $sql="INSERT INTO groups (group_name,user_id,description,members) VALUES('{$groupName}','{$creator}','{$description}','{$memberId}')";

    $sql="UPDATE groups
          SET group_name = '$groupName', description= '$description', members='$memberId'
          WHERE group_id = '$gid';";
    if ($connect->query($sql) === TRUE){
      header("location:db.php");
    }
    else{
      echo "na";
    }
    // echo "done";
    
   }
   else if(isset($_POST['g_name_add'])){
      echo "select atleast one participant";
   }
   else {
    echo "nahi hua";
   }
?>