<?php
  $connect=new mysqli("localhost","root","","fixtitute");
  if(isset($_POST['userCheck']))
   {
    // echo "yes";
    $groupName=$_POST['g_name_add'];
    $description=$_POST['g_desc_add'];
    $userCheck=$_POST['userCheck'];
    $creator=$_POST['g_creator'];
    $memberId='';
    foreach($userCheck as $ids){
      $memberId=$memberId.' '.$ids;
    }
    // echo $memberId;
    $sql="INSERT INTO groups (group_name,user_id,description,members) VALUES('{$groupName}','{$creator}','{$description}','{$memberId}')";
    if ($connect->query($sql) === TRUE){
      header("location:db.php");
    }
    else{
      echo "na";
    }
    // echo "done";
    
   }
   else if(isset($_POST['g_name_add'])){
      echo "khali hai";
   }
   else {
    echo "nahi hua";
   }
?>