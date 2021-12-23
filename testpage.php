<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="normalize.min.css">
    <link rel="stylesheet" href="sdash.css">
</head>

<body>
    <div class="col-sm-12" style="padding: 0%;">
        <div class="col-sm-3" style="padding: 0%;">
            <div class="navbar">
                <ul>
                    <div class="icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <li style="background-color: white; color: black;">
                        <div class="dash">
                            DASHBOARD
                        </div>
                    </li>
                    <li>
                        <button class="btn5" onclick="result();">result</button>
                    </li>
                    <li>
                        <button class="btn5"><a href="logout.php" id="btn5">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="teacher">
                TEACHER DASHBOARD
            </div>
            <div class="col-sm-12" style="margin-top: 1rem;">
                <div class="col-sm-3">
                    <div class="box1">
                        <div class="uni">
                            TOTAL UNIVERSITY
                        </div>
                        <div class="icon1">
                            <i class="fa fa-university"></i>
                        </div>
                        <div class="no">
                            10+
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box1">
                        <div class="uni">
                            TOTAL TEACHER
                        </div>
                        <div class="icon1">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="no">
                            10+
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box1">
                        <div class="uni">
                            TOTAL CLASS
                        </div>
                        <div class="icon1">
                            <i class="fas fa-chalkboard"></i>
                        </div>
                        <div class="no">
                            10+
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box1">
                        <div class="uni">
                            TOTAL STUDENT
                        </div>
                        <div class="icon1">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="no">
                            10+
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-9" style="padding-left: 5rem;">
                    <form id=questionprint>
                        <div class="questionSet"></div>
                    </form>
                    <!-- <button onclick="previousQuestion(questions)">Previous</button> -->
                    <button id="next" onclick="nextQuestion();">Next</button>
                    <button id="submit" onclick="Submit();">Submit</button>
                </div>
                <div class="col-sm-3">
                    <div class="box">
                        <div class="icon2">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="wel">
                            WELCOME
                        </div>
                        <div class="tname">
                            <?php echo $_SESSION['fname'] ?>
                        </div>
                        <div class="id">
                            (STUDENT ID = 20BCS0<?php echo $_SESSION['stdid'] ?>)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type=text/javascript>
    getQuestion();

    let questionNumber = 0;
    let questions = {};
    let answer = {};
    var submit = document.getElementById('submit');
    // submit.style.display = 'none';

    function nextQuestion() {
        var selectanswer = document.getElementsByName('options');
        for (let i = 0; i < selectanswer.length; i++) {
            if (selectanswer[i].checked == true) {
                answer[questionNumber] = selectanswer[i].value;
                break;
            }
        }
        questionNumber++;
        if (questionNumber == questions.length - 1) {
            $('#next').prop('hidden', true);
            submit.style.display = 'inline';

        }
        createDivForQuestion(questions);
    }

    function Submit() {
        var selectanswer = document.getElementsByName('options');
        for (let i = 0; i < selectanswer.length; i++) {
            if (selectanswer[i].checked == true) {
                answer[questionNumber] = selectanswer[i].value;

                break;
            }
        }
        console.log(answer);

    }

    // function previousQuestion(number) {
    //     questionNumber--;
    //     createDivForQuestion(questions);
    // }

    function getQuestion() {

        var token = "<?php echo password_hash("getQuestions", PASSWORD_DEFAULT); ?>";
        var activeTest = "<?php echo $_SESSION['activeTest'] ?>";
        $.ajax({
            type: 'POST',
            url: "getQuestions.php",
            data: {
                token: token
            },
            success: function(data) {
                data = JSON.parse(data);
                createDivForQuestion(data);
                createDivForAnswer(data);
            }
        });
    }

    function result() {
        if (answer[0] == questions[0].answer) {
            console.log('10');
        }
        else{
            console.log('false');
        }
        createDivForAnswer(questions);
    }

    function createDivForAnswer(data) {
        questions = data;
    }

    function createDivForQuestion(data) {
        questions = data;
        $(".questionSet").html(`<div class="question">
            ${questions[questionNumber].question}
                    </div>
            <div class="answers">
                <input type="radio" id="option1" name="options" value="A">
                <label for="option1">${data[questionNumber].option1}</label><br>
                <input type="radio" id="option2" name="options" value="B">
                <label for="css">${data[questionNumber].option2}</label><br>
                <input type="radio" id="option3" name="options" value="C">
                <label for="javascript">${data[questionNumber].option3}</label> <br>
                <input type="radio" id="option4" name="options" value="D">
                <label for="javascript">${data[questionNumber].option4}</label>  
            </div>`);
    }
</script>
<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>

</html>