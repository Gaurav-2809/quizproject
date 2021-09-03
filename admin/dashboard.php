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
                        <a href="#" id="btn1">ADD UNIVERSITY</a>
                    </li>
                    <li>
                        <a href="#" id="btn2">ADD CLASS</a>
                    </li>
                    <li>
                        <a href="#" id="btn3">ADD TEACHER</a>
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
                        <div class="form1 show" id="form1">
                            <label for="uname">ADD UNIVERSITY:</label><br>
                            <input type="text" placeholder="Enter University" class="form-control" name="uname"
                                id="uname"><br>
                            <div class="button1">
                                <button class="btn1" onclick="adduni();">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form2 hidden" id="form2">
                            <label for="class">ADD CLASS:</label><br>
                            <input type="text" placeholder="Enter Class" class="form-control" name="class1"
                                id="class1"><br>
                            <div class="form-group">
                                <label for="uni">CHOOSE UNIVERSITY</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->
                                <div class="contain-input">
                                    <div class="list" id="list" style="width: 100%; float: left;"></div>
                                </div>
                            </div>
                            <div class="button1">
                                <button  style="margin-top: 2rem;" class="btn1" onclick="addclass();">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form3 hidden" id="form3">
                            <label for="tname">ADD TEACHER:</label><br>
                            <input type="text" placeholder="Enter Teacher" class="form-control" name="tname"
                                id="tname"><br>
                            <div class="form-group">
                                <label for="tclass">CHOOSE CLASS</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->
                                <div class="contain-input">
                                    <div class="list1" id="list1" style="width: 100%; float: left;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uni" style="margin-top: 2rem;">CHOOSE UNIVERSITY</label><br>
                                <!-- <input type="text" class="form-control" placeholder="Enter Password" name="class"
                                id="class"><br> -->
                                <div class="contain-input">
                                    <div class="list2" id="list2" style="width: 100%; float: left;"></div>
                                </div>
                            </div>
                            <div class="button1">
                                <button class="btn1" onclick="addteacher();" style="margin-top: 2rem;">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    // document.getElementById('form2').style.display = 'none';
    // document.getElementById('form3').style.display = 'none';
    var btn = document.getElementById('btn1');
    btn.addEventListener("click", function () {
        var adduni = document.getElementById('form1')
        var addclass = document.getElementById('form2')
        var addteacher = document.getElementById('form3')
        addclass.classList.add('hidden')
        addteacher.classList.add('hidden')
        adduni.classList.remove('hidden')
        adduni.classList.add('show')

    });

    var btn1 = document.getElementById('btn2');
    btn1.addEventListener("click", function () {
        var adduni = document.getElementById('form1')
        var addclass = document.getElementById('form2')
        var addteacher = document.getElementById('form3')
        adduni.classList.add('hidden')
        addteacher.classList.add('hidden')
        addclass.classList.remove('hidden')
        addclass.classList.add('show')
    });

    var btn2 = document.getElementById('btn3');
    btn2.addEventListener("click", function () {
        var adduni = document.getElementById('form1')
        var addclass = document.getElementById('form2')
        var addteacher = document.getElementById('form3')
        adduni.classList.add('hidden')
        addclass.classList.add('hidden')
        addteacher.classList.remove('hidden')
        addteacher.classList.add('show')
    });


    function adduni() {
        var uname = document.getElementById('uname').value;
        var token = "<?php echo password_hash("unitoken", PASSWORD_DEFAULT);?>"
        if (uname !== "") {
            $.ajax(
                {
                    type: 'POST',
                    url: "ajax/adduni.php",
                    data: { uname: uname, token: token },
                    success: function (data) {
                        if (data == 0) {
                            alert('university added successfully');
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



    function addteacher() {
        var tname = document.getElementById('tname').value;
        var class2 = document.getElementById('class2').value;
        var university = document.getElementById('university').value;
        var token = "<?php echo password_hash("teachertoken", PASSWORD_DEFAULT);?>"
        if (tname !== "" && class2 != "" && university != "") {
            $.ajax(
                {
                    type: 'POST',
                    url: "ajax/addteacher.php",
                    data: { tname: tname, class2: class2, university: university, token: token },
                    success: function (data) {
                        if (data == 0) {
                            alert('teacher added successfully');
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
                    alert(data)
                    $('#list').html(data);
                    $('#list2').html(data);
                }
            }
        );
    }
    function getclass() {
        var uid = document.getElementById('university').value;
        var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>" 
        alert(uid)
        $.ajax(
            {
                type: 'POST',
                url: "ajax/getclass.php",
                data: { uid: uid, token: token },
                success: function (data) {
                    $('#list1').html(data);
                }
            }
        );
    }


    // function getclass(uid) {
    //     var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>"

    //     $.ajax(
    //         {
    //             type: 'POST',
    //             url: "ajax/getclass.php",
    //             data: { token: token },
    //             success: function (data) {
    //                 $('#list1').html(data);
    //             }
    //         }
    //     );
    // }
</script>
<script type=text/javascript>
 $('form').submit(function(e){
     e.preventDefault();
 });
</script>

</html>