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
                    <!-- <li>
                        <button type="button" class="btn btn-light"><a href="attempt.php" id="btn5">ATTEMPT QUIZ</a></button>
                    </li> -->
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
                <div class="col-sm-9" style="padding-left: 5rem;">
                    <form>
                        <div class="form-group">
                            <label for="uni">CHOOSE TEST</label><br>
                            <select name="list4" id="list4" class="form-control">
                                <option value="0">SELECT TEST NAME</option>
                            </select>
                            <div class="btn">
                                <button class="btn btn-success" onclick="takeTest();">SUBMIT</button>
                            </div>
                        </div>
                    </form>
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
    function takeTest() {
        var test = document.getElementById('list4').value;
        if (test !== "0") {
        $.ajax({
            type: 'POST',
            url: "activeTest.php",
            data: {
                activeTest: test
            },
            success: function(data) {
                // alert(data);
                if (data == 0) {
                    alert("Starting Test");
                    window.location = "testPage.php";
                } else {
                    alert("No Exam Today");
                    window.location.reload();
                }
            }
        });
        }
        else{
            alert("Please Choose Subject");
        }
    }
    gettest();

    function gettest() {
        var classId = <?php echo $_SESSION['class']; ?>;
        var token = "<?php echo password_hash("gettest", PASSWORD_DEFAULT); ?>";
        $.ajax({
            type: 'POST',
            url: "gettest.php",
            data: {
                cid: classId,
                token: token
            },
            success: function(data) {
                // alert(data)
                $('#list4').html(data);
            }
        });
    }
</script>
<script type=text/javascript>
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>

</html>