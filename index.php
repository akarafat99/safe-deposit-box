<?php
session_start();
include_once 'dir/dir_0.php';
$link = new PIndex();

// $_SESSION["logged_in_user"] = "190122.cse@student.just.edu.bd";
// echo "SESSION CREATED named " . $_SESSION["logged_in_user"];

if (isset($_SESSION['admin'])) {
    $link->go_home();
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS for Login -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">

    <title>Log in</title>
</head>

<body>
    <div style="background: rgb(228, 228, 228, 0.5);">
        <h1 style="text-align: center; padding:10px 0 10px 0; color: rgb(0, 0, 0); font-size: 30px">First National bank | Safe deposit box</h1>
    </div>

    <div class="container-0">
        <?php
        if (isset($_SESSION["msg"])) {
            echo '<div><h1 style="text-align: center; padding:10px 0 10px 0; 
            background-color: #fb3e3e; color: white; font-size: 15px">
            <i class="uil uil-exclamation-triangle"></i> | ' . $_SESSION["msg"] . '</h1></div>';
            unset($_SESSION['msg']);
        }
        ?>
    </div>

    <div class="container-1">
        <div class="login-box">
            <form method="POST">
                <h2>Admin Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" placeholder="Password" name="pass" required>
                </div>

                <button class="btn" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <!-- start of footer -->
    <div class="footer">
        <p>Copyright
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; <a href="#" class="col-white"> First National bank</a>
        </p>
    </div>
    <!-- End of Footer-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>





</body>

</html>

<?php
if (isset($_POST["login"])) {
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "db_safe_box";

    $conn = mysqli_connect($serverName, $username, $password, $dbName);
    if ($conn) {
        // echo "Connection successful";
        // header("Location: http://localhost/registration2/test.php");
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM tbl_admin WHERE email = '$_POST[email]' AND password = '$_POST[pass]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["admin"] = $_POST['email'];
        // echo $_SESSION["logged_in_user"];
        mysqli_close($conn);
        $link->go_home();
    } else {
        $_SESSION["msg"] = 'Please fill information correctly';
        mysqli_close($conn);
        $link->go_login();
    }

    mysqli_close($conn);
}
?>