<?php
include("Classes/PHPExcel.php");
include("connection1.php");

// $class=test_input($_POST['class1']);
if(!empty($_FILES["excel"]))
{
    // $password1_hash=password_hash(substr($sname,0,5). "9876", PASSWORD_DEFAULT);
	$file_array = explode(".", $_FILES["excel"]["name"]);
	if($file_array[1] == "xls" || $file_array[1] == "xlsx")
	{
		$uploadFilePath = 'upload/'.basename($_FILES['excel']['name']);
		move_uploaded_file($_FILES['excel']['tmp_name'], $uploadFilePath);
		$filename = $_FILES["excel"]["name"];
		echo $filename;
		$object = PHPExcel_IOFactory::load($uploadFilePath);
		foreach ($object->getWorksheetIterator() as $worksheet)
		{
			$rowcount = $worksheet->getHighestRow();
			for($row=2;$row<=$rowcount;$row++)
			{
				$fname=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
				$lname=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $email=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$query = $db->prepare('INSERT INTO addstudent(fname,lname,email) Values (?,?,?)');
				$data = array($fname,$lname,$email);
				$execute=$query->execute($data);
				if($execute)
				{
					echo 0;
				}
			}
		}
	}
}

?>