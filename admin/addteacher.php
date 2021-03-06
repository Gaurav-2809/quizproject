<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
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
                        <a href="dashboard.php" id="btn1">ADD UNIVERSITY</a>
                    </li>
                    <li>
                        <a href="addclass.php" id="btn2">ADD CLASS</a>
                    </li>
                    <li>
                        <a href="addteacher.php" id="btn3">ADD TEACHER</a>
                    </li>
                    <li>
                        <div class="btn2">
                            <button class="btn4" onclick="showtable();">SHOW ALL TEACHERS</button>
                        </div>
                    </li>
                    <li>
                        <button class="btn5"><a href="logout.php" id="btn5">LOGOUT</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9" style="padding: 0%;">
            <div class="admin">
                ADMIN DASHBOARD
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
                        <div class="form3 show" id="form3">
                            <label for="tname">ADD TEACHER:</label><br>
                            <input type="text" placeholder="Enter Teacher" class="form-control" name="tname"
                                id="tname"><br>
                            <label for="email">ADD EMAIL:</label><br>
                            <input type="text" placeholder="Enter Email" class="form-control" name="email"
                                id="email"><br>
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
                                <button class="btn1" onclick="addteacher();" style="margin-top: 2rem;">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="box-footer">
                <div class="tabledesign">
                    <div class="listclass" id="listclass"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
function addteacher() {
    var tname = document.getElementById('tname').value;
    var email = document.getElementById('email').value;
    var class1 = document.getElementById('classs').value;
    var token = "<?php echo password_hash("teachertoken", PASSWORD_DEFAULT);?>"
    if (tname !== "" && email !== "" && class1 != "") {
        $.ajax({
            type: 'POST',
            url: "ajax/addteacher.php",
            data: {
                tname: tname,
                class1: class1,
                email: email,
                token: token
            },
            success: function(data) {
                if (data == 0) {
                    alert('teacher added successfully');
                    window.location = "dashboard.php";
                }
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
            // $('#list').html(data);
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
            $('#classs').html(data);
        }
    });
}

// getallteacher();
function showtable() {
    var token = "<?php echo password_hash("getteacher", PASSWORD_DEFAULT);?>";
    $.ajax({
        type: 'POST',
        url: "ajax/getallteacher.php",
        data: {
            token: token
        },
        success: function(data) {
            $('#listclass').html(data);
        }
    });
}

function deleted(i){
    // alert(i)
    var token='<?php echo password_hash("deletetoken", PASSWORD_DEFAULT);?>';
    $.ajax({
        type: 'POST',
        url: "ajax/delteacher.php",
        data: {
            token: token,
            id:i
        },
        success: function(data) {
            if (data == 0) {
                alert('teacher deleted successfully');
                window.location = "dashboard.php";
                }
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