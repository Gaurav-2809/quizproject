<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('connection.php');
if(isset($_POST['cid'])){
    $cid=$_POST['cid'];
    $query=$db->prepare('SELECT * FROM addtest where class=?');
    $data=array($cid);
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['testid']),'test'=>$datarow['test']);
        array_push($am,$arr);
    }
    echo json_encode($am);
}
if(isset($_POST['act'])){
    
    $activeTest =base64_decode($_POST['act']);
    // echo $activeTest;
    $query = $db->prepare('SELECT * FROM addquestion WHERE test=?;');
    $data = array($activeTest);
    $execute = $query->execute($data);
    $questions = array();
    while($datarow=$query->fetch()){
        $q = array('id'=>$datarow['questionid'],'question'=>$datarow['question'],'option1'=>$datarow['option1'],'option2'=>$datarow['option2'],'option3'=>$datarow['option3'],'option4'=>$datarow['option4'],'correct'=>$datarow['correct']);
        
        array_push($questions, $q);
    }

    echo json_encode($questions);

}
?>