<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("classtoken",$_POST['token']))
{
    $class=test_input($_POST['class1']);
    $uid=$_POST['uid'];

    
        $query=$db->prepare("INSERT INTO addclass(class,uid) VALUES (?,?)");

        $data=array($class,$uid);

        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>