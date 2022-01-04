<?php
    session_start();
    include ('connection1.php');
    if(isset($_POST['token']) && password_verify('results', $_POST['token'])){
        $marks = $_POST['sum'];
        $query =$db->prepare('INSERT INTO result(studentid,testid,marks) VALUES (?,?,?)');
        $data = array($_SESSION['stdid'],$_SESSION['activeTest'],$marks);
        $execute = $query->execute($data);
        if($execute){
            echo 0;
        }
    }
?>