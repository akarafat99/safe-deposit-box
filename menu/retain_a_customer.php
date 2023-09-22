<?php
session_start();
include_once '../dir/dir_0.php';
$link = new PMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>First National Bank | Retain a customer</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Retain a customer</h1>
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


    <!-- form start -->
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="background: rgb(228, 228, 228, 0.9);">
                <div class="card-body">
                    <!-- <h2 class="title">Sign up</h2> -->
                    <p><i>Field marked with red <b style="color: red;">*</b> sign must fillup</i></p><br><br>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Customer ID: FNB-SDB-</label>
                            <input class="input--style-4" placeholder="number after 'FNB-SDB' code" type="text" name="c_id" required>
                        </div>

                        <div class="p-t-15" style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="retain">Retain customer</button>
                            <!-- <li class="nav_links_li"><a href="../index.html">Return to home</a></li> -->
                            <!-- <button class="btn btn--radius-2 btn--radius" type="submit">Return to home</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form finish -->

</html>
<!-- end document-->

<?php
if (isset($_POST["home"])) {
    $link->go_home();
}

if (isset($_POST['retain'])) {
    include 'connect.php';

    $sql = "SELECT * FROM tbl_box WHERE box_owner_id = $_POST[c_id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result) > 0) {
        $_SESSION["msg"] = 'User have safe deposit box(s).';
    } else {
        $sql = "SELECT * FROM tbl_user WHERE id = $_POST[c_id]";
        $result = mysqli_query($conn, $sql);
        if (mysqli_fetch_assoc($result) > 0) {
            $sql = "DELETE FROM tbl_user WHERE id = $_POST[c_id] ";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION["msg"] = 'Customer retained.';
            } else {
                $_SESSION["msg"] = 'Customer retained failed.';
            }
        } else {
            $_SESSION["msg"] = 'Customer not found using ID: FNB-SDB-'.$_POST['c_id'];
        }
    }
    mysqli_close($conn);
    $link->go_retainACustomer();
}
?>