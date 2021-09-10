<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
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
                        <div class="form2 show" id="form2">
                            <label for="class">ADD CLASS:</label><br>
                            <input type="text" placeholder="Enter Class" class="form-control" name="class1"
                                id="class1"><br>
                            <div class="form-group">
                                <label for="uni">CHOOSE UNIVERSITY</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->
                                <div class="contain-input">
                                    <div class="list3" id="list3" style="width: 100%; float: left;"></div>
                                </div>
                            </div>
                            <div class="button1">
                                <button  style="margin-top: 2rem;" class="btn1" onclick="addclass();">SUBMIT</button>
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
    

    function addclass() {
        var class1 = document.getElementById('class1').value;
        var uid = document.getElementById('university').value;
        var token = "<?php echo password_hash("classtoken", PASSWORD_DEFAULT);?>"
        if (class1 !== "") {
            $.ajax(
                {
                    type: 'POST',
                    url: "ajax/addclass.php",
                    data: { class1: class1, uid: uid, token: token },
                    success: function (data) {
                        if (data == 0) {
                            alert('class added successfully');
                            window.location = "dashboard.php";
                        }
                    }
                }
            );
        }
        else {
            alert('please fill all details');
        }
    }
getuni();
    function getuni() {
        var token = "<?php echo password_hash("getuni", PASSWORD_DEFAULT);?>"

        $.ajax(
            {
                type: 'POST',
                url: "ajax/getuni.php",
                data: { token: token },
                success: function (data) {
                    $('#list3').html(data);
                    // $('#list2').html(data);
                }
            }
        );
    }
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
   
</script>
<script type=text/javascript>
 $('form').submit(function(e){
     e.preventDefault();
 });
</script>

</html>