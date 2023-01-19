<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/font awesome/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Document</title>
</head>

<body>
    <style> 
        .form {
            background-color: rgba(137, 43, 226, 0.17) ;
            position: absolute;
            width: 100%;
            height: 1500px;
        }

        .formlogin {
            background-color: white;
            position: relative;
            width: 45%;
            margin: auto;
            text-align: center;
            border-radius: 20px;
            margin-top: 3rem;
            


        }
        .fa.fa-th-large{
            color: blueviolet;
            margin-top: 2rem;
            padding-right: 23rem;
            font-size: 40px;
        }

        .login {
            padding-bottom: 0;
            padding-right:20rem ;
           
        }

        .text {
            color: grey;
            padding-top: 0;
            padding-right: 115px;
        }

        .fa-google{
            color: blueviolet;
            align-content: center;
            padding-left: 8rem;
            position: absolute;
        }

        .googlelink {
            text-decoration: none;
           padding: 1rem 9.5rem;
           text-align: center;
           color: black;
           font-weight: bolder;
           position: relative;
          
        }
        
        .btn{
            border: 1px solid gray;
           background-color:  rgba(128, 128, 128, 0);
            border-radius: 30px;
            margin-top: 1rem;
            padding: 12px 0;
            margin-left: 1rem;
          
        }
        .line {
            margin-left: 6rem;
            margin-right: 6rem;
            color:  rgba(128, 128, 128, 0.244);
        }

        #input {
            border: 1px solid grey;
            border-radius: 30px;
            display: block;
        
            margin-left: 95px;
            padding: 12px 9rem;
            background-color: rgba(128, 128, 128, 0) ;
            text-align: center;
            
        }
         

        label {
            padding-right: 22rem;
           background-color: rgba(128, 128, 128, 0);
           display: block;
           margin-top: 2rem;
            
        }

        .pwd-support {
            display: flex;
            justify-content: space-around;
        }

        .checkbox {
            display: flex;
            
         }
         input[type='checkbox'] {
            background-color: blueviolet;
            color: white;
         }
         .forget-pwd {
            margin-top: 1rem;
            text-decoration: none;
            font-weight: bolder;
         }

        .submit {
             background-color: blueviolet;
             color: white;
             border-radius: 30px;
             padding: 12px 12.7rem;
            text-align: center;
            border: 1px solid blueviolet;
            margin-left: 1rem;
         }

         
    </style>

    <?php
    require('connection.php');

    //if form submitted, insert values into the database.
    if(isset($_POST['submit'])) {
    $username = $_POST['username'];  
    $password = $_POST['password']; 
        //removes backslashes
        $username = stripslashes($username);
        //escapes special characters
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($password);
        $password = mysqli_real_escape_string($con, $password);
        //checking if user is exiting in the database o r not
        $sql = "select *from bankusers where username = '$username' and password = '$password' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            header("location:http://127.0.0.1:5500/bankpage.html");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
    }
    ?>





   

    <div class="form" >
        <div class="formlogin">
            <i class="fa fa-th-large "></i>
            <h1 class="login"><b>Log in</b></h1>
            <p class="text ">See your growth and get consulting support!</p>
            <button class="btn"><i class="fa fa-google"></i><a href="https://accounts.google.com/v3/signin/identifier?dsh=S1158151010%3A1670327464139869&elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=ARgdvAsFdfeWxFO-6Xsb1WV0e0K-O_1GZPPix1pyAJwlfksyxnzxk7z-vjqWE6kEo79kmfPxpW2M" class=" googlelink ">Sign in with google</a></button>
            <hr class="line">
            <form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" method="post" name="login">
            <label for="username" >Username*</label>
                <input id="input" type="text" name="username" placeholder="Enter your username" >
                
                <label for="password" >Password*</label>
                <input id="input" type="password" name="password" placeholder="Enter your password">
                 
                <div class="pwd-support">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" class="check">
                        <p>Remember me</p>
                    </div>
                    <a href="" class="forget-pwd">Forget password?</a>
                </div>
                
                <input class="submit" type="submit" name="submit" value="login">
                

            </form>
            <p>Not registered Yet?</p> <a href="registration.php">Register Here</a>
        </div>
    </div>

</body>

</html>