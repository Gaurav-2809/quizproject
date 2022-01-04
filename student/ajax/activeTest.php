<?php
include('connection1.php');
session_start();
$today = date("Y-m-d");
// echo "hello";
$examdate = date("2022-01-04");
// echo $examdate;
// echo $today;
// echo "hello";
if ($today == $examdate) {
  // echo "hello";
  $testId = $_POST['activeTest'];
  $_SESSION['activeTest'] = $testId;
  echo 0;
} else {
  echo 1;
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>