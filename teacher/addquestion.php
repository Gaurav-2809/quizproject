<?php
session_start();
$_SESSION["domain_ajax_request_validate_code_cookies"] = substr(bin2hex(random_bytes(16)), 0, 16);
setcookie("0", password_hash($_SESSION["domain_ajax_request_validate_code_cookies"], PASSWORD_DEFAULT), time() + (86400 * 30), "/");
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
                            DASHBOARD
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
                    <!-- <li>
                        <a href="showresult.php" id="btn3">SHOW RESULT</a>
                    </li> -->
                    <!-- <div class="btn2">
                        <button class="btn4" onclick="showtable();">SHOW ALL TEST</button>
                    </div> -->
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
                                <label for="tclass">CHOOSE TEST</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->

                                <select name="test" id="test" class="form-control">
                                    <option value="0">SELECT TEST</option>
                                </select>
                                <!-- <div class="contain-input">
                                    <div class="list1" id="list1" style="width: 100%; float: left;"></div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label for="fclass">CHOOSE FILE</label><br>
                                <input type="file" name="excel" id="excel">
                            </div>
                            <div class="button1">
                                <input type="submit" value="SUBMIT" class="btn1" >
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
            <div class="box-footer">
                <div class="tabledesign">
                    <div class="listclass" id="listclass"></div>
                </div>
            </div>
        </div>
    </div>

</body>
<script type=text/javascript>
    var tf = document.getElementById('excelform');
    tf.addEventListener("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "ajax/addquestion.php",
            contentType: false,
            processData: false,
            data: new FormData(tf),
            async: false,
            success: function(data) {
                if (data != 0) {
                    alert(data);
                    return;
                }
                alert('question added successfully');
                window.location.reload();
            }
        });
    });

    gettest();

    function gettest() {
        $.ajax({
            type: 'POST',
            url: "ajax/addquestion.php",
            data: {
                'cid':'cid'
            },
            success: function(data) {
                console.log(data);
                tes=JSON.parse(data);
                tes.forEach(function(data){
                    var option='<option value='+data['id']+'>'+data['test']+'</option>';
                    $('#test').append(option);
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