<?php
    include('connection1.php');
    session_start();
    $testId = $_POST['activeTest'];
    echo $testId;
    $_SESSION['activeTest'] = $testId;

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>