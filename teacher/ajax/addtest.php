<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include('connection.php');
if(isset($_POST['classs']) && isset($_POST['test']) && isset($_POST['hour'])){
    $test=test_input($_POST['test']);
    $class=base64_decode(test_input($_POST['classs']));
    $date=test_input($_POST['date']);
    $hour=test_input($_POST['hour']);
    $question=test_input($_POST['question']);
    $mark=test_input($_POST['marks']);
    $each=test_input($_POST['each']);

    if($test=="" || $class=="0" || $date=="" || $hour=="" || $question==""){
        echo "Please fill all details";
        return;
    }
    $query=$db->prepare("INSERT INTO addtest(test,class,tdate,thour,tques,tmarks,teach) VALUES (?,?,?,?,?,?,?)");
    $data=array($test,$class,$date,$hour,$question,$mark,$each);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 0;
}
if(isset($_POST['showtest'])){
    $query=$db->prepare('SELECT * FROM addtest JOIN addclass ON addtest.class=addclass.id
    JOIN adduniversity ON addclass.universityid=adduniversity.uid where id=?;');
    $data=array($_SESSION['classs']);
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['testid']), 'uname'=>$datarow['uname'],'class'=>$datarow['class'],'test'=>$datarow['test']);
        array_push($am, $arr);
    }
    echo json_encode($am);
}
if(isset($_POST['del'])){
    $del=base64_decode(test_input($_POST['del']));
    $query=$db->prepare('DELETE FROM `addtest` WHERE testid=?');
    $data=array($del);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 1;
}
?>