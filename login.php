<?php
    include('connection1.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $email=test_input($_POST['email']);
        $password=test_input($_POST['password']);

        $query = $db->prepare('SELECT * FROM addstudent WHERE email=?');
        $data = array($email);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($password,$datarow['password']))
                {
                    $_SESSION['email']=$datarow['email'];
                    $_SESSION['sname']=$datarow['sname'];
                    $_SESSION['id']=$datarow['id'];
                    echo 0;
                }
                else
                {
                    echo "password doesn't match";
                }
            }
        }
        else{
            echo "Please signup....no data found";
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