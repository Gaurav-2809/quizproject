<?php
session_start();
$_SESSION["domain_ajax_request_validate_code_cookies"] = substr(bin2hex(random_bytes(16)), 0, 16);
setcookie("0", password_hash($_SESSION["domain_ajax_request_validate_code_cookies"], PASSWORD_DEFAULT), time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                            <button class="btn4" onclick="showuni();">SHOW ALL UNIVERSITY</button>
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
                    <form id="form1">
                        <div class="form1 show" id="form1">
                            <label for="uname">ADD UNIVERSITY:</label><br>
                            <input type="text" placeholder="Enter University" class="form-control" name="uname" id="uname"><br>
                            <div class="button1">
                                <input class="btn1" type="submit" value="SUBMIT">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="box-footer">
                <div class="tabledesign">
                    <div class="listclass" id="listclass">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>SR. NO.</th>
                                    <th>UNIVERSITY</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var tf = document.getElementById('form1');
    tf.addEventListener("submit", function(e) {
        // alert(tf);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "ajax/adduni.php",
            contentType: false,
            processData: false,
            data: new FormData(tf),
            async: false,
            success: function(data) {
                if (data != 0) {
                    alert(data);
                    return;
                }
                alert('university added successfully');
                window.location.reload();
            }
        });
    });

    function showuni() {
        $.ajax({
            type: 'POST',
            url: "ajax/adduni.php",
            data: {
                'showuni': 'showuni'
            },
            success: function(data) {
                console.log(data);
                uni = JSON.parse(data);
                console.log(uni);
                uni.forEach(function(data, i) {
                    console.log(data);
                    var tr = '<tr><td>' + (i + 1) + '</td><td>' + data['name'] + '</td><td><div class="contact-delete dlt" data-id=' + data['id'] + '><button class="btn btn-danger">Delete</button></div></td></tr>';
                    $('tbody').append(tr);
                })
                $('.dlt').click(function() {
                    var del = $(this).attr('data-id');
                    console.log(del);
                    if (!confirm('Are you sure want to delete?')) {
                        return false;
                    }
                    $.ajax({
                            type: "POST",
                            url: "ajax/adduni.php",
                            data: {
                                del: del
                            },
                            success: function(data) {
                                if (data != 1) {
                                    alert(data);
                                    return;
                                }
                                alert('university deleted successfully');
                                window.location = "dashboard.php";
                            }
                        });

                })
            }
        });
    }
</script>


</html>