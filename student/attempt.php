<?php
session_start();
$_SESSION["domain_ajax_request_validate_code_cookies"] = substr(bin2hex(random_bytes(16)), 0, 16);
setcookie("0", password_hash($_SESSION["domain_ajax_request_validate_code_cookies"], PASSWORD_DEFAULT), time() + (86400 * 30), "/");
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
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>SR. NO.</th>
                                <th>TEST NAME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
    gettest();

    function gettest() {
        var classId = <?php echo $_SESSION['class']; ?>;
        $.ajax({
            type: 'POST',
            url: "ajax/gettest.php",
            data: {
                cid: classId
            },
            success: function(data) {
                console.log(data);
                op = JSON.parse(data);
                op.forEach(function(data,i) {
                    var tr = '<tr><td>'+(i+1)+'</td><td>'+data['test']+'</td><td><button class="btn btn-success"><a style="text-decoration: none; color:white;" href="testpage.php?id='+data['id']+'&name='+data['test']+'">SUBMIT</a></button></td></tr>';
                    $('tbody').append(tr);
                })
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