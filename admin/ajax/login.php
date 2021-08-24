<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $Username =$_POST['email1'];
        $pass =$_POST['password'];


        $query = $db->prepare('SELECT * FROM quizdata WHERE email=?');
        $data = array($Username);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($pass,$datarow['password']))
                {
                    $_SESSION['id']=$datarow['uid'];
                    $_SESSION['email']=$datarow['email'];
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

 


?>