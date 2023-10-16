<?php
session_start();
if(!isset($_COOKIE['0']) || !password_verify($_SESSION["domain_ajax_request_validate_code_cookies"],$_COOKIE['0'])){return;}
include('function.php');
include('connection.php');
include("Classes/PHPExcel.php");
if(isset($_POST['test'])){
	$test=base64_decode($_POST['test']);
	if(empty($_FILES["excel"]) || $test==""){
		echo "Please fill all details";
		return;
	}
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
				$question=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$option1=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $option2=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $option3=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $option4=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
                $correct=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
				$query = $db->prepare('INSERT INTO addquestion(test,question,option1,option2,option3,option4,correct) Values (?,?,?,?,?,?,?)');
				$data = array($test,$question,$option1,$option2,$option3,$option4,$correct);
				$execute=$query->execute($data);
				if(!$execute){echo "something went wrong"; return;}
				
				echo 0;
			}
		}
	}
}
if(isset($_POST['cid'])){
	$query=$db->prepare('SELECT * FROM addtest where class=?');
    $data=array($_SESSION['classs']);
    $execute=$query->execute($data);
	$am=array();
	while($datarow=$query->fetch()){
		$arr=array('id'=>base64_encode($datarow['testid']),'test'=>$datarow['test']);
		array_push($am,$arr);
	}
	echo json_encode($am);
}

?>