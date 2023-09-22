<?php
session_start();
include_once '../dir/dir_0.php';
$link = new PMenu();
// include '../dir/dir_1.php';
// echo $_SESSION['c_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Profile</title>
</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Registration successful</h1>
    </div>

    <!-- Message -->
    <div class="container-0">
        <?php
        if (isset($_SESSION["msg"])) {
            echo '<div><h1 style="text-align: center; padding:15px 0 10px 0; 
            background-color: #fb3e3e; color: white; font-size: 15px">
            <i class="uil uil-exclamation-triangle"></i> | ' . $_SESSION["msg"] . '</h1></div>';
        }
        unset($_SESSION['msg']);
        ?>
    </div>

    <div class="container">
        <div class="profile max-wid-360 pad-10-0 bg-white-1 bord-rad-10">
            <div class="section grid-col-1">
                <div>
                    <div class="mid-sec-2 no-marg-bord pad-bottom-5">
                        <form method="post">
                            <button type="submit" class="btn bg-white color-black no-marg-bord" style="color: black;" name="home">Back to Home</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- customer details -->
    <div class="container">
        <div class="profile max-wid-360">
            <div class="top-icons">
                <div>
                    <!-- <i class="fa-solid fa-circle-nodes"></i> -->
                    <i class="fa-sharp fa-regular fa-user"></i>
                </div>
            </div>
            <div class="mid-sec-2">
                <?php
                include 'connect.php';
                $num = $_SESSION['c_id'];
                $sql = "SELECT * FROM tbl_user WHERE contact = '$_SESSION[c_id]'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <p>ID: FNB-SDB-' . $row["id"] . '</p>
                        <p>---</p>
                        <p>Secondary ID: FNB-SDB-' . $row["id"] . '-' . $row["contact"] . '</p>
                        <p>---</p>
                        <p>Name: ' . $row["full_name"] . '</p>
                        <p>Contact: ' . $row["contact"] . '</p>
                        <p>Gender: ' . $row["gender"] . '</p>
                        <p>Profession: ' . $row["profession"] . '</p>
                        <p>Address: ' . $row["address"] . '</p>
                        <p>Email: ' . $row["email"] . '</p>
                        <p>Account since: ' . $row["timestamp"] . '</p>
                        
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- <div class="mid-sec-2 m-t-20">
                    <a href="#" class="btn bg-white color-black no-marg-bord" onclick="window.print()">print</a>
                </div> -->

</body>

</html>

<?php
if (isset($_POST['home'])) {
    $link->go_home();
}

?>