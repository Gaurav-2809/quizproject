<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                            DASHBOARD
                        </div>
                    </li>
                    <li>
                        <a href="addstudent" id="btn1">ADD STUDENT</a>
                    </li>
                    <li>
                        <a href="addtest.php" id="btn2">ADD TEST</a>
                    </li>
                    <li>
                        <a href="showresult.php" id="btn3">SHOW RESULT</a>
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
                    <form>
                        <div class="form1 show" id="form1">
                            <label for="test">TEST NAME:</label><br>
                            <input type="text" placeholder="Enter Test Name" class="form-control" name="test"
                                id="test"><br>
                            <div class="form-group">
                                <label for="uni">CHOOSE UNIVERSITY</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->
                                <select name="university1" id="university1" class="form-control" onchange="getclass();">
                                    <option value="0">SELECT UNIVERSITY</option>
                                </select>
                                <!-- <div class="contain-input">
                                    <div class="list2" id="list2" style="width: 100%; float: left;"></div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label for="tclass">CHOOSE CLASS</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->

                                <select name="classs" id="classs" class="form-control">
                                    <option value="0">SELECT CLASS</option>
                                </select>
                                <!-- <div class="contain-input">
                                    <div class="list1" id="list1" style="width: 100%; float: left;"></div>
                                </div> -->
                            </div>
                            <div class="button1">
                                <button class="btn1" onclick="addtest();">SUBMIT</button>
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
                            <?php echo $_SESSION['name']?>
                        </div>
                        <div class="id">
                            (TEACHER ID = <?php echo $_SESSION['id']?>UNI01)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type=text/javascript>
function addtest() {
    var test = document.getElementById('test').value;
    var university = document.getElementById('university1').value;
    var class1 = document.getElementById('classs').value;
    var token = "<?php echo password_hash("testtoken", PASSWORD_DEFAULT);?>"
    if (test !== "" && university !== "" && class1 != "") {
        $.ajax({
            type: 'POST',
            url: "ajax/addtest.php",
            data: {
                test: test,
                university: university,
                class1: class1,
                token: token
            },
            success: function(data) {
                alert(data);
                // if (data == 0) {
                //     alert('test added successfully');
                //     window.location = "teacdashboard.php";
                // }
            }
        });
    } else {
        alert('please fill all details');
    }
}



getuni();

function getuni() {
    var token = "<?php echo password_hash("getuni", PASSWORD_DEFAULT);?>"

    $.ajax({
        type: 'POST',
        url: "ajax/cgetuni.php",
        data: {
            token: token
        },
        success: function(data) {
            // $('#list3').html(data);
            $('#university1').html(data);
        }
    });
}


function getclass() {
    var uid = document.getElementById('university1').value;
    var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getclass.php",
        data: {
            uid: uid,
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