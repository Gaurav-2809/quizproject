<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include('connection.php');
if(isset($_POST['classs']) && isset($_POST['university1']))
{
    // print_r($_POST);
    $name=test_input($_POST['tname']);
    $email=$_POST['emaill'];
    // echo $email;
    $class1=base64_decode(test_input($_POST['classs']));
    // $uni=base64_decode(test_input($_POST['university1']));
    $password1_hash=password_hash(substr($name,0,5). "9876", PASSWORD_DEFAULT);
    if($class1=="" || $name=="" || $email=""){
        echo "Please fill all details";
        return;
    }
    $query=$db->prepare("INSERT INTO addteacher(tname,email,password,classs) VALUES (?,?,?,?)");
    $data=array($name,$email,$password1_hash,$class1);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 0;
}
if(isset($_POST['uid'])){
    $uid=base64_decode(test_input($_POST['uid']));
    $query=$db->prepare('SELECT * from addclass join adduniversity on adduniversity.uid=addclass.universityid where uid=?');
    $data=array($uid);
    $am=array();
    $execute=$query->execute($data);
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['id']),'class'=>$datarow['class']);
        array_push($am,$arr);
    }
    echo json_encode($am);
}
if(isset($_POST['teacher'])){
    $query=$db->prepare('SELECT * FROM addteacher JOIN addclass ON addteacher.classs=addclass.id
    JOIN adduniversity ON addclass.universityid=adduniversity.uid;');
    $data=array();
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['tid']),'tname'=>$datarow['tname'],'class'=>$datarow['class'],'uname'=>$datarow['uname']);
        array_push($am,$arr);
    }
    echo json_encode($am);
}
if(isset($_POST['del'])){
    $del=base64_decode(test_input($_POST['del']));
    $query=$db->prepare('DELETE FROM `addteacher` WHERE tid=?');
    $data=array($del);
    $execute=$query->execute($data);
    if(!$execute){echo"something went wrong"; return;}
    
    echo 1;
}
?>