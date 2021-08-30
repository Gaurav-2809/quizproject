<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("unitoken",$_POST['token']))
{
    $uname=test_input($_POST['uname']);

    if($uname!="")
    {
        $query=$db->prepare("INSERT INTO users(uname) VALUES (?)");

        $data=array($uname);

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