<?php


session_start();
// $conn =mysqli_connect('localhost', 'root', '', 'bookurshow');
require "connection.php";

// if (!$conn) 
// {
//     die("Connection failed");
// }
// else
// {
//     echo "Connection successful";
// }
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isPass($password)
{
    if (strlen($password) >= 8) {
        return true;
    } else {
        return false;
    }
}

$email = $pass = $cpass = "";
$emailErr = $passErr = $cpassErr = "";
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (isset($_POST['sign-in'])) {
        // $name=$_POST['name'];
        if (empty($_POST["Email"])) {
            $emailErr = "please enter valid Email";
        } else {
            $email = test_input($_POST["Email"]);
            

            if (!isEmail($email)) {
                $emailErr = "please enter valid Email";

            }
        }

        if (empty($_POST["pass"])) {
            $passErr = "please enter valid password";
        } 
        else
        {
            $password = test_input($_POST["pass"]);
            if (!isPass($password)) 
            {
                // echo "pass error";
                $passErr = "please enter valid password";
            }

        }

        if (empty($_POST["cpass"])) {
            $cpassErr = "password did not match";
        } else {
            $cpass = test_input($_POST["cpass"]);
            if (!($cpass == $password)) 
            {
                $cpassErr = "password did not match";

            } 
            else if((strlen($password) < 8))
            {
                $passErr="password must be above 8 characters";
                $cpassErr = "password must be above 8 characters";

            }
            else 
            {
                $Emailquery="select Email from registration where Email='$email' limit 1";
                $row3=mysqli_query($conn,$Emailquery);
                // var_dump($Emailquery);
                if($row3)
                {
                    $res=mysqli_fetch_assoc($row3);
                    if($res)
                    {
                        $emailErr="User already exists";
                    }
                    else
                    {
                        $stmt = $conn->prepare("Insert into registration(Password,Email) values(?,?)");
                        $stmt->bind_param("ss", $password, $email);
                        if ($stmt->execute()) {
                            // echo "Registration successful";
                            $_SESSION["status"] = "Registraion successful done";
                            header('Location: login.php');
                        } else {
                            $_SESSION["status"] = "Registraion unsuccessful";
                            // echo "Registration unsuccessful";
                        }
                    }
                }
                // echo 2;
                // if (($email !== "") && ($pass !== "") && ($cpass !== "")) 
                // {
                    // echo 1;

                   
                // }
            }

        }



        // $email=$_POST['Email'];        
        // $password=$_POST['pass'];
        // $cpass=$_POST['cpass'];

        // $phone=$_POST['phone'];


    }
}




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="assets/css/signin.css">
</head>

<body>

    <div class="login-container">
    </div>
    <div class="login-div" id="login-div">
        <div class="login-page">
            <img src="assets/images/bookurshow-19-08-2023.png" alt="" class="book-image">
            <h1>Sign In</h1>

            <form action="" method="post" onsubmit="return validate()">


                <input type="text" name="Email" id="email" placeholder="Your Email" required>
                <span class="error"> <?php echo $emailErr; ?></span>
                <input type="password" name="pass" id="pass" placeholder="Your Password" required>
                <span class="error"> <?php echo $passErr; ?></span>

                <input type="password" name="cpass" placeholder="confirm password" id="cpass" required>
                <span class="error"> <?php echo $cpassErr; ?></span>

                <input type="submit" value="submit" name="sign-in">

                <span class="redirect-login">Already a User? <a href="login.php">Login</a> </span>
            </form>


        </div>

        <img src="assets/images/pngegg (3).png" alt="" class="movie-popcorn">

    </div>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        function validate()
        {
            var pass=document.getElementById("pass");
            var cpass=document.getElementById("cpass");
            if(length(pass) >= 8)
            {
                if(length(cpass) >= 8)
                {
                    if(pass == cpass)
                    {
                        return true;
                    }
                }
            }
            return false;
        }
    </script>
</body>

</html>