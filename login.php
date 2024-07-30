<?php
session_start();

include "connection.php";

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

$email = $pass = "";
$emailErr = $passErr = "";
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (isset($_POST['login'])) {
        // $name=$_POST['name'];
        if (empty($_POST["Email"])) {
            $emailErr = "please enter valid Email";
        } else {
            $email = test_input($_POST["Email"]);
            if (!isEmail($email)) 
            {
                $emailErr = "please enter valid Email";
            }
        }

        if (empty($_POST["pass"])) {
            $passErr = "please enter valid password";
        } else {
            $password = test_input($_POST["pass"]);
            if (!isPass($password)) 
            {
                $passErr = "please enter valid password";
            } 
            else 
            {
                // if($email != "" && $pass!="")
                // {

                    $sql = "SELECT * FROM registration WHERE Email='$email'";
                    $result = mysqli_query($conn, $sql);
    
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
    
                        if ($row) {
                            // $password_verify = password_verify($password, $row['Password']);
    
                            if ($password == $row['Password']) {
                                $_SESSION['Email'] = $email;
                                $_SESSION['user_id'] = $row['user_id'];
                                // $_SESSION['pass'] = $password;
                                header("Location: first.php");
                                exit();
                            } else {
                                $_SESSION["status"] = "Invalid password";
    
                                header("Location: login.php");
    
                                // echo "Invalid password";
                            }
                        } else {
                            $_SESSION["status"] = "User not found";
                            header("Location: login.php");
                            // echo "User not found";
                        }
                    } else {
                        $_SESSION["status"] = "Error: " . mysqli_error($conn);
                        header("Location: login.php");
                        // echo "Error: " . mysqli_error($conn);
                    // }
                }


            }
        }


    }



    // $email=$_POST['Email'];        
    // $password=$_POST['pass'];
    // $cpass=$_POST['cpass'];

    // $phone=$_POST['phone'];


}



// $email = $_POST['Email'];
// $password = $_POST['pass'];

// $email = mysqli_real_escape_string($conn, $email);
// $password = mysqli_real_escape_string($conn, $password);

// $sql = "SELECT * FROM registration WHERE Email='$email'";
// $result = mysqli_query($conn, $sql);

// if ($result) {
//     $row = mysqli_fetch_assoc($result);

//     if ($row) {
//         // $password_verify = password_verify($password, $row['Password']);

//         if ($password == $row['Password']) {
//             $_SESSION['Email'] = $email;
//             $_SESSION['user_id']=$row['user_id'];
//             // $_SESSION['pass'] = $password;
//             header("Location: first.php");
//             exit();
//         } else 
//         {
//             $_SESSION["status"]="Invalid password";

//             header("Location: login.php");

//             // echo "Invalid password";
//         }
//     } 
//     else 
//     {
//         $_SESSION["status"]="User not found";
//         header("Location: login.php");
//         // echo "User not found";
//     }
// } 
// else 
// {
//     $_SESSION["status"]="Error: " .mysqli_error($conn);
//     header("Location: login.php");
//     // echo "Error: " . mysqli_error($conn);
// }


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <?php
    if (isset($_SESSION["status"])) {
        echo $_SESSION["status"];
        // session_unset();
        unset($_SESSION["status"]);
        // unset($_POST);
    }

    ?>
    <div class="login-container">
    </div>

    <div class="login-div" id="login-div">
        <div class="login-page">
            <img src="assets/images/bookurshow-19-08-2023.png" alt="" class="book-image">
            <h1>Login</h1>

            <form action="" method="post">


                <input type="text" name="Email" id="" placeholder="Your Email">
                <span class="error"> <?php echo $emailErr;?></span>

                <input type="password" name="pass" id="" placeholder="Your Password">
                <span class="error"> <?php echo $passErr;?></span>
 
                <input type="submit" value="submit" name="login">

                <span class="redirect-signin">Don't have an Account? <a href="signin.php">sign-in</a> </span>
            </form>
        </div>

        <img src="assets/images/pngegg (3).png" alt="" class="movie-popcorn">

    </div>


</body>

</html>