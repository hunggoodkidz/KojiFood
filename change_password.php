<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
        #buttn {
            color: #fff;
            background-color: #ff3300;
        }
    </style>

</head>

<body>
    <?php
    include("connection/connect.php"); //INCLUDE CONNECTION
    error_reporting(0);
    session_start();
    if ($_SESSION["user_id"]) {
        if (isset($_POST['change_password']))   // if Change Password button is clicked
        {
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // check if current password is correct
            $check_password_query = "SELECT password FROM users WHERE u_id='" . $_SESSION['user_id'] . "'";
            $check_password_result = mysqli_query($db, $check_password_query);
            $row = mysqli_fetch_array($check_password_result);
            $hashed_password = $row['password'];

            if (md5($current_password) == $hashed_password) {
                // check if new password and confirm password match
                if ($new_password == $confirm_password) {
                    // update password in database
                    $update_password_query = "UPDATE users SET password='" . md5($new_password) . "' WHERE u_id='" . $_SESSION['user_id'] . "'";
                    mysqli_query($db, $update_password_query);
                    $success = "Password changed successfully!";
                } else {
                    $message = "New Password and Confirm Password do not match!";
                }
            } else {
                $message = "Current Password is incorrect!";
            }
        }
    } else {
        header("Location: index.php"); // If user not logged in, redirect to login page
    }

    ?>
    <div class="pen-title">
        <h1> </h1>
    </div>
    <!-- Form Module-->
    <div class="module form-module">
        <div class="toggle">

        </div>
        <div class="form">
            <h2>Change Password</h2>
            <span style="color:red;"><?php echo $message; ?></span>
            <span style="color:green;"><?php echo $success; ?></span>
            <form action="" method="post">
                <input type="password" placeholder="Current Password" name="current_password" />
                <input type="password" placeholder="New Password" name="new_password" />
                <input type="password" placeholder="Confirm New Password" name="confirm_password" />
                <input type="submit" id="buttn" name="change_password" value="Change Password" />
            </form>
        </div>

        <div class="cta">Not registered?<a href="registration.php" style="color:#f30;"> Create an account</a></div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
    </script>

</body>

</html>