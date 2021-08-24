<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $Username = $_POST['Username'];
        $pass1 = $_POST['pass1'];

        $query = $db->prepare('SELECT * FROM users WHERE fname=?');
        $data = array($Username);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($pass1,$datarow['pass']))
                {
                    $_SESSION['id']=$datarow['uid'];
                    $_SESSION['fname']=$datarow['fname'];
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