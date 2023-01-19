<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .formlogin i{
            font-size: 30px;
            color: blueviolet;
            margin-right: 25rem;
            padding-top: 2rem;
        }

        label {
            padding-right: 22rem;
           background-color: rgba(128, 128, 128, 0);
           display: block;
           margin-top: 2rem;
            
        }

        .phone-number  {
            padding-right: 20rem;
           background-color: rgba(128, 128, 128, 0);
           display: block;
           margin-top: 2rem;
        }

        .name {
            padding-right: 23rem;
           background-color: rgba(128, 128, 128, 0);
           display: block;
           margin-top: 2rem;
        }



        .input {
            border: 1px solid grey;
            border-radius: 10px;
            display: block;
            margin-left: 95px;
            margin-bottom: 2rem;
            padding: 12px 9rem;
            background-color: rgba(128, 128, 128, 0) ;
            position: relative;
            
        }

        input::placeholder {
            font-weight:bolder;
            text-align:left ;
            margin-right: 7rem;
            position: absolute;
            
        }

       
         
        input {
            text-align:left ;
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
            //  if form is submitted, insert values into the database
            

            if (isset($_REQUEST['submit']))  {
                //remove back slash
                $username=stripslashes($_REQUEST['username']);
                //escape special character in a string.
                $username = mysqli_real_escape_string($con, $username);
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con, $email);
                $name = stripslashes($_REQUEST['name']);
                $name = mysqli_real_escape_string($con, $name);
                $date_of_birth = stripslashes($_REQUEST['date_of_birth']);
                $date_of_birth = mysqli_real_escape_string($con, $date_of_birth);
                $date_of_birth = date("Y-m-d H:i:s");
                $gender = stripslashes($_REQUEST['password']);
                $gender = mysqli_real_escape_string($con, $gender);
                $phonenumber = stripslashes($_REQUEST['phonenumber']);
                $phonenumber = mysqli_real_escape_string($con, $phonenumber);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $creation_date = date("Y-m-d H:i:s");
                $query = "INSERT    INTO  `bankusers` (`username`, `password`,  `email`,  `creation_date`, `name` , `date_of_birth` ,  `gender` , `phonenumber`)
                VALUES('$username', '$password ', '$email', '$creation_date' , '$name',' $date_of_birth',  '$gender',   '  $phonenumber' )";
                $result = mysqli_query($con,  $query);
                if ($result) {
                    echo
                   ' <div>
                   <h3>You are registered successfully.</h3>                               
                   </br>
                                   click here to <a href="login.php">Login</a>
                   
                    </div>';
                    
                }else{ 
         

                }
                     

            }
    ?>

    <div class="form">
    <div class="formlogin">   
             <i class="fa fa-th-large fa-pulse"></i>       
            <h1>Register a New Member</h1>
            <p>Already have a membership? <a href="">Sign in</a></p>
            <form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>" name="registration" method='post'>
                     <label for="name"  class="name">Name*</label>
                     <input type="text"  class="input"  name="name" placeholder="enter your name">
                    
                     <label for="date of birth" class="phone-number">Date of Birth*</label>
                     <input type="date" class="input" name="date_of_birth" placeholder=" date of birth">
                   
                     <label for="gender"  class="name">Gender*</label>
                     <input type="text"  class="input"name="gender" placeholder="choose  gender">
                    
                     <label for="email" class="name"  >Email*</label>
                     <input type="email" class="input" name="email" placeholder="enter your email">
                     
                     <label for="username" >Username*</label>
                     <input type="text"  class="input"name="username" placeholder="enter your username">
                    
                     <label for="phone number"  class="phone-number"> Phone number*</label>
                     <input type="text"  class="input"name="phonenumber" placeholder="phone number">
                    
                     <label for="password" >Password*</label>
                      <input type="password"  class="input"name="password" placeholder="enter your password">
                     
                     <p>I agreee to  the<span> terms and conditions</span></p>
                     <input type="submit" class="submit"name="submit" value="Register">
            </form>

        </div>
    </div>

</body>
</html>
