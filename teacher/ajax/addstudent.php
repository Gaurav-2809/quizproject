<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("studenttoken",$_POST['token']))
{
    $sname=test_input($_POST['sname']);
    $email=test_input($_POST['email']);
    $university=test_input($_POST['university']);
    $class=test_input($_POST['class1']);

    if($sname!="")
    {

        $password1_hash=password_hash(substr($sname,0,5). "9876", PASSWORD_DEFAULT);
        $query=$db->prepare("INSERT INTO addstudent(sname,email,university,class,password) VALUES (?,?,?,?,?)");
        $data=array($sname,$email,$university,$class,$password1_hash);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "server error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>