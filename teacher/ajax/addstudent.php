<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include("Classes/PHPExcel.php");
include('connection.php');
if(isset($_POST['classs'])){
	$class = base64_decode($_POST['classs']);
	if(empty($_FILES["excel"]) || $class==""){
		echo "Please fill all details";
		return;
	}
    // $password1_hash=password_hash(substr($fname,0,5). "9876", PASSWORD_DEFAULT);
	$file_array = explode(".", $_FILES["excel"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		$uploadFilePath = 'upload/'.basename($_FILES['excel']['name']);
		move_uploaded_file($_FILES['excel']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel"]["name"];
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet)
		{
			$rowcount = $worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++)
			{
				$fname=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$lname=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $email=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$password1_hash=password_hash(substr($fname,0,5). "9876", PASSWORD_DEFAULT);
				$query = $db->prepare('INSERT INTO addstudent(fname,lname,email,class,password) Values (?,?,?,?,?)');
				$data = array($fname,$lname,$email,$class,$password1_hash);
				$execute=$query->execute($data);
				if($execute)
				{
					echo 0;
				}
			}
		}
	}
}
if(isset($_POST['cid'])){
    $cid=$_POST['cid'];
    $query=$db->prepare('SELECT * FROM addclass where id=?;');
    $data=array($cid);
    $execute=$query->execute($data);
    $am=array();
    while($datarow=$query->fetch()){
        $arr=array('id'=>base64_encode($datarow['id']), 'class'=>$datarow['class']);
        array_push($am, $arr);
    }
    echo json_encode($am);
}
?>