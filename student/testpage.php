<?php
session_start();
$_SESSION["domain_ajax_request_validate_code_cookies"] = substr(bin2hex(random_bytes(16)), 0, 16);
setcookie("0", password_hash($_SESSION["domain_ajax_request_validate_code_cookies"], PASSWORD_DEFAULT), time() + (86400 * 30), "/");
if (!isset($_SESSION['fname'])) {
    header("location: index.php");
}
// print_r(base64_decode($_GET['id']));
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/sdash.css">
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
                        <button type="button" class="btn btn-light"><a href="logout.php" id="btn5">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="teacher">
                STUDENT DASHBOARD
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
                <div class="col-sm-2"></div>
                <div class="col-sm-7">
                    <form id=questionprint style="margin-right: 5rem;">
                        <div class="questionSet "></div>
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
    let answer = [];
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
        let sum = 0;
        var selectanswer = document.getElementsByName('options');
        for (let i = 0; i < selectanswer.length; i++) {
            if (selectanswer[i].checked == true) {
                answer[questionNumber] = selectanswer[i].value;

                break;
            }
        }
        console.log(answer);
        for (let i = 0; i < answer.length; i++) {
            if (answer[i] == questions[i].correct) {
                sum = sum + 10;
            } else {
                sum = sum - 10;
            }
        }
        console.log(sum);
        var act = "<?php echo $_GET['id'] ?>";
        $.ajax({
            type: 'POST',
            url: "ajax/getresult.php",
            data: {
                sum: sum,
                act: act
            },
            success: function(data) {
                // alert(data);
            }
        });
        let text = "Are you sure want to submit test?";
        if (confirm(text) == true) {
            window.location = "studentdash.php";
        }

    }

    function getQuestion() {

        var act = "<?php echo $_GET['id'] ?>";
        $.ajax({
            type: 'POST',
            url: "ajax/gettest.php",
            data: {
                act: act
            },
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                // console.log(dat);
                createDivForQuestion(data);
                createDivForAnswer(data);
            }
        });
    }

    function createDivForAnswer(data) {
        questions = data;
    }

    function createDivForQuestion(data) {
        questions = data;
        $(".questionSet").html(`<div class="question">
            ${data[questionNumber].question}
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