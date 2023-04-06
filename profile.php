<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Profile</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch'
        href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch'
        href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
    #button {
        color: #fff;
        background-color: #ff3300;
    }
    </style>
</head>

<body>
    <?php
include ("connection/connect.php"); // INCLUDE CONNECTION
error_reporting(0);
session_start();
if ($_SESSION["user_id"])
{
    $user_id = $_SESSION["user_id"]; // Get user id from session
    $query = "SELECT * FROM users WHERE u_id='$user_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $name = $row['username']; // Get current username from database
    if (isset($_POST['submit']))
    { // If form submitted
        $new_name = $_POST['new_name'];
        $new_password = $_POST['new_password'];
        $query = "UPDATE users SET username='$new_name', password='" . md5($new_password) . "' WHERE u_id='$user_id'";
        $result = mysqli_query($db, $query);
        if ($result)
        {
            $success = "Profile updated successfully!";
            header("refresh:1;url=index.php"); // Redirect to profile page
            
        }
        else
        {
            $message = "Error updating profile!";
        }
    }
}
else
{
    header("Location: login.php"); // If user not logged in, redirect to login page
    
}
?>
    <!-- Form Mixin-->
    <!-- Input Mixin-->
    <!-- Button Mixin-->
    <!-- Pen Title-->
    <div class="pen-title">
        <h1>Profile</h1>
    </div>
    <!-- Form Module-->
    <div class="module form-module">
        <div class="toggle"></div>
        <div class="form">
            <h2>Welcome, <?php echo $name; ?>!</h2>
            <span style="color: red;"><?php echo $message; ?></span>
            <span style="color: green;"><?php echo $success; ?></span>
            <form action="" method="post">
                <input type="text" placeholder="New name" name="new_name" />
                <input type="password" placeholder="New password"
                    name="new_password" />
                <input type="submit" id="button" name="submit"
                    value="Update profile" />
            </form>
        </div>
        <div class="cta"><a href="logout.php" style="color: #f30;">Logout</a>
        </div>
    </div>
    <script
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
</body>

</html>