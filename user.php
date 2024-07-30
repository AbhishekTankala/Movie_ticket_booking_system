<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="assets/css/user.css">
</head>
<body>
    <div class="container">
        <div class="header">

            <h1>Hi! User</h1>
        </div>
        <div class="main-details">
            <form action="">
                <div class="account-details">
                    <h2>Account details</h2>
                

                <div class="input-div">

                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your Email">
                </div>
                    
                <div class="input-div">

                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" placeholder="Enter your Mobile Number">
                </div>
                </div>

                <div class="account-details">

                    <h2>Personal details</h2>
                <div class="input-div">

                    <label for="First Name">First Name:</label>
                    <input type="text" name="First Name" placeholder="Enter your First Name">
                </div>
                    
                <div class="input-div">

                    <label for="Last Name">Last Name:</label>
                    <input type="text" name="Last Name" placeholder="Enter your Last Name">
                </div>
                <div class="input-div gender-selection">

                    
                    <label for="gender">Gender:</label>
                    <div class="gen">

                        <div class="gender-option">
                            <input type="radio" name="gender" id="male" value="male">
                            <label class="design" for="male">Male</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="gender" id="female" value="female">
                            <label class="design" for="female">Female</label>
                        </div>
                    </div>
                </div>
                </div>

                <div class="account-details">
                    <h2>Address</h2>

                <div class="input-div">
                

                    
                    <label for="Address">Address:</label>
                    <input type="text" name="Address" placeholder="Enter your Address">
                </div>

                <div class="input-div">

                    <label for="Pincode">Pincode:</label>
                    <input type="text" name="Pincode" placeholder="Enter your Pincode">
                </div>

                <div class="input-div">

                    <label for="City">City:</label>
                    <input type="text" name="City" placeholder="Enter your City">
                </div>
                
                <div class="input-div">

                    <label for="state">State:</label>
                    <input type="text" name="state" placeholder="Enter your State">
                </div>
                <div class="input-div">
                    <input type="submit" value="submit">
                </div>
            </div>


            </form>

        </div>


    </div>
    
</body>
</html>