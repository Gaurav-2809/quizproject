<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("teachertoken",$_POST['token']))
{
    $tname=test_input($_POST['tname']);
    $class=test_input($_POST['class2']);
    $university=test_input($_POST['university']);

    if($tname!="")
    {
        $query=$db->prepare("INSERT INTO addteacher(tname,class,university) VALUES (?,?,?)");

        $data=array($tname,$class,$university);

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