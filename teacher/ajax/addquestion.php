<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("questiontoken",$_POST['token']))
{
    $test=test_input($_POST['test']);
    $ques = test_input($_POST['ques']);
    $option1 = test_input($_POST['option1']);
    $option2 = test_input($_POST['option2']);
    $option3 = test_input($_POST['option3']);
    $option4 = test_input($_POST['option4']);
    $correct = test_input($_POST['correct']);

    if($test!="")
    {

        $query=$db->prepare("INSERT INTO addquestion(test,question,option1,option2,option3,option4,correct) VALUES (?,?,?,?,?,?,?)");
        $data=array($test,$ques, $option1, $option2, $option3, $option4, $correct);
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