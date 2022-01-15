<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/tdash.css">
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
                            TEACHER DASHBOARD
                        </div>
                    </li>
                    <li>
                        <a href="teacdashboard.php" id="btn1">ADD STUDENT</a>
                    </li>
                    <li>
                        <a href="addtest.php" id="btn2">ADD TEST</a>
                    </li>
                    <li>
                        <a href="addquestion.php" id="btn4">ADD QUESTION</a>
                    </li>
                    <li>
                        <a href="showresult.php" id="btn3">SHOW RESULT</a>
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
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form id="excelform">
                        <div class="form1 show" id="form1">
                            <div class="form-group">
                                <label for="tclass">CHOOSE CLASS</label><br>
                                <select name="classs" id="classs" class="form-control">
                                    <option value="0">SELECT CLASS</option>
                                </select>
                                <div class="form-group">
                                    <label for="fclass" style="margin-top: 1rem;">CHOOSE FILE</label><br>
                                    <input type="file" name="excel" id="excel">
                                </div>
                                <div class="button1">
                                    <button class="btn1" onclick="addstudent();">SUBMIT</button>
                                </div>
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
                            <?php echo $_SESSION['name'] ?>
                        </div>
                        <div class="id">
                            (TEACHER ID = <?php echo $_SESSION['id'] ?>UNI01)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type=text/javascript>
    function addstudent() {
        var excelform = document.getElementById('excelform');
        var data = new FormData(excelform);
        // var class1 = document.getElementById('classs').value;
        var token = "<?php echo password_hash("studenttoken", PASSWORD_DEFAULT); ?>"
            $.ajax({
                type: 'POST',
                url: "ajax/exceldata.php",
                    contentType:false,
                    processData:false,
                    data: data,
                success: function(data) {
                    if (data == 0) {
                        alert('student added successfully');
                        window.location.reload();
                    }
                }
            });

    }

    getclass();

    function getclass() {
        var classId = <?php echo $_SESSION['class']; ?>;
        var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT); ?>";
        $.ajax({
            type: 'POST',
            url: "ajax/getclass.php",
            data: {
                // uid: uid,
                cid: classId,
                token: token
            },
            success: function(data) {
                // alert(data)
                $('#classs').html(data);
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