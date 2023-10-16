<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include('connection.php');
if(isset($_POST['class1']) && isset($_POST['university']))
{
    $class1=test_input($_POST['class1']);
    $uni=base64_decode(test_input($_POST['university']));
    if($class1=="" || $uni=="0"){
        echo "Please fill all details";
        return;
    }
    $query=$db->prepare("INSERT INTO addclass(uid,class) VALUES (?,?)");
    $data=array($uni,$class1);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 0;
}
if(isset($_POST['showclass'])){
    $query=$db->prepare('SELECT * FROM adduniversity JOIN addclass ON addclass.universityid=adduniversity.uid;');
    $data=array();
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['id']), 'name'=>$datarow['uname'],'class'=>$datarow['class']);
        array_push($am, $arr);
    }
    echo json_encode($am);
}
if(isset($_POST['del'])){
    $del=base64_decode(test_input($_POST['del']));
    $query=$db->prepare('DELETE FROM `addclass` WHERE id=?');
    $data=array($del);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 1;
}
?>