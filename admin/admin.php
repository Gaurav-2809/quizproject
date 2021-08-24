<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <section id="header">
        <div class="col-sm-12">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">  
                    <div class="box1">
                        <div class="sign">
                            <h1>SIGN IN</h1>
                        </div>
                        <div class="image">
                            <img src="admin1.jpg">
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form">
                                    <form>
                                        <label for="text">Username:</label><br>
                                        <input type="text" placeholder="Enter email" name="email" 
                                        id="email" class="form-control"><br>
                                        <label for="password">Password:</label><br>
                                        <input type="password" class="form-control" placeholder="Enter Password" 
                                            name="password" id="password"><br>
                                        <div class="button2">
                                            <button class="btn5" onclick="sendlogin();">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>       
            </div>
            <div class="col-sm-1"></div>
        </div>
    </section>
</body>
<script type="text/javascript">
    function sendlogin()
    {
       var email = document.getElementById('email').value;
       var password = document.getElementById('password').value;
       var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>";
       if(email!=="" && password!=="")
       {
         $.ajax(
                   {
                       type: 'POST',
                       url:"ajax/login.php",
                       data:{email:email,password:password,token:token},
                       success:function(data)
                       {
                        if(data==0){
                            alert('login successfull');
                            window.location="dashboard.php";
                        }
                        else{
                            alert(data)
                        }      
                      }
                    }
                );
       } 
       else
       {
           alert('please fill all details');
       }
    }
</script>
</html>