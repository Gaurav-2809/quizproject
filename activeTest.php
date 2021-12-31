<?php
include('connection1.php');
session_start();
$today = date("Y-m-d");
$examdate = date("2021-12-24");
if ($today == $examdate) {
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