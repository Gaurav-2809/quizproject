<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("testtoken",$_POST['token']))
{
    $test=test_input($_POST['test']);
    $university=test_input($_POST['university']);
    $class=test_input($_POST['class1']);

    if($test!="")
    {

        $query=$db->prepare("INSERT INTO addtest(test,university,class) VALUES (?,?,?)");
        $data=array($test,$university,$class);
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