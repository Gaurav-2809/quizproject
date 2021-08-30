<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("classtoken",$_POST['token']))
{
    $class=test_input($_POST['class']);

    if($class!="")
    {
        $query=$db->prepare("INSERT INTO addclass(class) VALUES (?)");

        $data=array($class);

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