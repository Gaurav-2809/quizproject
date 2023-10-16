<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('connection.php');
if (isset($_POST['stdid'])) {
    $stdid=$_POST['stdid'];
    $query = $db->prepare('SELECT * FROM result JOIN addstudent ON result.studentid=addstudent.stdid
         JOIN addtest ON result.testid=addtest.testid where studentid=?;');
    $data = array($stdid);
    $execute = $query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>$datarow['studentid'],'test'=>$datarow['test'],'name'=>$datarow['fname'],'marks'=>$datarow['marks']);
        array_push($am,$arr);
    }
    echo json_encode($am);
}
if(isset($_POST['sum']) && isset($_POST['act'])){
    $marks = $_POST['sum'];
    $act=base64_decode($_POST['act']);
    $query =$db->prepare('INSERT INTO result(studentid,testid,marks) VALUES (?,?,?)');
    $data = array($_SESSION['stdid'],$act,$marks);
    $execute = $query->execute($data);
    if(!$execute){echo "somwthing went wrong"; return;}
    
    echo 0;
}
?>