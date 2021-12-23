<?php
    include('connection1.php');
    session_start();
    // echo "Faizan";

    class QuestionSet {
        public $question;
        public $option1;
        public $option2;
        public $option3;
        public $option4;
        public $answer;
    }

    if(isset($_POST['token']) && password_verify('getQuestions', $_POST['token'])){
    
        $activeTest = $_SESSION['activeTest'];
        $query = $db->prepare('SELECT * FROM addquestion WHERE test=?;');
        $data = array($activeTest);
        $execute = $query->execute($data);
        $questions = array();
        while($datarow=$query->fetch()){
            $q = new QuestionSet();
            $q->question = $datarow['question'];
            $q->option1 = $datarow['option1'];
            $q->option2 = $datarow['option2'];
            $q->option3 = $datarow['option3'];
            $q->option4 = $datarow['option4'];
            $q->answer = $datarow['correct'];
            
            array_push($questions, $q);
        }

        $data = json_encode($questions);
        echo $data;
  
    }
    else {
        echo "Server Error";
    }
?>