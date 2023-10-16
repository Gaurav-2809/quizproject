<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include('connection.php');
if(isset($_POST['uname']))
{
    $uname=test_input($_POST['uname']);
    if($uname==""){
        echo "Please fill all details";
        return;
    }
    $query=$db->prepare("INSERT INTO adduniversity(uname) VALUES (?)");
    $data=array($uname);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 0;
}
if(isset($_POST['showuni'])){
    $query=$db->prepare('SELECT * FROM adduniversity;');
    $data=array();
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['uid']), 'name'=>$datarow['uname']);
        array_push($am, $arr);
    }
    echo json_encode($am);
}
if(isset($_POST['del'])){
    $del=base64_decode(test_input($_POST['del']));
    $query=$db->prepare('DELETE FROM `adduniversity` WHERE uid=?');
    $data=array($del);
    $query1=$db->prepare('SELECT `class` FROM `addclass` WHERE universityid=?');
    $data1=array($del);
    $execute1=$query1->execute($data1);
    if($query1->rowCount()>0){
        echo "Action can't be done, class exist.";
    }
    else{
        $execute=$query->execute($data);
        echo 1;
    }
    
}

?>